<?php

/**
 * forsegpoa actions.
 *
 * @package    siga
 * @subpackage forsegpoa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class forsegpoaActions extends autoforsegpoaActions
{
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->setVars();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordismetperpryaccmet/filters');

    // pager
    $this->pager = new sfPropelPager('Forencpryaccespmet', 5);
    $c = new Criteria();
    $c->addJoin(FordismetperpryaccmetPeer::CODPRO,ForencpryaccespmetPeer::CODPRO);
    $c->addJoin(FordismetperpryaccmetPeer::CODACCESP,ForencpryaccespmetPeer::CODACCESP);
    $c->addJoin(FordismetperpryaccmetPeer::CODMET,ForencpryaccespmetPeer::CODMET);
    $c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getFordismetperpryaccmetOrCreate($id = 'id', $codpro= 'codpro', $accion= 'accion', $meta= 'meta')
  {
    if (!($this->getRequestParameter($codpro)) && !($this->getRequestParameter($accion)) && !($this->getRequestParameter($meta)) && !$this->getRequestParameter($id) )
    {
    	//exit('1');
      $fordismetperpryaccmet = new Fordismetperpryaccmet();
    }
    else
    {
    	$fordismetperpryaccmet = FordismetperpryaccmetPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();

      if ($this->getRequestParameter($codpro))
      {
  	  	$c->add(FordismetperpryaccmetPeer::CODPRO,$this->getRequestParameter($codpro));
  	  	$c->add(FordismetperpryaccmetPeer::CODACCESP,$this->getRequestParameter($accion));
  	  	$c->add(FordismetperpryaccmetPeer::CODMET,$this->getRequestParameter($meta));
      }else{
  	  	$c->add(FordismetperpryaccmetPeer::CODPRO,$fordismetperpryaccmet->getCodpro());
  	  	$c->add(FordismetperpryaccmetPeer::CODACCESP,$fordismetperpryaccmet->getCodaccesp());
  	  	$c->add(FordismetperpryaccmetPeer::CODMET,$fordismetperpryaccmet->getCodmet());
      }
  	  $fordismetperpryaccmet = FordismetperpryaccmetPeer::doSelectOne($c);
      $this->forward404Unless($fordismetperpryaccmet);
    }

    return $fordismetperpryaccmet;
  }

  public function executeEdit()
  {
    $this->fordismetperpryaccmet = $this->getFordismetperpryaccmetOrCreate();
    $this->setVars();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordismetperpryaccmetFromRequest();

      $this->saveFordismetperpryaccmet($this->fordismetperpryaccmet);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('forsegpoa/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('forsegpoa/list');
      }
      else
      {
        return $this->redirect('forsegpoa/edit?id='.$this->fordismetperpryaccmet->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function saveFordismetperpryaccmet($fordismetperpryaccmet)
  {
  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    Formulacion::salvarFordismetperpryaccmet($fordismetperpryaccmet,$grid);
  }

  protected function updateFordismetperpryaccmetFromRequest()
  {
    $fordismetperpryaccmet = $this->getRequestParameter('fordismetperpryaccmet');
    $this->setVars();
    $this->configGrid();

    if (isset($fordismetperpryaccmet['codpro']))
    {
      $this->fordismetperpryaccmet->setCodpro($fordismetperpryaccmet['codpro']);
    }
    if (isset($fordismetperpryaccmet['nompro']))
    {
      $this->fordismetperpryaccmet->setNompro($fordismetperpryaccmet['nompro']);
    }
    if (isset($fordismetperpryaccmet['codaccesp']))
    {
      $this->fordismetperpryaccmet->setCodaccesp($fordismetperpryaccmet['codaccesp']);
    }
    if (isset($fordismetperpryaccmet['desaccesp']))
    {
      $this->fordismetperpryaccmet->setDesaccesp($fordismetperpryaccmet['desaccesp']);
    }
    if (isset($fordismetperpryaccmet['codmet']))
    {
      $this->fordismetperpryaccmet->setCodmet($fordismetperpryaccmet['codmet']);
    }
    if (isset($fordismetperpryaccmet['desmet']))
    {
      $this->fordismetperpryaccmet->setDesmet($fordismetperpryaccmet['desmet']);
    }
    if (isset($fordismetperpryaccmet['canmet2']))
    {
      $this->fordismetperpryaccmet->setCanmet2($fordismetperpryaccmet['canmet2']);
    }
    if (isset($fordismetperpryaccmet['cananual']))
    {
      $this->fordismetperpryaccmet->setCananual($fordismetperpryaccmet['cananual']);
    }
    if (isset($fordismetperpryaccmet['perpre']))
    {
      $this->fordismetperpryaccmet->setPerpre($fordismetperpryaccmet['perpre']);
    }
    if (isset($fordismetperpryaccmet['canmet']))
    {
      $this->fordismetperpryaccmet->setCanmet($fordismetperpryaccmet['canmet']);
    }
    if (isset($fordismetperpryaccmet['progacum']))
    {
      $this->fordismetperpryaccmet->setProgacum($fordismetperpryaccmet['progacum']);
    }
    if (isset($fordismetperpryaccmet['canmeteje']))
    {
      $this->fordismetperpryaccmet->setCanmeteje($fordismetperpryaccmet['canmeteje']);
    }
    if (isset($fordismetperpryaccmet['acum']))
    {
      $this->fordismetperpryaccmet->setAcum($fordismetperpryaccmet['acum']);
    }
  }

  public function configGrid()
  {
    $c = new Criteria();
    $c->add(FordismetperpryaccmetPeer::CODPRO,$this->fordismetperpryaccmet->getCodPro());
    $c->add(FordismetperpryaccmetPeer::CODACCESP,$this->fordismetperpryaccmet->getCodaccesp());
    $c->add(FordismetperpryaccmetPeer::CODMET,$this->fordismetperpryaccmet->getCodmet());
    $c->addAscendingOrderByColumn(FordismetperpryaccmetPeer::PERPRE);
    $per = FordismetperpryaccmetPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
    $opciones->setTabla('fordismetperpryaccmet');
    $opciones->setAncho(600);
    $opciones->setAnchoGrid(100);
    $opciones->setFilas(0);
    $opciones->setName('a');
    $opciones->setTitulo('Detalle Ejecución de Metas Físicas');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Mes');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('perpre');
    $col1->setHTML('type="text" size="3" readonly=true');

    $col2 = new Columna('Programado del Mes');
    $col2->setTipo(Columna::MONTO);
    $col2->setAlineacionContenido(Columna::DERECHA);
    $col2->setAlineacionObjeto(Columna::DERECHA);
    $col2->setNombreCampo('canmet');
    $col2->setEsNumerico(true);
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = new Columna('Programado Acumulado');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('progacum');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10" readonly=true');

    $col4 = new Columna('Ejecutado');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('canmeteje');
    $col4->setEsNumerico(true);
    $col4->setEsGrabable(true);
    $col4->setHTML('type="text" size="10"');
    $col4->setEsTotal(true,'fordismetperpryaccmet_cananual');
    $col4->setJScript('onKeypress="calculos(event,this.id)"');

    $col5 = new Columna('Variación');
    $col5->setTipo(Columna::MONTO);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('acum');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="10" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj = $opciones->getConfig($per);

  }

  public function setVars()
  {
    $this->mascaraproyecto = Herramientas::ObtenerFormato('Fordefegrgen','Forproacc');
    $this->longpry=strlen($this->mascaraproyecto);
	$this->mascaraaccion = Herramientas::ObtenerFormato('Fordefegrgen','Foraccesp');
	$this->longacc=strlen($this->mascaraaccion);
  }
}
