<?php

/**
 * almpriori actions.
 *
 * @package    siga
 * @subpackage almpriori
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almprioriActions extends autoalmprioriActions
{
  public  $error=-1;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->casolart = $this->getCasolartOrCreate();

      $grids = Herramientas::CargarDatosGrid($this,$this->grid);
      $error= Compras::validarAlmpriori($grids);
      if ($error<>-1)
      {
        $this->error=$error;
        return false;
      }

      return true;
   }
    else return true;
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->casolart = $this->getCasolartOrCreate();
    $this->updateCasolartFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->error!=-1){
        $err1 = Herramientas::obtenerMensajeError($this->error);
        $this->getRequest()->setError('',$err1);
      }
    }

    return sfView::SUCCESS;
  }

 public function executeEdit()
  {
    $this->casolart = $this->getCasolartOrCreate();
    $this->articulos=$this->CargarArticulos($this->casolart->getReqart());
    /*$sql="select codart as codart from caartsol where reqart='".$this->casolart->getReqart()."' group by codart";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
     $contador=0;
     $i=0;
     while ($i<count($result))
     {
      $c= new Criteria();
      $c->addJoin(CacotizaPeer::REFCOT,CadetcotPeer::REFCOT);
      $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
      $c->add(CadetcotPeer::CODART,$result[$i]["codart"]);
      $c->add(CadetcotPeer::PRIORI,'1');
      $resul= CadetcotPeer::doSelect($c);
      if ($resul)
      {
      	$contador= $contador + 1;
      }
      $i++;
     }

     if ((count($result)-$contador)==1)
     {
     	$this->actualiza=true;
     }
     else
     {
     	$this->actualiza=false;
     }
    }*/
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCasolartFromRequest();

      if ($this->saveCasolart($this->casolart)==-1)
      {

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almpriori/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almpriori/list');
      }
      else
      {
        return $this->redirect('almpriori/edit?id='.$this->casolart->getId());
      }
      }
       else
       {

          $this->labels = $this->getLabels();
          $err = Herramientas::obtenerMensajeError($this->coderror);
       	  $this->getRequest()->setError('edit',$err);
       	  return $this->forward('almpriori', 'list');

       }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateCasolartFromRequest()
  {
    $casolart = $this->getRequestParameter('casolart');
    $this->articulos=$this->CargarArticulos($this->casolart->getReqart());
    /*$sql="select codart as codart from caartsol where reqart='".$this->casolart->getReqart()."' group by codart";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
     $contador=0;
     $i=0;
     while ($i<count($result))
     {
      $c= new Criteria();
      $c->addJoin(CacotizaPeer::REFCOT,CadetcotPeer::REFCOT);
      $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
      $c->add(CadetcotPeer::CODART,$result[$i]["codart"]);
      $c->add(CadetcotPeer::PRIORI,'1');
      $resul= CadetcotPeer::doSelect($c);
      if ($resul)
      {
      	$contador= $contador + 1;
      }
      $i++;
     }

     if ((count($result)-$contador)==1)
     {
     	$this->actualiza=true;
     }
     else
     {
     	$this->actualiza=false;
     }
    }*/
    if (isset($casolart['reqart']))
    {
      $this->casolart->setReqart($casolart['reqart']);
    }
    if (isset($casolart['fecreq']))
    {
      if ($casolart['fecreq'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($casolart['fecreq']))
          {
            $value = $dateFormat->format($casolart['fecreq'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $casolart['fecreq'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->casolart->setFecreq($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->casolart->setFecreq(null);
      }
    }
    if (isset($casolart['desreq']))
    {
      $this->casolart->setDesreq($casolart['desreq']);
    }
    if (isset($casolart['articulo']))
    {
      $this->casolart->setArticulo($casolart['articulo']);
    }
    if (isset($casolart['actsolegr']))
    {
      $this->casolart->setActsolegr($casolart['actsolegr']);
    }
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/casolart/filters');

    // pager
    $this->pager = new sfPropelPager('Casolart', 8);
    $c = new Criteria();

    $c->addJoin(CasolartPeer::REQART, CacotizaPeer::REFSOL);
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getCasolartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $casolart = new Casolart();
      $this->configGrid($this->getRequestParameter('casolart[reqart]'),$this->getRequestParameter('casolart[articulo]'));
    }
    else
    {
      $casolart = CasolartPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($casolart->getReqart(),$this->getRequestParameter('casolart[articulo]'));
      $this->forward404Unless($casolart);

    }

    return $casolart;
  }

  public function CargarArticulos($reqart)
	{
	$c = new Criteria();
	$c->add(CaartsolPeer::REQART,$reqart);
	$c->addAscendingOrderByColumn(CaartsolPeer::CODART);
	$articulos = CaartsolPeer::doSelect($c);


/*
 	$c->add(CaartsolPeer::REQART,$reqart);
	$c->addJoin(CacotizaPeer::REFSOL,CaartsolPeer::REQART);
	$c->addJoin(CadetcotPeer::REFCOT,CacotizaPeer::REFCOT);
	$sql = "(cadetcot.priori='0' or cadetcot.priori isnull)";
    $c->add(CadetcotPeer::PRIORI, $sql, Criteria :: CUSTOM);
 */


	$tipos = array();
	$result= array();

	foreach($articulos as $art)
	{
	 $sql="select a.* from cadetcot a, cacotiza b where a.refcot=b.refcot  and b.refsol= '".$reqart."' and a.codart='".$art->getCodart()."' and ( not(a.priori) isnull and a.priori<>0)";
	 if (!Herramientas::BuscarDatos($sql,&$result))
     {
	  $tipos += array($art->getCodart() => $art->getCodart()." - ".$art->getDesartsol());
     }
	}
	return $tipos;
    }

   public function configGrid($refsol=' ', $codart=' ')
   {
	$c = new Criteria();
	$c->add(CadetcotPeer::CODART,$codart);
	$c->add(CacotizaPeer::REFSOL,$refsol);
	$c->addJoin(CadetcotPeer::REFCOT,CacotizaPeer::REFCOT);
	$c->addAscendingOrderByColumn(CadetcotPeer::COSTO);
	$per = CadetcotPeer::doSelect($c);

	$this->fila=count($per);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
	$opciones->setTabla('Cadetcot');
	$opciones->setAncho(600);
	$opciones->setAnchoGrid(600);
	$opciones->setTitulo('Cotizaciones');
	$opciones->setName('a');
	$opciones->setFilas(0);
	$opciones->setHTMLTotalFilas(' ');

	$col1 = new Columna('Contratistas de Bienes o Servicio y Cooperativas');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('provee');
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);
	$col1->setHTML('type="text" size="60" readonly=true');

	$col2 = new Columna('Costo');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('costo');
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setEsNumerico(true);
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = clone $col1;
    $col3->setEsGrabable(true);
    $col3->setTitulo('Prioridad');
    $col3->setNombreCampo('priori');
    $col3->setHTML('type="text" size="5" maxlength="3"');
    $col3->setJScript('onBlur="javascript:event.keyCode=13;verificar_prioridad();"');

    $col4 = clone $col1;
    $col4->setEsGrabable(true);
    $col4->setTitulo('Justificación');
    $col4->setNombreCampo('justifica');
    $col4->setHTML('type="text" size="40"');

    $col5 = new Columna('refcot');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(false);
    $col5->setNombreCampo('refcot');
    $col5->setOculta(true);

    $col6 = new Columna('codart');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(false);
    $col6->setNombreCampo('codart');
    $col6->setOculta(true);

	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);

	$this->grid = $opciones->getConfig($per);
	}

	public function executeGrid()
	{
	  $this->ajax="";
	  if ($this->getRequestParameter('ajax')=='1')
	  { $this->ajax="1";
        $this->configGrid($this->getRequestParameter('reqart'),$this->getRequestParameter('codart'));
	  }
	}

  protected function saveCasolart($casolart)
  {
    $grid2=Herramientas::CargarDatosGrid($this,$this->grid);
	if (Compras::salvarPrioridadCotizaciones($grid2,$casolart->getReqart(), $casolart->getActsolegr(),&$error))
	{
	  $this->coderror=$error;
      return $this->coderror;
	}
	else
	{
      $this->coderror=$error;
      return $this->coderror;
	}
  }

    public function executeAjax()
	{
	 $reqart=$this->getRequestParameter('reqart');
	 $c = new Criteria();
	 $c->add(CaartsolPeer::REQART,$reqart);
	 $c->addAscendingOrderByColumn(CaartsolPeer::CODART);
	 $articulos = CaartsolPeer::doSelect($c);

	 $tipos = array();


	 foreach($articulos as $art)
	 {
	   $tipos += array($art->getCodart() => $art->getCodart()." - ".$art->getDesartsol());
	 }
	 $this->articulos= $tipos;

	}
}
