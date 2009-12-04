<?php

/**
 * pretitpre actions.
 *
 * @package    Roraima
 * @subpackage pretitpre
 * @author     $Author:jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 35219 2009-12-02 16:11:04Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pretitpreActions extends autopretitpreActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->setVars();

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
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


  public function validateEdit()
  {
    $this->coderr =-1;
    $this->params = array();

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

	    $this->cpdeftit = $this->getCpdeftitOrCreate();
	    $this->updateCpdeftitFromRequest();

        $this->coderr = Presupuesto::validarPretitpre($this->cpdeftit);

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }



  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
  	    $this->params=array();
		$this->setVars();
  }


   public function setVars(){
  	$c = new Criteria();
  	$reg = CpnivelesPeer::doSelect($c);
	if($reg){
	  	foreach ($reg as $datos){
	  		$this->loncc = $datos->getLonniv();
	  		$this->nomabr = $this->nomabr .'-'.$datos->getNomabr();
	  	}
	}
  	$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
  	$this->params[0] = $cpdefniv->getForpre();
  	//$this->params[1] = strlen(substr($this->params[0],0,strlen($this->params[0])-$this->loncc-1));
  	$this->params[1] = strlen($this->params[0]);
  	$this->params[2] = substr($this->nomabr,1,strlen($this->nomabr));
  	$this->params[3] = $this->loncc;

  }


  public function saving($cpdeftit){
  	return Presupuesto::salvarPretitpre($cpdeftit);
  }

  public function deleting($cpdeftit)
  {
    return Presupuesto::eliminarPretitpre($cpdeftit);
  }


}
