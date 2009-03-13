<?php

/**
 * liempofe actions.
 *
 * @package    siga
 * @subpackage liempofe
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class licempofeActions extends autolicempofeActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if ($this->liempofe->getId())
      $this->configGrid($this->liempofe->getCodLic());
    else $this->configGrid($this->getRequestParameter('liempofe[codlic]'));

  }

   public function configGrid($codlic='')
   {
    $c = new Criteria();
    $c->add(LiempofePeer::CODLIC,$codlic);
    $regoferentes =  LiempofePeer::doSelect($c);;

    $regempofe = array();

    $c = new Criteria();
    $c->add(LiempparPeer::CODLIC,$this->liempofe->getCodlic());

    $regparticipantes = LiempparPeer::doSelect($c);

    if($regparticipantes){
      foreach($regparticipantes as $rec){
        $codpropar = $rec->getCodpro();
        $encontrado=false;
        $codproofe= '';
        $idofe="";
        if($regoferentes){
          foreach($regoferentes as $r){
            if($r->getCodpro()==$codpropar){
              $encontrado=true;
              $codproofe = $r->getCodpro();
              $idofe=$r->getId();
            }
          }
        }

        if($codproofe!=''){
          $regaxu = LiempofePeer::retrieveByPK($idofe);
          $regaxu->setOferente(true);
        }else{
          $regaxu = new Liempofe();
          $regaxu->setCodpro($codpropar);
          $regaxu->setCodlic($codlic);
          $regaxu->afterHydrate();
        }

        //if($encontrado) $regaxu->setEntregado(true);
        //else $regaxu->setEntregado(false);

        $regempofe[] = $regaxu;
      }
    }
 //  H::PrintR($regempofe);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licempofe/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empresas');
    $this->obj = $this->columnas[0]->getConfig($regempofe);

    $this->liempofe->setObjempresas($this->obj);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $javascript="";
    switch ($ajax){
      case '1':
       $c= new Criteria();
	   $c->add(LireglicPeer::CODLIC,$codigo);
       $reg=LireglicPeer::doSelectOne($c);
       if ($reg)
       {
       	$cri= new Criteria();
	    $cri->add(LiempparPeer::CODLIC,$codigo);
        $regemp=LiempparPeer::doSelectOne($cri);
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
            $javascript="alert('La Licitación no tiene empresas participantes registradas');";
        }
       }else {
       	$dato="";
       	$id="";
       	$dato1="";
       	$dato2="";
        $javascript="alert('La Licitación no esta Registrada');";
       }
       $output = '[["liempofe_deslic","'.$dato.'",""],["liempofe_destiplic","'.$dato1.'",""],["liempofe_lireglic_id","'.$id.'",""],["liempofe_fecreglic","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
       $this->liempofe = $this->getLiempofeOrCreate();
       $this->liempofe->setCodlic($codigo);
       $this->configGrid($codigo);
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->liempofe= $this->getLiempofeOrCreate();
      $this->updateLiempofeFromRequest();
      $this->configGrid($this->liempofe->getCodlic());

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      $oferente=false;
      foreach($grid[0] as $item){
        if($item->getOferente()){
          $oferente=true;
          if ($item->getMontot()<=0){ $this->coderr = 901; return false;}
        }
      }
      if (!$oferente) { $this->coderr = 902; return false;}

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
      $this->liempofe= $this->getLiempofeOrCreate();
      $this->updateLiempofeFromRequest();
      $this->configGrid();
      $this->liempofe->afterHydrate();

  }

  public function saving($liempofe)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarEmpresasOferentes($liempofe,$grid);
    return -1;
  }

    public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/liempofe/filters');

    // pager
    $this->pager = new sfPropelPager('Lireglic', 10);
    $c = new Criteria();
    $c->addJoin(LireglicPeer::ID,LiempofePeer::LIREGLIC_ID);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getLiempofeOrCreate($id = 'id', $codlic = 'codlic')
  {
    if (!$this->getRequestParameter($codlic))
    {
      $liempofe = new Liempofe();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(LiempofePeer::CODLIC,$this->getRequestParameter($codlic));
  	  $liempofe = LiempofePeer::doSelectOne($c);

      $this->forward404Unless($liempofe);
    }

    return $liempofe;
  }

  public function deleting($liempofe)
  {
    $c= new Criteria();
    $c->add(LiempofePeer::CODLIC,$liempofe->getCodlic());
    LiempofePeer::doDelete($c);

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
