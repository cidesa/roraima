<?php

/**
 * oycoferpre actions.
 *
 * @package    siga
 * @subpackage oycoferpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycoferpreActions extends autooycoferpreActions
{
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/ocoferpre/filters');

    // pager
    $this->pager = new sfPropelPager('Ocemppar', 10);
    $c = new Criteria();
    $c->addJoin(OcempparPeer::CODPRO,OcoferprePeer::CODPRO);
    $c->addJoin(OcempparPeer::CODOBR,OcoferprePeer::CODOBR);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function editing()
  {
    if ($this->ocoferpre->getId())
    $this->configGrid2($this->ocoferpre->getCodobr(),$this->ocoferpre->getCodpro());
    else $this->configGrid($this->getRequestParameter('ocoferpre[codobr]'));
  }

  public function configGrid2($codigoobr='',$codpro='')
  {
    $c = new Criteria();
  	$c->add(OcoferprePeer::CODOBR,$codigoobr);
  	$c->add(OcoferprePeer::CODPRO,$codpro);
  	$obraspartidas = OcoferprePeer::doSelect($c);
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/oycoferpre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas_con',$obraspartidas);

    $this->ocoferpre->setObjpartidas($this->obj);
  }

  public function configGrid($codigoobr='')
  {
    $c = new Criteria();
  	$c->add(OcpreobrPeer::CODOBR,$codigoobr);
  	$obraspartidas = OcpreobrPeer::doSelect($c);
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/oycoferpre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas',$obraspartidas);

    $this->ocoferpre->setObjpartidas($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $javascript="";
    $dato="";
    switch ($ajax){
      case '1':
       $c= new Criteria();
	   $c->add(OcempparPeer::CODPRO,$codigo);
       $reg=OcempparPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getNompro();
       }else {
       $javascript="alert('El Contratista no existe como Empresa Ofertante');";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
      case '2':
       $c= new Criteria();
	   $c->add(OcregobrPeer::CODOBR,$codigo);
       $reg=OcregobrPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getDesobr();
       	$this->ocoferpre=$this->getOcoferpreOrCreate();
       	$this->configGrid($codigo);
       }else {
       $javascript="alert('La Obra no esta registrada');";
       }

       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

  }


  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {

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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($ocoferpre)
  {
   $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Obras::salvarPresupEmp($ocoferpre,$grid);
    return -1;
  }

  public function deleting($ocoferpre)
  {
    $c= new Criteria();
    $c->add(OcoferprePeer::CODPRO,$ocoferpre->getCodpro());
    $c->add(OcoferprePeer::CODOBR,$ocoferpre->getCodobr());
    OcoferprePeer::doDelete($c);

    return -1;
  }

  protected function getOcoferpreOrCreate($id = 'id', $contratista='contratista', $obra='obra')
  {
    if (!$this->getRequestParameter($contratista))
    {
      $ocoferpre = new Ocoferpre();
    }
    else
    {
      //$ocoferpre = OcoferprePeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(OcoferprePeer::CODPRO,$this->getRequestParameter($contratista));
  	  $c->add(OcoferprePeer::CODOBR,$this->getRequestParameter($obra));
  	  $ocoferpre = OcoferprePeer::doSelectOne($c);

      $this->forward404Unless($ocoferpre);
    }

    return $ocoferpre;
  }


}
