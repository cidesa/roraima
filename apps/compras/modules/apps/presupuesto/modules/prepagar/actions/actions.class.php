<?php

/**
 * prepagar actions.
 *
 * @package    siga
 * @subpackage prepagar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class prepagarActions extends autoprepagarActions
{

  // Para incluir funcionalidades al executeEdit()
	public function editing() {
		$this->configGrid();
	}

	public function configGrid($reg = array(),$regelim = array()) {
		$this->params=array();

		$c = new Criteria();
    	$c->add(CpimppagPeer::REFPAG,$this->cppagos->getRefpag());
    	$reg = CpimppagPeer::doSelect($c);

    	$this->obj = H::getConfigGrid($this->cppagos->getId()=='' ? 'grid_cpimppag_create' : 'grid_cpimppag_edit',$reg);
    	$this->params['grid'] = $this->obj;
	}

  public function executeAjax() {
	$ajax = $this->getRequestParameter('ajax','');

    $refpag = $this->getRequestParameter('refpag','');
    $fecpag = $this->getRequestParameter('fecpag','');
    //$salcau = $this->getRequestParameter('salcau','');

    switch ($ajax){
      case '1':
		$msj = Presupuesto::verificarAnuPrepagar($refpag); //,$salcau
      	if ($msj==''){
      		$javascript="abrirAnular('$refpag','$fecpag')";
      	}else {
      		$javascript="alert('$msj')";
      	}
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {

  		$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST){
			$this->cppagos = $this->getCppagosOrCreate();
			$this->configGrid();
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
			if (count($grid)>0){
				$this->coderr = Presupuesto::validarPreCom($this->cppagos,$grid);
			}
			else $this->coderr=1342;
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
  public function updateError() {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);
  }

  	public function executeAnular() {
		$this->refpag=$this->getRequestParameter('refpag');
  		$fecpag=$this->getRequestParameter('fecpag');
		//$salcau=$this->getRequestParameter('salcau');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($fecpag, 'i', $dateFormat->getInputPattern('d'));

	   	$c = new Criteria();
   		$c->add(CppagosPeer::REFPAG,$this->refpag);
   		$c->add(CppagosPeer::FECPAG,$fec);
   		$this->cppagos = CppagosPeer::doSelectOne($c);
   		$id = $this->cppagos->getId();

   		sfView::SUCCESS;
	}

	public function executeSalvaranu(){
		$refpag=$this->getRequestParameter('refpag');
		$fecpag=$this->getRequestParameter('fecpag');
  		$fecanu=$this->getRequestParameter('fecanu');
		$desanu=$this->getRequestParameter('desanu');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

		$this->msj='';
		if (strtotime($fec) < strtotime($fecpag)){
			$this->msj='La fecha de Anulación no puede ser menor a la del Pagado';
		}else {
			Presupuesto::salvarAnuPrepagar($refpag,$fecanu,$desanu);
		}
		sfView::SUCCESS;
	}

  public function saving($clasemodelo) {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo){
    return Presupuesto::eliminarPrepagar($clasemodelo);
  }
}
