<?php

/**
 * preasiini actions.
 *
 * @package    Roraima
 * @subpackage preasiini
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preasiiniActions extends autopreasiiniActions
{
	public function executeIndex() {
		return $this->redirect('preasiini/list');
    }

/**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpasiini/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Cpasiini', 15);
    $c = new Criteria();
    $c->add(CpasiiniPeer::PERPRE,'00');
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

	public function editing() {
	  $mascarapre=Herramientas::ObtenerFormato('Cpdefniv','Forpre');
      $this->cpasiini->setMascarapre($mascarapre);
      $this->cpasiini->setLonpre(strlen($mascarapre));
      $this->cpasiini->setAnopre(date('Y'));
	  $this->configGrid($this->cpasiini->getMonasi());
	}

	public function configGrid($monasi=0,$reg = array()) {
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
		}else{ $reg=Presupuesto::llenarPer($this->cpasiini->getNumper(),$monasi);}

		$this->obj = H::getConfigGrid(($this->cpasiini->getId()=='' && $this->cpasiini->getAsiper()=='N') ? 'grid_cpasiini_asigN' : 'grid_cpasiini_con');
		$this->obj = $this->obj[0]->getConfig($reg);
		$this->params['grid'] = $this->obj;
	}

	public function executeAjax() {
		$codigo = $this->getRequestParameter('codigo','');
    	$ajax = $this->getRequestParameter('ajax','');
    	$cajtexcom = $this->getRequestParameter('cajtexcom','');
    	$cajtexmos = $this->getRequestParameter('cajtexmos','');
    	$javascript=""; $dato="";

    	switch ($ajax){
      		case '1':
                $longitud=strlen(Herramientas::ObtenerFormato('Cpdefniv','Forpre'));
                if ($longitud==strlen($codigo))
                {
                  $c= new Criteria();
                  $c->add(CpdeftitPeer::CODPRE,$codigo);
                  $reg= CpdeftitPeer::doSelectOne($c);
                  if ($reg)
                  {
                  	$dato=$reg->getNompre();
                  }else{
                  	$javascript="alert_('El C&oacute;digo Presupuestario no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                  }

                }else{
                	$javascript="alert_('El C&oacute;digo Presupuestario no es de &Uacute;ltimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                }
      			$output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        	break;
        	case '2':
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
			$this->updateCpasiiniFromRequest();
			$this->configGrid($this->cpasiini->getMonasi());
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
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
    $this->configGrid($this->cpasiini->getMonasi());
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  }

  public function saving($clasemodelo){
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
    return Presupuesto::salvarPreasiini($clasemodelo,$grid);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
