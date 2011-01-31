<?php

/**
 * preprecom actions.
 *
 * @package    Roraima
 * @subpackage preprecom
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preprecomActions extends autopreprecomActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing(){
    $this->configGrid();
  }

  public function configGrid($reg = array(),$regelim = array()){
  	$this->params = array();
    $c = new Criteria();
    $c->add(CpimpprcPeer::REFPRC ,$this->cpprecom->getRefprc());
    $reg = CpimpprcPeer::doSelect($c);
    $this->obj = H::getConfigGrid($this->cpprecom->getId()=='' ? 'grid_cpimpprc_create' : 'grid_cpimpprc_edit',$reg);
    $this->params['grid'] = $this->obj;
    //$this->columnas[1][2]->setHTML('type="text" size="17" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara. chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);"');
  }

  public function executeAjax(){
    //$codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $referencia=$this->getRequestParameter('referencia','');
    $fecprc =$this->getRequestParameter('fecprc','');
    $salcom=$this->getRequestParameter('salcom','');

    switch ($ajax){
      case '1':
        $mens=  Presupuesto::verificarAnular($referencia,$salcom);
        if ($mens==''){
        	$javascript="abreAnular('$referencia','$fecprc')";
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

  	public function executeAjaxfila() {
		$name = $this->getRequestParameter('grid','a');
		$grid = $this->getRequestParameter('grid'.$name,'');

		$fila = $this->getRequestParameter('fila','');
		$codpre = $grid[$fila][0];
		$monimp = $grid[$fila][1];
		$mondis = H::FormatoMonto(H::Monto_disponible($codpre));
		$grid[$fila][2] = $mondis;
		$c = new Criteria();
		$c->add(CpasiiniPeer::CODPRE,$codpre);
		$cpasiini = CpasiiniPeer::doSelectOne($c);

		if(!$cpasiini) {
			$grid[$fila][0] = '';
      		$grid[$fila][2] = 0.00;
    	}else{
      		if($monimp>0){
        		$mondis = H::FormatoMonto(H::Monto_disponible($codpre));
        		$grid[$fila][2]=$mondis;
        		if($mondis<$monimp){
          			$grid[$fila][2] = 0.00;
          			$grid[$fila][2] = $mondis;
        		}
        		else{
          			$grid[$fila][2] = $mondis-$monimp;
        		}
      		}
    	}
    	$output = Herramientas::grid_to_json($grid,$name);
    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	return sfView::HEADER_ONLY;
    }


  public function validateEdit(){
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
	  $this->cpprecom = $this->getCpprecomOrCreate();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridV2($this,$this->obj);
	  if (count($grid[0])>0){
	  	$this->coderr = Presupuesto::validarPreCom($this->cpprecom,$grid);
	  }
	  else{
	  	$this->coderr = 1342;
	  }
      if($this->coderr!=-1){
        return false;
      }else return true;
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

  public function saving($cpprecom){
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Presupuesto::salvarPreprecom($cpprecom,$grid);
  }

  public function deleting($cpprecom){
    return Presupuesto::eliminarPreprecom($cpprecom);
  }

  public function executeAnular(){

   $this->referencia=$this->getRequestParameter('referencia');
   $fecprc=$this->getRequestParameter('fecprc');
   $salcom=$this->getRequestParameter('salcom');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecprc, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CpprecomPeer::REFPRC,$this->referencia);
   $c->add(CpprecomPeer::FECPRC,$fec);
   $this->cpprecom = CpprecomPeer::doSelectOne($c);
   $id = $this->cpprecom->getId();

   sfView::SUCCESS;
  }

  public function executeSalvaranu(){
	$refprc=$this->getRequestParameter('refprc');
	$desanu=$this->getRequestParameter('desanu');
	$fecanu=$this->getRequestParameter('fecanu');
	$fecprc=$this->getRequestParameter('fecprc');
	$this->msg="";
    $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($fecprc)){
			$this->msg='La fecha de Anulación no puede ser menor a la del Compromiso';
		}else {
			Presupuesto::salvarAnular($refprc,$fecanu,$desanu);
		}
		sfView::SUCCESS;
  }

}
