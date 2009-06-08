<?php

/**
 * almregart actions.
 *
 * @package    siga
 * @subpackage almregart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almregartActions extends autoalmregartActions
{
    private static $coderror=-1;

    public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->caregart = $this->getCaregartOrCreate();
        $this->updateCaregartFromRequest();

        $grid=Herramientas::CargarDatosGrid($this,$this->obj);

        self::$coderror=Articulos::validarAlmregart($this->caregart,$grid);
        if (self::$coderror<>-1){
          return false;
        }else return true;

      }else return true;
    }

  public function executeList()
    {
      $this->processSort();
      $this->processFilters();
      $this->setVars();
      $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caregart/filters');

      // pager
      $this->pager = new sfPropelPager('Caregart',15);
      $c = new Criteria();
      $this->addSortCriteria($c);
      $this->addFiltersCriteria($c);
      $this->pager->setCriteria($c);
      $this->pager->setPage($this->getRequestParameter('page', 1));
      $this->pager->init();
    }

  public function executeEdit()
    {
      $this->caregart = $this->getCaregartOrCreate();
      $this->setVars();
      $this->configGrid();


      if ($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->updateCaregartFromRequest();

        $this->saveCaregart($this->caregart);

        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('almregart/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('almregart/list');
        }
        else
        {
          return $this->redirect('almregart/edit?id='.$this->caregart->getId());
        }
      }
      else
      {
        $this->labels = $this->getLabels();
      }
    }

  public function handleErrorEdit()
    {
      $this->preExecute();
      $this->caregart = $this->getCaregartOrCreate();

      try{
      $this->updateCaregartFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
          $err = Herramientas::obtenerMensajeError(self::$coderror);
          $this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }

  protected function updateCaregartFromRequest()
  {
    $caregart = $this->getRequestParameter('caregart');
    $this->setVars();
    $this->configGrid();

    if (isset($caregart['codart']))
    {
      $this->caregart->setCodart($caregart['codart']);
    }
    if (isset($caregart['tipo']))
    {
      $this->caregart->setTipo($caregart['tipo']);
    }
    if (isset($caregart['codcta']))
    {
      $this->caregart->setCodcta($caregart['codcta']);
    }
    if (isset($caregart['desart']))
    {
      $this->caregart->setDesart($caregart['desart']);
    }
    if (isset($caregart['ramart']))
    {
      $this->caregart->setRamart($caregart['ramart']);
    }
    if (isset($caregart['codpar']))
    {
      $this->caregart->setCodpar($caregart['codpar']);
    }
    if (isset($caregart['unimed']))
    {
      $this->caregart->setUnimed($caregart['unimed']);
    }
    if (isset($caregart['unialt']))
    {
      $this->caregart->setUnialt($caregart['unialt']);
    }
    if (isset($caregart['relart']))
    {
      $this->caregart->setRelart($caregart['relart']);
    }
    if (isset($caregart['exitot']))
    {
      $this->caregart->setExitot($caregart['exitot']);
    }
    if (isset($caregart['fecult']))
    {
      if ($caregart['fecult'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($caregart['fecult']))
          {
            $value = $dateFormat->format($caregart['fecult'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $caregart['fecult'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->caregart->setFecult($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->caregart->setFecult(null);
      }
    }
    if (isset($caregart['cosult']))
    {
      $this->caregart->setCosult($caregart['cosult']);
    }
    if (isset($caregart['cospro']))
    {
      $this->caregart->setCospro($caregart['cospro']);
    }
    if (isset($caregart['invini']))
    {
      $this->caregart->setInvini($caregart['invini']);
    }
    if (isset($caregart['codartsnc']))
    {
      $this->caregart->setCodartsnc($caregart['codartsnc']);
    }
    if (isset($caregart['ctavta']))
    {
      $this->caregart->setCtavta($caregart['ctavta']);
    }
    if (isset($caregart['ctacos']))
    {
      $this->caregart->setCtacos($caregart['ctacos']);
    }
    if (isset($caregart['ctapro']))
    {
      $this->caregart->setCtapro($caregart['ctapro']);
    }
  }

    public function configGrid()
    {
      $this->mensaler="";
      $c = new Criteria();
      $c->add(CaartalmPeer::CODART,$this->caregart->getCodart());
      $c->addAscendingOrderByColumn(CaartalmPeer::CODALM);
      $per = CaartalmPeer::doSelect($c);
      //Verificar si por almacen el articulo se encuentra en su punto de reorden
      if ($per)
      {
        foreach ($per as $datalm)
        {
           if ($datalm->getExiact() <= $datalm->getPtoreo())
           {
             $this->mensaler="La Existencia Actual del Artículo es menor o igual al Punto de Reorden para el Almacén  ".$datalm->getCodalm();
             break;
           }
        }
      }


      $mascaraubicacion=$this->mascaraubicacion;
      $longmas=strlen($this->mascaraubicacion);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(true);
      $opciones->setTabla('Caartalm');
      $opciones->setAnchoGrid(900);
      $opciones->setAncho(900);
      $opciones->setName('a');
      $opciones->setTitulo('Existencia por Almacenes');
      $opciones->setHTMLTotalFilas(' ');

      $col1 = new Columna('Cod. Almacen');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codalm');
      $col1->setCatalogo('cadefalm','sf_admin_edit_form', array('codalm'=> 1, 'nomalm'=> 2));
      $col1->setAjax('almregart',2,2);
    $col1->setHTML('type="text" size="8"');

      $col2 = new Columna('Descripción');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomalm');
      $col2->setHTML('type="text" size="25" readonly=true');

     /* $col3 = clone $col1;
      $col3->setTitulo('Cod. Ubicacion');
      $col3->setNombreCampo('codubi');
      $col3->setHTML('type="text" size="25" maxlength='.chr(39).$longmas.chr(39).'');
      $col3->setCatalogo('cadefubi','sf_admin_edit_form', array('codubi'=> 3, 'nomubi'=> 4));
      $col3->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
      $col3->setAjax('almregart',3,4);

      $col4 = clone $col2;
      $col4->setTitulo('Ubicación');
      $col4->setNombreCampo('nomubi');*/

      $col3 = new Columna('Exi. Mínima');
      $col3->setTipo(Columna::MONTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionContenido(Columna::IZQUIERDA);
      $col3->setAlineacionObjeto(Columna::IZQUIERDA);
      $col3->setNombreCampo('Eximin');
      $col3->setEsNumerico(true);
      $col3->setHTML('type="text" size="10"');
      $col3->setJScript('onKeypress="entermonto(event,this.id)"');

      $col4 = clone $col3;
      $col4->setTitulo('Exi. Máxima');
      $col4->setNombreCampo('Eximax');

      /*$col7 = clone $col5;
      $col7->setTitulo('Exi. Actual');
      $col7->setNombreCampo('Exiact');
      $col7->setEsTotal(true,'caregart_exitot');
*/
      $col5 = clone $col3;
      $col5->setTitulo('Reorden');
      $col5->setNombreCampo('Ptoreo');

    $col6 = clone $col3;
      $col6->setTitulo('Exi. Actual');
      $col6->setNombreCampo('Exiact');
      $col6->setHTML('type="text" size="10" readonly=true');
      $col6->setEsTotal(true,'caregart_exitot');

      $col7 = new Columna('Ubicación');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(false);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('anadir');
    $col7->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"');
    $col7->setJScript('onClick="mostrar(this.id)"');

      $col8 = new Columna('cadena_datos_ubicacion');
      $col8->setTipo(Columna::TEXTO);
      $col8->setEsGrabable(true);
      $col8->setAlineacionObjeto(Columna::IZQUIERDA);
      $col8->setAlineacionContenido(Columna::IZQUIERDA);
      $col8->setNombreCampo('ubicacion');
      $col8->setOculta(true);

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);
      $opciones->addColumna($col6);
      $opciones->addColumna($col7);
      $opciones->addColumna($col8);

      $this->obj = $opciones->getConfig($per);
  }

   public function configGridAlmUbi($codart='',$codalm='',&$filas)
   {
      $c = new Criteria();

      $sql="select a.codalm, b.nomubi,coalesce((select c.exiact from caartalmubi c where c.codart='".$codart."' and c.codalm='".$codalm."' and c.codubi=a.codubi),0) as exiact, a.codubi,a.id
      FROM  caalmubi a,cadefubi b
      where a.codubi=b.codubi
      AND a.Codalm='".$codalm."' order by a.codubi";
    $resp = Herramientas::BuscarDatos($sql,&$per);
    $filas=count($per);
  /*  $this->setVars();

      $mascaraubicacion=$this->mascaraubicacion;
      $longmas=strlen($this->mascaraubicacion);*/

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(false);
      $opciones->setTabla('Caartalmubi');
      $opciones->setAnchoGrid(600);
    $opciones->setAncho(600);
      $opciones->setTitulo('Existencia por Almacen y Ubicación');
      $opciones->setName('c');
      $opciones->setFilas(0);
      $opciones->setHTMLTotalFilas(' ');

      $col1 = new Columna('Cod. Ubicacion');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codubi');
      //$col1->setCatalogo('cadefubi','sf_admin_edit_form', array('codubi'=> 1, 'nomubi'=> 2));
      //$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
      //$col1->setAjax('almregart',3,2);
      //$col1->setHTML('type="text" size="25" maxlength='.chr(39).$longmas.chr(39).'');
      $col1->setHTML('type="text" size="20" readonly=true');

      $col2 = new Columna('Ubicación');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomubi');
      $col2->setHTML('type="text" size="50" readonly=true');

      $col3 = new Columna('Exi. Actual');
      $col3->setTipo(Columna::MONTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionContenido(Columna::IZQUIERDA);
      $col3->setAlineacionObjeto(Columna::IZQUIERDA);
      $col3->setNombreCampo('Exiact');
      $col3->setEsNumerico(true);
      $col3->setHTML('type="text" size="10"');
      $col3->setJScript('onKeypress="entermonto_c(event,this.id)"');
      $col3->setEsTotal(true,'totalubi');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);

      $this->objAlmUbi = $opciones->getConfig($per);
  }


  protected function processFilters()
    {
      if ($this->getRequest()->hasParameter('filter'))
      {
        $filters = $this->getRequestParameter('filters');

        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/caregart/filters');
        $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/caregart/filters');
      }
    }


  protected function saveCaregart($caregart)
  {
  /*  if ($caregart->getId())
    {
    try
      { $caregart->save();}
      catch (Exception $ex)
      {
        $coderr = 0;
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;
      }
    }
    else
    {*/
     $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      /*try
      {*/
       Articulos::salvarAlmregart($caregart,$grid);
     /* }
       catch (Exception $ex)
      {*/
        $coderr = 0;
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;
     // }
   //}
  }

  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=CaramartPeer::getDesramo($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=CadefalmPeer::getDesalmacen($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
     else  if ($this->getRequestParameter('ajax')=='3')
      {
          $dato=CadefubiPeer::getDesubicacion($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='4')
      {
        $tipo="";
        $deshabilitar="";
        if ($this->getRequestParameter('tipart')=='true')
          $tipo="A";
         else if ($this->getRequestParameter('tipser')=='true')
             $tipo="S";

        $longmas=strlen($this->mascaraarticulo = Herramientas::ObtenerFormato('Cadefart','Forart'));
        $lonart=strlen($this->getRequestParameter('codigo'));

        $a= new Criteria();
        $result= CadefartPeer::doSelectOne($a);
        if ($result)
        {
          $genera=$result->getGencorart();
        }else $genera="";


	        $articulo= New Caregart();
	        $articulo->setCodart($this->getRequestParameter('codigo'));
	        $articulo->setTipo($tipo);
	        $hayerr=Articulos::validarCodart($articulo,"N");
	        if ($hayerr!=-1)
	        {
	          $menserr = Herramientas::obtenerMensajeError($hayerr);
	          $menserr=H::cambiarAcentosaHtml($menserr);
	          $javascript="alert('".$menserr."');$('caregart_codart').value='';habilitartodo();$('caregart_codart').focus()";
	        }
	        else
	        {
	          $javascript="";
	          if ($genera!="S")
              {
		          if ($lonart<$longmas)
		          {
		            $javascript="deshabil();";
		            $deshabilitar='S';
		          }
		          else
		          {
		            $javascript="habilitartodo();";
		            $deshabilitar='N';
		          }
	         }
		     else
		     {
		     	Herramientas::formarCodigoPadre($this->getRequestParameter('codigo'),&$nivelcodigo,&$ultimo,$this->mascaraarticulo);
		     	  if ($ultimo=="")
		          {
		            $javascript="deshabil();";
		            $deshabilitar='S';
		          }
		          else
		          {
		            $javascript="habilitartodo();";
		            $deshabilitar='N';
		          }
		     }
	        }

          $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$deshabilitar.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }//else  if ($this->getRequestParameter('ajax')=='4')
      else  if ($this->getRequestParameter('ajax')=='5')
      {
            $dato=NppartidasPeer::getNompar($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
            $dato=CacatsncPeer::getDessnc($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
  else  if ($this->getRequestParameter('ajax')=='7')
    {
      $articulo=$this->getRequestParameter('articulo');
      $almacen=$this->getRequestParameter('almacen');
          $fila=$this->getRequestParameter('fil');
         $totalfilas=0;
      $this->configGridAlmUbi($articulo,$almacen,$totalfilas);

      $output = '[["fila","'.$fila.'",""],["totalfilas","'.$totalfilas.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      //si total filas es igual a cero quiere decir que el almacen no tiene ubicaciones asociadas
      if ($totalfilas==0) return sfView::HEADER_ONLY;
    }
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('RAMART','Caramart','Ramart',$this->getRequestParameter('caregart[ramart]'));
      }
  }

  public function setVars()
  {
    $this->mascaraarticulo =Herramientas::ObtenerFormato('Cadefart','Forart');
    $this->longart=strlen($this->mascaraarticulo);
    $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->longcont=strlen($this->mascaracontabilidad);
    $this->mascarapartida = Herramientas::getMascaraPartida();
    $this->longpar=strlen($this->mascarapartida);
    $this->mascaraubicacion = Herramientas::ObtenerFormato('Cadefart','Forubi');
    $this->longubi=strlen($this->mascaraubicacion);
    $this->mascaracatsnc =Herramientas::ObtenerFormato('Cadefart','Forsnc');
    $this->longcatsnc=strlen($this->mascaracatsnc);
  }


  public function executeDelete()
  {
    $this->caregart = CaregartPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->caregart);
    $id=$this->getRequestParameter('id');

   //verificar si no es un padre
    if (Articulos::Buscar_CodigoHijo($this->caregart->getCodart())) //no se puede eliminar, tiene hijos
     {
      $menerr = "El Artículo ". $this->caregart->getCodart() .", no puede ser eliminado ya que es un código padre";
      $this->getRequest()->setError('delete', $menerr);
      return $this->forward('almregart', 'list');
      // return $this->redirect('almregart/edit?id='.$id);
     }
   else
   {
    if (Articulos::Hay_movimientos($this->caregart->getCodart())) //no se puede eliminar,
     {
      $menerr = "El Artículo ". $this->caregart->getCodart() .", no puede ser eliminado ya posee movimientos asociados";
      $this->getRequest()->setError('delete', $menerr);
      return $this->forward('almregart', 'list');
        //return $this->redirect('almregart/edit?id='.$id);
     }
     else
     {
      try
      {
        Herramientas::EliminarRegistro('Caartalmubi','Codart',$this->caregart->getCodart());
          Herramientas::EliminarRegistro('Caartalm','Codart',$this->caregart->getCodart());
        $this->deleteCaregart($this->caregart);
        $this->Bitacora('Elimino');
      }
      catch (PropelException $e)
      {
        $this->getRequest()->setError('delete', 'Could not delete the selected Caregart. Make sure it does not have any associated items.');
        return $this->forward('almregart', 'list');
      }

        return $this->redirect('almregart/list');
     }//else if (Articulos::Hay_movimientos
   }//else if (Articulos::Buscar_CodigoHijo($this->caregart-getCodart()))
  }

  public function configGrid2()
  {
      $c = new Criteria();
      $c->add(CaartparPeer::CODART,$this->caregart->getCodart());
      $per = CaartparPeer::doSelect($c);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(true);
      $opciones->setTabla('Caartpar');
      $opciones->setAnchoGrid(800);
      $opciones->setAncho(800);
      $opciones->setName('b');
      $opciones->setTitulo('Partidas por Articulo');
      $opciones->setHTMLTotalFilas(' ');

      $obj= array('codpar' => 1, 'nompar' => 2);
      $params= array();

      $col1 = new Columna('Codigo Partida');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codpar');
      $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascarapartida.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} "');
      $col1->setCatalogo('Nppartidas','sf_admin_edit_form',$obj, 'Nppartidas_Almregart',$params);
      $col1->setAjax('almregart',5,2);
      $col1->setHTML('type="text" size="15" maxlength="'.chr(39).$this->longpar.chr(39).'"');

    $col2 = new Columna('Descripción');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nompar');
      $col2->setHTML('type="text" size="70" readonly=true');

      $col3 = new Columna('Porcentaje');
      $col3->setTipo(Columna::MONTO);
      $col3->setAlineacionObjeto(Columna::IZQUIERDA);
      $col3->setAlineacionContenido(Columna::IZQUIERDA);
      $col3->setEsGrabable(true);
      $col3->setNombreCampo('porpar');
      $col3->setHTML('type="text" size="5" ');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $this->obj2 = $opciones->getConfig($per);
  }

}

