<?php

/**
 * licasptecanalisis actions.
 *
 * @package    siga
 * @subpackage licasptecanalisis
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class licasptecanalisisActions extends autolicasptecanalisisActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if ($this->liasptecanalis->getId())
      $this->configGrid($this->liasptecanalis->getCodlic(),$this->liasptecanalis->getCodpro() );
    else $this->configGrid($this->getRequestParameter('liasptecanalis[codlic]'),$this->getRequestParameter('liasptecanalis[codpro]'));

  }

   public function configGrid($codlic,$codpro)
   {
    $c = new Criteria();
    $c->add(LiasptecanalisPeer::CODLIC,$codlic);
    $c->add(LiasptecanalisPeer::CODPRO,$codpro);
    $regcriteriosoferentes =  LiasptecanalisPeer::doSelect($c);;

    $regfinal = array();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(LiaspteccrievaPeer :: CODCRI);
    $regcriterios = LiaspteccrievaPeer::doSelect($c);

    if($regcriterios){
      foreach($regcriterios as $rec){
        $idcriterio = $rec->getId();
        $encontrado=false;
        $id="";
        if($regcriteriosoferentes){
          foreach($regcriteriosoferentes as $r){
            if($r->getLiaspteccrievaId()==$idcriterio){
              $encontrado=true;
              $id=$r->getId();
            }
          }
        }

        if($id!=''){
          $regaxu = LiasptecanalisPeer::retrieveByPK($id);
          $regaxu->setSeleccionado(true);
        }else{
          $regaxu = new Liasptecanalis();
          $regaxu->setLiaspteccrievaId($idcriterio);
          $regaxu->setCodlic($codlic);
          $regaxu->setCodpro($codpro);
          $regaxu->afterHydrate();
        }

        $regfinal[] = $regaxu;
      }
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licasptecanalisis/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_criterios');
    $this->columnas[1][4]->setHTML('onBlur=javascript: ValidarMontoGridv2(this); ValidarPuntaje(this.id); ');
    $this->obj = $this->columnas[0]->getConfig($regfinal);

    $this->liasptecanalis->setObjcriterios($this->obj);
  }


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript="";
    switch ($ajax){
      case '1':
       $c= new Criteria();
	   $c->add(LireglicPeer::CODLIC,$codigo);
       $reg=LireglicPeer::doSelectOne($c);
       if ($reg)
       {
       	$cri= new Criteria();
	    $cri->add(LiempofePeer::CODLIC,$codigo);
        $regemp=LiempofePeer::doSelectOne($cri);
		if ($regemp)
        {
	       	$dato=$reg->getDeslic();
	       	$id=$reg->getId();
	       	$dato1=$reg->getLitiplic()->getDestiplic();
	       	$dato2=date("d/m/Y",strtotime($reg->getFecreg()));
        }
        else//la licitacion no tiene empresas participantes asociadas
        {
        	$dato="";
         	$id="";
        	$dato1="";
        	$dato2="";
            $javascript="alert('La Licitación no tiene empresas oferentes registradas');";
        }
       }else {
       	$dato="";
       	$id="";
       	$dato1="";
       	$dato2="";
        $javascript="alert('La Licitación no esta Registrada');";
       }
       $output = '[["liasptecanalis_deslic","'.$dato.'",""],["liasptecanalis_destiplic","'.$dato1.'",""],["liasptecanalis_lireglic_id","'.$id.'",""],["liasptecanalis_fecreglic","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
       break;
     case '2':
      $codlic = $this->getRequestParameter('codlic','');
      if ($codlic=='')
      {
        $dato="";
        $javascript="alert('Primero debe seleccionar el Código de la Licitación');";
      }
      else
      {
       $c= new Criteria();
	   $c->add(CaproveePeer::CODPRO,$codigo);
       $reg=CaproveePeer::doSelectOne($c);
       if ($reg)
       {
       	$cri= new Criteria();
	    $cri->add(LiempofePeer::CODPRO,$codigo);
	    $cri->add(LiempofePeer::CODLIC,$codlic);
        $regemp=LiempofePeer::doSelectOne($cri);
		if ($regemp)
        {
	       	$dato=$reg->getNompro();
	       	$javascript="";
        }
        else//la licitacion no tiene empresas participantes asociadas
        {
        	$dato="";
            $javascript="alert('Esta empresa no es oferente para la Licitación Seleccionada');";
        }
       }else {
       	$dato="";
        $javascript="alert('La Empresa no esta Registrada');";
       }
      }// if ($codlic=='')
       $output = '[["liasptecanalis_nompro","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->liasptecanalis =  new Liasptecanalis();
       $this->liasptecanalis->setCodlic($codlic);
       $this->liasptecanalis->setCodpro($codigo);
       $this->configGrid($codlic, $codigo);
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       break;

     default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

  }


  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->liasptecanalis= $this->getLiasptecanalisOrCreate();
      $this->updateLiasptecanalisFromRequest();
      $this->configGrid($this->liasptecanalis->getCodlic(), $this->liasptecanalis->getCodpro());

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      if ($this->liasptecanalis->getCodpro() and $this->liasptecanalis->getCodlic())
      {
		  $cri= new Criteria();
		  $cri->add(LiempofePeer::CODPRO,$this->liasptecanalis->getCodpro());
		  $cri->add(LiempofePeer::CODLIC,$this->liasptecanalis->getCodlic());
		  $regemp=LiempofePeer::doSelectOne($cri);
		  if (!$regemp) { $this->coderr = 905; return false;}
      }
      $oferente=false;
      foreach($grid[0] as $item){
        if($item->getSeleccionado()){
          $oferente=true;
          if ($item->getPuntaje()<=0){ $this->coderr = 906; return false;}
        }
      }
      if (!$oferente) { $this->coderr = 907; return false;}

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
      $this->liasptecanalis= $this->getLiasptecanalisOrCreate();
      $this->updateLiasptecanalisFromRequest();
      $this->configGrid($this->liasptecanalis->getCodlic(), $this->liasptecanalis->getCodpro());
      $this->liasptecanalis->afterHydrate();

  }

  public function saving($liasptecanalis)
  {
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarEmpresasCriteriosTecnicos($liasptecanalis,$grid);
    return -1;
  }

 public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/liasptecanalis/filters');

    // pager
    $this->pager = new sfPropelPager('Liempofe', 10);
    $c = new Criteria();
    $c->addJoin(LiempofePeer::LIREGLIC_ID,LiasptecanalisPeer::LIREGLIC_ID);
    $c->addJoin(LiempofePeer::CODPRO,LiasptecanalisPeer::CODPRO);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getLiasptecanalisOrCreate($id = 'id', $codlic = 'codlic', $codpro = 'codpro')
  {
    if (!$this->getRequestParameter($codlic))
    {
      $liasptecanalis = new Liasptecanalis();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(LiasptecanalisPeer::CODLIC,$this->getRequestParameter($codlic));
  	  $c->add(LiasptecanalisPeer::CODPRO,$this->getRequestParameter($codpro));
  	  $liasptecanalis = LiasptecanalisPeer::doSelectOne($c);

      $this->forward404Unless($liasptecanalis);
    }

    return $liasptecanalis;
  }

  public function deleting($liasptecanalis)
  {
    $c= new Criteria();
    $c->add(LiasptecanalisPeer::CODLIC,$liasptecanalis->getCodlic());
    $c->add(LiasptecanalisPeer::CODPRO,$liasptecanalis->getCodpro());
    LiasptecanalisPeer::doDelete($c);

    return -1;
  }

  public function handleErrorEdit()
  {
    $this->updateError();
    $this->params=array();

    $this->labels = $this->getLabels();
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
