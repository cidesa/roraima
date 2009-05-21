<?php

/**
 * nomdefconretencion actions.
 *
 * @package    siga
 * @subpackage nomdefconretencion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefconretencionActions extends autonomdefconretencionActions
{
  public function executeEdit()
  {
    $this->npcontipaporet = $this->getNpcontipaporetOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpcontipaporetFromRequest();

      $this->saveNpcontipaporet($this->npcontipaporet);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefconretencion/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefconretencion/list');
      }
      else
      {
        return $this->redirect('nomdefconretencion/edit?id='.$this->npcontipaporet->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function getNpcontipaporetOrCreate($id = 'id', $codigo = 'codigo')
  {
    if (!$this->getRequestParameter($codigo))
    {
      $npcontipaporet = new Npcontipaporet();
      $this->configGrid();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpcontipaporetPeer::CODTIPAPO,$this->getRequestParameter($codigo));
  	  $npcontipaporet = NpcontipaporetPeer::doSelectOne($c);

      $this->configGrid($npcontipaporet->getCodtipapo());
      $this->forward404Unless($npcontipaporet);
    }

    return $npcontipaporet;
  }

   public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npcontipaporet = $this->getNpcontipaporetOrCreate();
    $this->updateNpcontipaporetFromRequest();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->grid);

    return sfView::SUCCESS;
  }

  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	   if ($this->getRequestParameter('ajax')=='1')
	    {
			$dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
			$dato="";
		  $c= new Criteria();
          $c->add(NpdefcptPeer::CODCON,$this->getRequestParameter('codigo'));
          $datos= NpdefcptPeer::doSelectOne($c);
          if ($datos)
          {
          	$c = new Criteria();
            $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
            $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigo'));
            $resul= NpasiconnomPeer::doSelectOne($c);
            if ($resul)
            {
              $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
              $existe='S';
            }
            else
            {
          	  $existe='N';
            }
          }
          else
          {
            $existe='NN';
          }
          $output = '[["existecon","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
		else if ($this->getRequestParameter('ajax')=='3')
	    {
			$dato=NptipaportesPeer::getDestip($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
	    }


  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

  public function configGrid($codigo='')
  {
	$c = new Criteria();
	$c->add(NpcontipaporetPeer::CODTIPAPO,$codigo);
	$c->add(NpcontipaporetPeer::TIPO,'R');
	$per = NpcontipaporetPeer::doSelect($c);

	$opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npcontipaporet');
	$opciones->setAnchoGrid(850);
	$opciones->setFilas(50);
	$opciones->setTitulo('Conceptos para Retenciones');
	$opciones->setHTMLTotalFilas(' ');

	$col1 = new Columna('Codigo de Nomina');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('codnom');
	$col1->setAlineacionObjeto(Columna::CENTRO);
	$col1->setAlineacionContenido(Columna::CENTRO);
	$col1->setHTML('type="text" size="15"');
	$col1->setCatalogo('Npnomina','sf_admin_edit_form',array('codnom' => 1, 'nomnom' => 2),'Npnomina_Nomdefespasicartipnomlot');
	$col1->setAjax('nomdefconaportes',1,2);

	$col2 = new Columna('Descripción');
	$col2->setTipo(Columna::TEXTO);
	$col2->setNombreCampo('nomina');
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);
	$col2->setHTML('type="text" size="40" readonly=true');

    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
	$col3 = new Columna('Codigo Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('codcon');
    $col3->setAlineacionObjeto(Columna::CENTRO);
	$col3->setAlineacionContenido(Columna::CENTRO);
	$col3->setHTML('type="text" size="10"');
    $col3->setCatalogo('Npdefcpt','sf_admin_edit_form',array('codcon' => 3, 'nomcon' => 4),'Npdefcpt_Nomdefconaportes',$params);
	$col3->setJScript('onBlur="javascript:event.keyCode=13; ajax(event,this.id);"');

	$col4 = new Columna('Concepto');
	$col4->setTipo(Columna::TEXTO);
	$col4->setNombreCampo('concepto');
	$col4->setAlineacionObjeto(Columna::CENTRO);
	$col4->setAlineacionContenido(Columna::CENTRO);
	$col4->setHTML('type="text" size="20" readonly=true');

   	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);

	$this->grid = $opciones->getConfig($per);
  }

protected function saveNpcontipaporet($npcontipaporet)
  {
	$grid2=Herramientas::CargarDatosGrid($this,$this->grid);
	Nomina::salvarContipaporet2($npcontipaporet,$grid2);

  }

 public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npconsalint[codnom]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','CODCON',$this->getRequestParameter('npconsalint[codcon]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='3')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODTIPAPO','Nptipaportes','CODTIPAPO',$this->getRequestParameter('npcontipaporet[codtipapo]'));
	    }
	}

	 public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npcontipaporet/filters');

    // pager
    $this->pager = new sfPropelPager('Nptipaportes', 5);
    $c = new Criteria();
    $c->addJoin(NpcontipaporetPeer::CODTIPAPO,NptipaportesPeer::CODTIPAPO);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeDelete()
  {
    $c = new Criteria();
  	$c->add(NpcontipaporetPeer::CODTIPAPO,$this->getRequestParameter('codigo'));
    $this->npcontipaporet = NpcontipaporetPeer::doSelectOne($c);
    $this->forward404Unless($this->npcontipaporet);

    try
    {
      $this->deleteNpcontipaporet($this->npcontipaporet);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npcontipaporet. Make sure it does not have any associated items.');
      return $this->forward('nomdefconretencion', 'list');
    }

    return $this->redirect('nomdefconretencion/list');
  }

   protected function deleteNpcontipaporet($npcontipaporet)
  {
     $c = new Criteria();
  	$c->add(NpcontipaporetPeer::CODTIPAPO,$npcontipaporet->getCodtipapo());
  	NpcontipaporetPeer::doDelete($c);
  }
}
