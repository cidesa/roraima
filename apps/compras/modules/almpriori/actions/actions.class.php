<?php

/**
 * almpriori actions.
 *
 * @package    Roraima
 * @subpackage almpriori
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almprioriActions extends autoalmprioriActions
{
  public  $error=-1;

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
  	$error=-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->casolart = $this->getCasolartOrCreate();

      $grids = Herramientas::CargarDatosGrid($this,$this->grid);
      if ($this->getRequestParameter('casolart[porcostart]')!='1' && $this->getRequestParameter('casolart[pormoncot]')!='1' && $this->getRequestParameter('casolart[portimeent]')!='1')
      {
      	if ($this->getRequestParameter('casolart[porprovee]')=='1')
      	{
      		$grid = Herramientas::CargarDatosGrid($this,$this->grid2);
      		$error= Compras::validarAlmpriori2($grid);
      	}else {
      	   $error= Compras::validarAlmpriori($grids);
      	}
      }
      if ($error<>-1)
      {
        $this->error=$error;
        return false;
      }

      return true;
   }
    else return true;
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->casolart = $this->getCasolartOrCreate();
    $this->articulos=$this->CargarArticulos($this->casolart->getReqart());
    $c= new Criteria();
    $c->addJoin(CacotizaPeer::REFCOT,CadetcotPeer::REFCOT);
    $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
    $c->add(CadetcotPeer::PRIORI,'1');
    $resul= CadetcotPeer::doSelect($c);
    if ($resul)
    {
    	$this->elimina='S';
    }else $this->elimina='N';


    $sql="select codart as codart from caartsol where reqart='".$this->casolart->getReqart()."' group by codart";
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
      $c->add(CadetcotPeer::PRIORI,'',Criteria::NOT_EQUAL);
      $resul= CadetcotPeer::doSelectOne($c);
      if ($resul)
      {
      	$contador= $contador + 1;
      }
      $i++;
     }

     if ((count($result)==$contador))
     {
     	$this->actualiza='S';
     }
     else
     {
     	$this->actualiza='N';
     }
    }
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

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCasolartFromRequest()
  {
    $casolart = $this->getRequestParameter('casolart');
    $this->articulos=$this->CargarArticulos($this->casolart->getReqart());
    $c= new Criteria();
    $c->addJoin(CacotizaPeer::REFCOT,CadetcotPeer::REFCOT);
    $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
    $c->add(CadetcotPeer::PRIORI,'1');
    $resul= CadetcotPeer::doSelect($c);
    if ($resul)
    {
    	$this->elimina='S';
    }else $this->elimina='N';
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
    if (isset($casolart['porcostart']))
    {
      $this->casolart->setPorcostart($casolart['porcostart']);
    }
    if (isset($casolart['pormoncot']))
    {
      $this->casolart->setPormoncot($casolart['pormoncot']);
    }
    if (isset($casolart['portimeent']))
    {
      $this->casolart->setPortimeent($casolart['portimeent']);
    }
    if (isset($casolart['porprovee']))
    {
      $this->casolart->setPorprovee($casolart['porprovee']);
    }
    if (isset($casolart['observaciones']))
    {
      $this->casolart->setObservaciones($casolart['observaciones']);
    }
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
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
      $this->configGrid2($this->getRequestParameter('casolart[reqart]'));
    }
    else
    {
      $casolart = CasolartPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($casolart->getReqart(),$this->getRequestParameter('casolart[articulo]'));
      $this->configGrid2($casolart->getReqart());
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

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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

    /*$col4 = clone $col1;
    $col4->setEsGrabable(true);
    $col4->setTitulo('Justificación');
    $col4->setNombreCampo('justifica');
    $col4->setHTML('type="text" size="40"');*/

    $col4 = new Columna('Razón de Compra');
    $col4->setTipo(Columna::COMBO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('justifica');
    $col4->setCombo(self::CargarRazon());
    $col4->setHTML(' ');

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

    $col7 = new Columna('Observaciones');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('observaciones');
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setHTML('type="text" size="60"');

	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);
        $opciones->addColumna($col7);

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

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveCasolart($casolart)
  {
    $grid2=Herramientas::CargarDatosGrid($this,$this->grid);
    $grid1=Herramientas::CargarDatosGrid($this,$this->grid2);
	if (Compras::salvarPrioridadCotizaciones($grid2,$casolart->getReqart(), $casolart->getActsolegr(),$casolart,&$error,$grid1))
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

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
         $reqart=$this->getRequestParameter('reqart');
        Compras::actualizacionSolicitudEgresos($reqart, $codigo, & $error);
        if ($error==133)
        {
          $javascript="alert_('La Asignación a Prioridad no Fue Grabada ya que el costo es un Dato Inválido.');";
        }else if ($error==134)
        {
          $javascript="alert_('La Asignación a Prioridad no Fue Grabada ya que el Costo del Articulo debe ser mayor a cero.');";
        }else if ($error==135)
        {
          $javascript="alert('La Asignación a Prioridad no Fue Grabada ya que no existe Disponibilidad Presupuestaria.');";
        }else
        {
        	$javascript="alert('La Solicitud ha sido actualizada exitosamente.');";
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
         $this->ajax="as";
         $reqart=$this->getRequestParameter('reqart');
         $this->configGrid2($reqart);
       break;
      default:
         $this->ajax="";
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
        break;
    }
  }

	  protected function deleteCasolart($casolart)
	  {
         $c = new Criteria();
	     $c->add(CacotizaPeer :: REFSOL, $casolart->getReqart());
	     $dato= CacotizaPeer::doSelect($c);
	     if ($dato)
	     {
	     	foreach ($dato as $obj0)
	     	{
		     	$t= new Criteria();
		     	$t->add(CadetcotPeer::REFCOT,$obj0->getRefcot());
		     	$resul=  CadetcotPeer::doSelect($t);
		     	if ($resul)
		     	{
		     		foreach ($resul as $obj)
		     		{
		     			$obj->setPriori(0);
		     			$obj->setJustifica(null);
		     			$obj->save();
		     		}
		     	}
	     	}
	     }
	  }

  public function CargarRazon()
  {
    $c = new Criteria();
    $lista_raz = CarazcomPeer::doSelect($c);

    $razones = array();

    foreach($lista_raz as $obj_raz)
    {
      $razones += array($obj_raz->getCodrazcom() => $obj_raz->getDesrazcom());
    }
    return $razones;
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($refsol=' ')
   {
	$c = new Criteria();
	$c->add(CacotizaPeer::REFSOL,$refsol);
	$per = CacotizaPeer::doSelect($c);

	$this->fila=count($per);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
	$opciones->setTabla('Cacotiza');
	$opciones->setAncho(600);
	$opciones->setAnchoGrid(600);
	$opciones->setTitulo('Cotizaciones');
	$opciones->setName('b');
	$opciones->setFilas(0);
	$opciones->setHTMLTotalFilas(' ');

	$col1 = new Columna('Contratistas de Bienes o Servicio y Cooperativas');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('nompro');
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);
	$col1->setHTML('type="text" size="60" readonly=true');

	$col2 = new Columna('Costo');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('moncot');
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setEsNumerico(true);
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = clone $col1;
    $col3->setEsGrabable(true);
    $col3->setTitulo('Prioridad');
    $col3->setNombreCampo('priori2');
    $col3->setHTML('type="text" size="5" maxlength="3"');
    $col3->setJScript('onBlur="javascript:event.keyCode=13;verificar_prioridad();"');

    $col4 = new Columna('Razón de Compra');
    $col4->setTipo(Columna::COMBO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('justifica');
    $col4->setCombo(self::CargarRazon());
    $col4->setHTML(' ');

    $col5 = new Columna('refcot');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(false);
    $col5->setNombreCampo('refcot');
    $col5->setOculta(true);

    $col6 = new Columna('Observaciones');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('observaciones');
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setHTML('type="text" size="60"');

        $opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
        $opciones->addColumna($col6);

	$this->grid2 = $opciones->getConfig($per);
	}

}
