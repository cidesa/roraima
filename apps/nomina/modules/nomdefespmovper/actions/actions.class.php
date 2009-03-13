<?php

/**
 * nomdefespmovper actions.
 *
 * @package    siga
 * @subpackage nomdefespmovper
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespmovperActions extends autonomdefespmovperActions
{
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdefmov/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 10);
    $c = new Criteria();
    $c->addJoin(NpdefmovPeer::CODNOM,NpnominaPeer::CODNOM);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeEdit()
  {
    $this->npdefmov = $this->getNpdefmovOrCreate();
    $this->configGrid($this->npdefmov->getCodnom());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdefmovFromRequest();

      $this->saveNpdefmov($this->npdefmov);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespmovper/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespmovper/list');
      }
      else
      {
        return $this->redirect('nomdefespmovper/edit?id='.$this->npdefmov->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function getNpdefmovOrCreate($id = 'id', $nomina = 'nomina')
  {
    if (!$this->getRequestParameter($nomina))
    {
      $npdefmov = new Npdefmov();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpdefmovPeer::CODNOM,$this->getRequestParameter($nomina));
  	  $npdefmov = NpdefmovPeer::doSelectOne($c);
      $this->forward404Unless($npdefmov);
    }

    return $npdefmov;
  }

  protected function updateNpdefmovFromRequest()
  {
    $npdefmov = $this->getRequestParameter('npdefmov');
    $this->configGrid($npdefmov['codnom']);

    if (isset($npdefmov['codnom']))
    {
      $this->npdefmov->setCodnom($npdefmov['codnom']);
    }
    if (isset($npdefmov['nomnom']))
    {
      $this->npdefmov->setNomnom($npdefmov['nomnom']);
    }
  }

    public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npdefmov = $this->getNpdefmovOrCreate();
    $this->updateNpdefmovFromRequest();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->obj);

    return sfView::SUCCESS;
  }

   public function executeDelete()
  {
    $c = new Criteria();
  	$c->add(NpdefmovPeer::CODNOM,$this->getRequestParameter('nomina'));
    $this->npdefmov = NpdefmovPeer::doSelectOne($c);

    $this->forward404Unless($this->npdefmov);

    try
    {
      $this->deleteNpdefmov($this->npdefmov);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npdefmov. Make sure it does not have any associated items.');
      return $this->forward('nomdefespmovper', 'list');
    }

    return $this->redirect('nomdefespmovper/list');
  }

  protected function saveNpdefmov($npdefmov)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
	Nomina::salvarNomdefmov($npdefmov,$grid);
  }

  protected function deleteNpdefmov($npdefmov)
  {
    $npdefmov->delete();
  }

  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	    $dato="";
	    $existe="N";
		$c= new Criteria();
		$c->add(NpdefmovPeer::CODNOM,$this->getRequestParameter('codigo'));
		$data= NpdefmovPeer::doSelect($c);
		if (empty($data))
		{
		 $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
		 $this->configGrid($this->getRequestParameter('codigo'));
		 $output = '[["dupli","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		}
		else
		{
		  $existe="S";
		  $this->configGrid();
		  $output = '[["dupli","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
		  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		  //return sfView::HEADER_ONLY;
		}

	  }
	}


  public function configGrid($codnom= '')
  {
    $sql="Select a.codcon as codcon ,b.nomcon as nomcon, coalesce((select 1 as checkm
		  from  npdefmov where codnom='".$codnom."' and status='M' and a.codnom = codnom and codcon = a.codcon  ),0) as monto,
          coalesce((select 1 as checkc from  npdefmov where codnom='".$codnom."' and status='C' and a.codnom = codnom and codcon = a.codcon  ),0) as cantidad,
          9 as id	 from Npasiconnom a, npdefcpt b
          where a.codnom='".$codnom."' and a.codcon=b.codcon order by a.codcon";

	$resp = Herramientas::BuscarDatos($sql,&$reg);

	$opciones = new OpcionesGrid();
	$opciones->setTabla('Npdefmov');
	$opciones->setAnchoGrid(500);
	$opciones->setTitulo('');
	$opciones->setHTMLTotalFilas(' ');
	$opciones->setFilas(0);

	$col1 = new Columna('Código');
	$col1->setTipo(Columna::TEXTO);
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);
	$col1->setNombreCampo('Codcon');
	$col1->setEsGrabable(true);
	$col1->setHTML('type="text" size="5" readonly=true');

	$col2 = new Columna('Nombre del Concepto');
	$col2->setTipo(Columna::TEXTO);
	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
	$col2->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setNombreCampo('Nomcon');
	$col2->setHTML('type="text" size="45" readonly=true');

	$col3 = new Columna('Monto');
	$col3->setTipo(Columna::CHECK);
	$col3->setEsGrabable(true);
	$col3->setNombreCampo('monto');
	$col3->setHTML(' ');

	$col4 = new Columna('Cantidad');
	$col4->setTipo(Columna::CHECK);
	$col4->setEsGrabable(true);
	$col4->setNombreCampo('cantidad');
	$col4->setHTML(' ');

	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);

	$this->obj = $opciones->getConfig($reg);
   }

  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npdefmov[codnom]'));
	}
  }

}
