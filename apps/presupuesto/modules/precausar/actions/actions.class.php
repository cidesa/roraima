<?php

/**
 * precausar actions.
 *
 * @package    siga
 * @subpackage precausar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class precausarActions extends autoprecausarActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing(){
 	$this->configGrid();
  }

  public function configGrid($reg = array(),$regelim = array()){
  	$this->params = array(); //,
    $c = new Criteria();
    $c->add(CpimpcauPeer::REFCAU ,$this->cpcausad->getRefcau());
    $reg = CpimpcauPeer::doSelect($c);
    $this->obj = H::getConfigGrid($this->cpcausad->getId()=='' ? 'grid_cpimpcau_create' : 'grid_cpimpcau_edit',$reg);
    $this->params['grid'] = $this->obj;
  }

  public function executeAjax(){

    $ajax = $this->getRequestParameter('ajax','');
    $referencia=$this->getRequestParameter('referencia','');
    $feccau =$this->getRequestParameter('feccau','');
    $totpag=$this->getRequestParameter('totpag','');

    switch ($ajax){
      case '1':
        $mens=  Presupuesto::verificarAnuCausado($referencia,$totpag);

        if ($mens==''){
        	$javascript="abreAnular('$referencia','$feccau')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

  }

  public function validateEdit(){
  	 $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
	  $this->cpcausad = $this->getCpcausadOrCreate();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridV2($this,$this->obj);
	  if (count($grid[0])>0){
	  	$this->coderr = Presupuesto::validarPreCom($this->cpcausad,$grid);
	  }
	  else{
	  	$this->coderr = 1342;
	  }
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
  public function updateError(){
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);
  }

  public function saving($cpcausad){
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Presupuesto::salvarPrecausar($cpcausad,$grid);

  }

  public function deleting($cpcausad){
    return Presupuesto::eliminarPrecausar($cpcausad);
  }

  public function executeAnular(){

	   $this->referencia=$this->getRequestParameter('referencia');
	   $feccau=$this->getRequestParameter('feccau');
	   $totpag=$this->getRequestParameter('totpag');

	   $dateFormat = new sfDateFormat('es_VE');
	   $fec = $dateFormat->format($feccau, 'i', $dateFormat->getInputPattern('d'));

	   $c = new Criteria();
	   $c->add(CpcausadPeer::REFCAU,$this->referencia);
	   $c->add(CpcausadPeer::FECCAU,$fec);
	   $this->cpcausad = CpcausadPeer::doSelectOne($c);
	   $id = $this->cpcausad->getId();

	   sfView::SUCCESS;
  }

    	public function executeAjaxfila() {
		$name = $this->getRequestParameter('grid','a');
		$grid = $this->getRequestParameter('grid'.$name,'');

		$fila = $this->getRequestParameter('fila','');
		$codpre = $grid[$fila][0];
		$monimp = $grid[$fila][1];
		$c = new Criteria();
		$c->add(CpasiiniPeer::CODPRE,$codpre);
		$cpasiini = CpasiiniPeer::doSelectOne($c);

    	$output = Herramientas::grid_to_json($grid,$name);
    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	return sfView::HEADER_ONLY;
    }

  public function executeSalvaranu(){
	$refcau=$this->getRequestParameter('refcau');
	$desanu=$this->getRequestParameter('desanu');
	$fecanu=$this->getRequestParameter('fecanu');
	$feccau=$this->getRequestParameter('feccau');
	$this->msg="";
    $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($feccau)){
			$this->msg='La fecha de Anulación no puede ser menor a la del Causado';
		}else {
			Presupuesto::salvarAnuCausado($refcau,$fecanu,$desanu);
		}
		sfView::SUCCESS;
  }


}
