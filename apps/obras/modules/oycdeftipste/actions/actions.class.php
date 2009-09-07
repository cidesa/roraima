<?php

/**
 * oycdeftipste actions.
 *
 * @package    Roraima
 * @subpackage oycdeftipste
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdeftipsteActions extends autooycdeftipsteActions
{
  private $coderr = -1;

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        //$dato=Herramientas::getX('cedper','ocdefper','nomper',str_pad($codigo,8,0));
		$output = '[["'.$cajtexmos.'","",""],["'.$cajtexcom.'","4","c"]]';

        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


 /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOctipsteFromRequest()
  {
    $octipste = $this->getRequestParameter('octipste');

    if (isset($octipste['codste']))
    {
      $this->octipste->setCodste(str_pad($octipste['codste'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipste['desste']))
    {
      $this->octipste->setDesste($octipste['desste']);
    }
    if (isset($octipste['tipste']))
    {
      $this->octipste->setTipste($octipste['tipste']);

    }
    /*if (isset($octipste['staste']))
    {
      $this->octipste->setStaste($octipste['staste']);
    }*/
  }


  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    $this->octipste = $this->getOctipsteOrCreate();
    $this->updateOctipsteFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }


}
