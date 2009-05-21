<?php

/**
 * nomdefdiaadicnom actions.
 *
 * @package    siga
 * @subpackage nomdefdiaadicnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefdiaadicnomActions extends autonomdefdiaadicnomActions
{


public function executeEdit()
  {
    $this->npdiaadicnom = $this->getNpdiaadicnomOrCreate();
    $this->configGrid($this->npdiaadicnom->getCodnom());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdiaadicnomFromRequest();

      $this->saveNpdiaadicnom($this->npdiaadicnom);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefdiaadicnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefdiaadicnom/list');
      }
      else
      {
        return $this->redirect('nomdefdiaadicnom/edit?id='.$this->npdiaadicnom->getCodnom());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function configGrid($codnom='')
  {
    $sql="Select coalesce((select (CASE when codcon is not null then 1 end) as check1
            from  npdiaadicnom where codnom='".$codnom."' and a.codnom = codnom and codcon = a.codcon  ),0) as check,a.codcon,b.nomcon, 9 as id
            from Npasiconnom a, npdefcpt b
            where a.codnom='".$codnom."' and a.codcon=b.codcon order by a.codcon";

    $resp = Herramientas::BuscarDatos($sql,&$per);

    $opciones = new OpcionesGrid();
    $opciones->setTabla('Npdiaadicnom');
    $opciones->setAnchoGrid(600);
    $opciones->setTitulo('Conceptos');
    $opciones->setHTMLTotalFilas(' ');
    $opciones->setFilas(0);
    $opciones->setEliminar(false);

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');

    $col2 = new Columna('Cod. Concepto');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Codcon');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="5" readonly=true');

    $col3 = new Columna('Nombre del Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('Nomcon');
    $col3->setHTML('type="text" size="50" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);

	}
	public function executeAjax()
	{
	$cajtexmos=$this->getRequestParameter('cajtexmos');
	$cajtexcom=$this->getRequestParameter('cajtexcom');

    if ($this->getRequestParameter('ajax')=='1')
	{ $dato="";
	  $existe="N";
		$c= new Criteria();
		$c->add(NpdiaadicnomPeer::CODNOM,$this->getRequestParameter('codigo'));
		$data= NpdiaadicnomPeer::doSelect($c);
		if (empty($data))
		{
		 $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
		 $this->configGrid($this->getRequestParameter('codigo'));
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""],["duplicado","'.$existe.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		}
		else
		{
		  $existe="S";
		   $this->configGrid();
		  $output = '[["duplicado","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
		  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		  return sfView::HEADER_ONLY;
		}
	}
  }


  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	 $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npdiaadicnom[codnom]'));
	}
  }

  protected function saveNpdiaadicnom($npdiaadicnom)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    Nomina::salvarNomdefdiaadicnom($npdiaadicnom,$grid);

  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdiaadicnom/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();
    $c->addJoin(NpdiaadicnomPeer::CODNOM,NpnominaPeer::CODNOM);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getNpdiaadicnomOrCreate($id = 'id', $nomina = 'nomina')
  {
    if (!$this->getRequestParameter($nomina))
    {
      $npdiaadicnom = new Npdiaadicnom();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpdiaadicnomPeer::CODNOM,$this->getRequestParameter($nomina));
  	  $npdiaadicnom = NpdiaadicnomPeer::doSelectOne($c);

      $this->forward404Unless($npdiaadicnom);
    }

    return $npdiaadicnom;
  }

  protected function updateNpdiaadicnomFromRequest()
  {
    $npdiaadicnom = $this->getRequestParameter('npdiaadicnom');
    $this->configGrid($npdiaadicnom['codnom']);

    if (isset($npdiaadicnom['codnom']))
    {
      $this->npdiaadicnom->setCodnom($npdiaadicnom['codnom']);
    }
    if (isset($npdiaadicnom['nomnom']))
    {
      $this->npdiaadicnom->setNomnom($npdiaadicnom['nomnom']);
    }
  }

  public function executeDelete()
  {
    $c = new Criteria();
  	$c->add(NpdiaadicnomPeer::CODNOM,$this->getRequestParameter('nomina'));
    $this->npdiaadicnom = NpdiaadicnomPeer::doSelectOne($c);

    $this->forward404Unless($this->npdiaadicnom);

    try
    {
      $this->deleteNpdiaadicnom($this->npdiaadicnom);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npdiaadicnom. Make sure it does not have any associated items.');
      return $this->forward('nomdefdiaadicnom', 'list');
    }

    return $this->redirect('nomdefdiaadicnom/list');
  }

  protected function deleteNpdiaadicnom($npdiaadicnom)
  {
    $c = new Criteria();
  	$c->add(NpdiaadicnomPeer::CODNOM,$npdiaadicnom->getCodnom());
  	NpdiaadicnomPeer::doDelete($c);
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npdiaadicnom = $this->getNpdiaadicnomOrCreate();
    $this->updateNpdiaadicnomFromRequest();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->obj);

    return sfView::SUCCESS;
  }

}
