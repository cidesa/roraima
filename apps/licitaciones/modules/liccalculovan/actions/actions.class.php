<?php

/**
 * liccalculovan actions.
 *
 * @package    siga
 * @subpackage liccalculovan
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class liccalculovanActions extends autoliccalculovanActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    if ($this->licalvan->getId())
      $this->configGrid($this->licalvan->getCodLic());
    else $this->configGrid($this->getRequestParameter('licalvan[codlic]'));


  }

   public function configGrid($codlic='')
   {
    $c = new Criteria();
    $c->add(LiempofePeer::CODLIC,$codlic);
    $regoferentes =  LiempofePeer::doSelect($c);;
    $regfinal=array();
     foreach($regoferentes as $reg){
        $cc= new Criteria();
        $cc->add(LicalvanPeer::CODPRO,$reg->getCodpro());
        $cc->add(LicalvanPeer::CODLIC,$codlic);
        $registro=LicalvanPeer::doSelectOne($cc);
        if ($registro)
        {
          $regaxu = $registro;
        }else{
          $regaxu = new Licalvan();
          $regaxu->setCodlic($codlic);
          $regaxu->setCodpro($reg->getCodpro());
          $regaxu->afterHydrate();
        }

        $regfinal[] = $regaxu;
      }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/liccalculovan/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empresas');
    $this->obj = $this->columnas[0]->getConfig($regfinal);

    $this->licalvan->setObjempresas($this->obj);
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
	    $cri->add(LiempofePeer::CODLIC,$codigo);
        $regemp=LiempofePeer::doSelectOne($cri);
		if ($regemp)
        {
	       	$dato=$reg->getDeslic();
	       	$id=$reg->getId();
	       	$dato1=$reg->getLitiplic()->getDestiplic();
	       	$dato2=date("d/m/Y",strtotime($reg->getFecreg()));
        }
        else//la licitacion no tiene empresas oferentes asociadas
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
       $output = '[["licalvan_deslic","'.$dato.'",""],["licalvan_destiplic","'.$dato1.'",""],["licalvan_lireglic_id","'.$id.'",""],["licalvan_fecreglic","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
       $this->licalvan = $this->getLicalvanOrCreate();
       $this->licalvan->setCodlic($codigo);
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

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
      $this->licalvan= $this->getLicalvanOrCreate();
      $this->updateLicalvanFromRequest();
      $this->configGrid($this->licalvan->getCodLic());
     // $this->licalvan->afterHydrate();
  }

  public function saving($licalvan)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarCalculoVAN($licalvan,$grid);
    return -1;
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/licalvan/filters');

    // pager
    $this->pager = new sfPropelPager('Lireglic', 10);
    $c = new Criteria();
    $c->addJoin(LireglicPeer::ID,LicalvanPeer::LIREGLIC_ID);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


  protected function getLicalvanOrCreate($id = 'id', $codlic = 'codlic')
  {
    if (!$this->getRequestParameter($codlic))
    {
      $licalvan = new Licalvan();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(LicalvanPeer::CODLIC,$this->getRequestParameter($codlic));
  	  $licalvan = LicalvanPeer::doSelectOne($c);

      $this->forward404Unless($licalvan);
    }

    return $licalvan;
  }

  public function deleting($licalvan)
  {
    $c= new Criteria();
    $c->add(LicalvanPeer::CODLIC,$licalvan->getCodlic());
    LicalvanPeer::doDelete($c);

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
