<?php

/**
 * fortiting actions.
 *
 * @package    siga
 * @subpackage fortiting
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fortitingActions extends autofortitingActions
{
  public function executeEdit()
  {
    $this->forparing = $this->getForparingOrCreate();
    $this->forpar = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonpar=strlen($this->forpar);
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateForparingFromRequest();

      $this->saveForparing($this->forparing);

      $this->forparing->setId(Herramientas::getX_vacio('codparing','forparing','id',$this->forparing->getCodparing()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fortiting/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fortiting/list');
      }
      else
      {
        return $this->redirect('fortiting/edit?id='.$this->forparing->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function saveForparing($forparing)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    Formulacion::salvarFortiting($forparing,$grid);
  }

  protected function deleteForparing($forparing)
  {
    Formulacion::eliminarFortiting($forparing);
  }

  protected function getForparingOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $forparing = new Forparing();
      $this->configGrid();
    }
    else
    {
      $forparing = ForparingPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($forparing->getCodparing());
      $this->forward404Unless($forparing);
    }

    return $forparing;
  }

  public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->add(ForingdisperPeer::CODPAR,$codigo);
    $c->addAscendingOrderByColumn(ForingdisperPeer::PERPAR);
    $per = ForingdisperPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
    $opciones->setTabla('foringdisper');
    $opciones->setAnchoGrid(200);
    $opciones->setAncho(300);
    $opciones->setTitulo('Distribución Mensual');

    if ($codigo==''){
    	$opciones->setFilas(12);
    }else{ $opciones->setFilas(0);
    }

    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('perpar');
    $col1->setHTML('type="text" size="2" readonly=true');

    $col2 = new Columna('Monto');
    $col2->setTipo(Columna::MONTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setEsNumerico(true);
    $col2->setNombreCampo('monpar');
    $col2->setJScript('onKeypress="entermonto(event,this.id);" onBlur="monto2(this.id);"');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="15"');
    $col2->setEsTotal(true,'suma');

    $col3 = new Columna('% (+/-)');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('porper');
    $col3->setEsNumerico(true);
    $col3->setJScript('onKeypress="entermonto(event,this.id); porcentaje(event,this.id);"');
    $col3->setHTML('type="text" size="5"');
    $col3->setEsTotal(true,'suma2');

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
	    {
			$dato=FordefparingPeer::getDesparing($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','Codfin',$this->getRequestParameter('forparing[codtipfin]'));
	    }
	}

  protected function updateForparingFromRequest()
  {
    $forparing = $this->getRequestParameter('forparing');
    $this->forpar = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonpar=strlen($this->forpar);

    if (isset($forparing['codparing']))
    {
      $this->forparing->setCodparing($forparing['codparing']);
    }
    if (isset($forparing['despar']))
    {
      $this->forparing->setDespar($forparing['despar']);
    }
    if (isset($forparing['montoing']))
    {
      $this->forparing->setMontoing($forparing['montoing']);
      $this->forparing->setMontodis($forparing['montoing']);
    }
    if (isset($forparing['codtipfin']))
    {
      $this->forparing->setCodtipfin($forparing['codtipfin']);
    }
    if (isset($forparing['desfin']))
    {
      $this->forparing->setDesfin($forparing['desfin']);
    }
  }

    public function executeList()
  {
    $this->processSort();

    $this->forpar = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonpar=strlen($this->forpar);

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/forparing/filters');

    // pager
    $this->pager = new sfPropelPager('Forparing', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

	public function setVars()
	{
		$this->asiper = Herramientas :: ObtenerFormato('Fordefniv', 'asiper');
	}
}
