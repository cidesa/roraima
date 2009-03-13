<?php

/**
 * tesrencajchi actions.
 *
 * @package    siga
 * @subpackage tesrencajchi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesrencajchiActions extends autotesrencajchiActions
{
   public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opordpag/filters');

    $b= new Criteria();
  	$dat=OpdefempPeer::doSelectOne($b);
  	if ($dat)
  	{
  	  $tiprencajchi=$dat->getTiprencajchi();
  	}else $tiprencajchi="";

     // 15    // pager
    $this->pager = new sfPropelPager('Opordpag', 15);
    $c = new Criteria();
    $c->add(OpordpagPeer::TIPCAU,$tiprencajchi);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function editing()
  {
   $this->setVars();
   $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridDetalle($this->opordpag->getNumord(),$this->opordpag->getCodcat(),$this->opordpag->getTipcau(),$this->getRequestParameter('opordpag[fecemi]'));
  }

  public function configGridDetalle($numord='',$codcat='',$tipren='',$fecha='')
  {
  	if ($fecha=='') $fecha=date('d/m/Y');
  	if ($numord=='')
  	{
      $sql = "Select '".$codcat."'||'-'||B.CodPar as codpre,Sum(A.MonSal) as moncau, 9 as id From TSDetSal A,CARegArt B Where A.RefSal In (Select C.RefSal From TSSalCaj C Where C.FecSal<=TO_DATE('".$fecha."','dd/mm/yyyy') And C.StaSal='P') And A.CodArt=B.CodArt Group By B.CodPar";
	  Herramientas :: BuscarDatos($sql, & $reg);
	  $detalle=$reg;
  	}
  	else
  	{
  	  $c = new Criteria();
  	  $c->add(OpdetordPeer::NUMORD,$numord);
  	  $detalle = OpdetordPeer::doSelect($c);
  	}

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesrencajchi/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_opdetord');
    $this->columnas[1][1]->setEsTotal(true,'opordpag_monord');
    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript="";
    switch ($ajax){
      case '1':
        //$fecha=date('Y-m-d',strtotime($codigo));
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opordpag = $this->getOpordpagOrCreate();
        $this->setVars();
        $this->configGridDetalle('',$this->opordpag->getCodcat(),$this->opordpag->getTipcau(),$codigo);
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $c= new Criteria();
        $c->add(BnubicaPeer::CODUBI,$codigo);
        $resul= BnubicaPeer::doSelectOne($c);
        if ($resul)
        {
          $dato=$resul->getDesubi();
        }else {
        	$dato=""; $javascript="alert_('El C&oacute;digo de la Unidad Origen no existe'); $('$cajtexcom').value='';";
        }
        $output = '[["javascript",""'.$javascript.',""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '3':
        $c= new Criteria();
        $c->add(FortipfinPeer::CODFIN,$codigo);
        $resul= FortipfinPeer::doSelectOne($c);
        if ($resul)
        {
          $dato=$resul->getNomext();
        }else {
        	$dato=""; $javascript="alert_('El C&oacute;digo de Financiamiento no existe'); $('opordpag_tipfin').value='';";
        }
        $output = '[["javascript",""'.$javascript.',""],["opordpag_nomext2","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
    }
  }


  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);

  }

    public function setVars()
  {
  	$b= new Criteria();
  	$dat=OpdefempPeer::doSelectOne($b);
  	if ($dat)
  	{
  	  $this->opordpag->setTipcau($dat->getTiprencajchi());
  	  $this->opordpag->setCedrif($dat->getCedrifcajchi());
  	  $this->opordpag->setCodcat($dat->getCodcatcajchi());
  	}
  	$mascaraubi=Herramientas::ObtenerFormato('Opdefemp','Forubi');
    $this->opordpag->setMascaraubi($mascaraubi);
    $this->opordpag->setLonubi(strlen($mascaraubi));
  }

  protected function saving($opordpag)
  {
    if ($opordpag->getId())
    {
      $opordpag->save();
    }else {
      $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
      Tesoreria::salvarRendicionCajaChica($opordpag,$grid);
    }
    return -1;

  }

  protected function deleting($opordpag)
  {
   // return -1;

  }


}
