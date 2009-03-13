<?php

/**
 * oycdeftipste actions.
 *
 * @package    siga
 * @subpackage oycdeftipste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipsteActions extends autooycdeftipsteActions
{
  private $coderr = -1;

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
