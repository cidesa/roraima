<?php

/**
 * preasiini actions.
 *
 * @package    Roraima
 * @subpackage preasiini
 * @author     $Author:glagea $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 33667 2009-10-01 16:44:01Z glagea $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preasiiniActions extends autopreasiiniActions
{
	public function executeIndex() {
		return $this->redirect('preasiini/list');
    }

	public function editing() {
		$this->configGrid();
	}

	public function configGrid($reg = array(),$regelim = array()) {
		$this->params = array();

		if ($this->cpasiini->getId()!='') {
			$cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
			$anoini=substr($cpdefniv->getFecini(),0,4);
			$anocie=substr($cpdefniv->getFeccie(),0,4);

			$c = new Criteria();
  			$c->add(CpasiiniPeer::CODPRE,$this->cpasiini->getCodPre());
  			$c->add(CpasiiniPeer::ANOPRE,$anoini,Criteria::GREATER_EQUAL);
  			$c->add(CpasiiniPeer::ANOPRE,$anocie,Criteria::LESS_EQUAL);
  			$c->add(CpasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
  			$c->addAscendingOrderByColumn(CpasiiniPeer::CODPRE);
  			$c->addAscendingOrderByColumn(CpasiiniPeer::ANOPRE);
  			$c->addAscendingOrderByColumn(CpasiiniPeer::PERPRE);
    		$reg = CpasiiniPeer::doSelect($c);
		} else {}

		$this->obj = H::getConfigGrid('grid_cpasiini_edit',$reg);
		$this->params['grid'] = $this->obj;
	}

	public function executeAjax() {
		$codigo = $this->getRequestParameter('codigo','');
    	$ajax = $this->getRequestParameter('ajax','');

    	switch ($ajax){
      		case '1':
      			$output = '[["","",""],["","",""],["","",""]]';
        	break;
      		default:
        		$output = '[["","",""],["","",""],["","",""]]';
        }

    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }


	public function validateEdit(){
    	$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->cpasiini = $this->getCpasiiniOrCreate();
			$this->configGrid();
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  		$this->coderr = Presupuesto::validarPreasiini($this->cpasiini,$grid);
	  		if($this->coderr!=-1) {
	    		return false;
	  		} else return true;
	  	} else return true;
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

  public function saving($clasemodelo){
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Presupuesto::salvarPreasiini($clasemodelo,$grid);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
