<?php

/**
 * almregart actions.
 *
 * @package    Roraima
 * @subpackage almregart
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almregartActions extends autoalmregartActions
{
    // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

    
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->caregart = $this->getCaregartOrCreate();
        $this->updateCaregartFromRequest();

        $grid=Herramientas::CargarDatosGrid($this,$this->obj);
        $gridunid=Herramientas::CargarDatosGridv2($this,$this->obj2);

        self::$coderror=Articulos::validarAlmregart($this->caregart,$grid);
        if (self::$coderror<>-1){
          return false;
        }else return true;

      }else return true;
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
      $this->setVars();
      $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caregart/filters');

      // pager
      $this->pager = new sfPropelPager('Caregart',15);
      $c = new Criteria();
      $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
      $mostodart=H::getConfAppGen('mostodart');
      if ($modulo=='facturacion' && $mostodart!='S')
         $c->add(CaregartPeer::TIPREG,'F');
      $this->addSortCriteria($c);
      $this->addFiltersCriteria($c);
      $this->pager->setCriteria($c);
      $this->pager->setPage($this->getRequestParameter('page', 1));
      $this->pager->init();
    }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
    {
      $this->caregart = $this->getCaregartOrCreate();
      $this->setVars();
      $this->configGrid();
      $this->configGridUnidades();


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

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCaregartFromRequest()
  {
    $caregart = $this->getRequestParameter('caregart');
    $this->setVars();
    $this->configGrid();
    $this->configGridUnidades();

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

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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
      $col4->setJScript('onKeypress="if (event.keyCode==13 || event.keyCode==9) verificamontos(event, this.id)"');

      /*$col7 = clone $col5;
      $col7->setTitulo('Exi. Actual');
      $col7->setNombreCampo('Exiact');
      $col7->setEsTotal(true,'caregart_exitot');
*/
      $col5 = clone $col4;
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
    $col7->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" readonly=true');
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

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridAlmUbi($codart='',$codalm='',&$filas)
   {
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      $c = new Criteria();
      if ($manartlot=='S')
      {
          $sql="select a.codubi, b.nomubi, a.exiact, a.numlot, a.fecela, a.fecven, a.codalm, a.id
            FROM  caartalmubi a, cadefubi b
              where a.codubi=b.codubi
            and a.codalm='".$codalm."'and a.codart='".$codart."'
            order by a.codubi";
      }else {
      $sql="select a.codubi, b.nomubi, a.exiact, a.codalm, a.id
            FROM  caartalmubi a, cadefubi b
      where a.codubi=b.codubi
            and a.codalm='".$codalm."'and a.codart='".$codart."'
            order by a.codubi";
      }
    $resp = Herramientas::BuscarDatos($sql,&$per);
    $filas=count($per);
      $this->setVars();

      $mascaraubicacion=$this->mascaraubicacion;
      $longmas=strlen($this->mascaraubicacion);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(false);
      $opciones->setTabla('Caartalmubi');
      $opciones->setAnchoGrid(650);
      $opciones->setAncho(650);
      $opciones->setTitulo('Existencia por Almacen y Ubicación');
      $opciones->setName('c');
      $opciones->setFilas(10);
      $opciones->setHTMLTotalFilas(' ');

      $params = array($codalm,'val2');
      $col1 = new Columna('Cod. Ubicacion');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codubi');
      $col1->setCatalogo('cadefubi','sf_admin_edit_form', array('codubi'=> 1, 'nomubi'=> 2),'Cadefubi_Almdes',$params);
      $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"  onBlur="javascript:event.keyCode=13; ajax(event,this.id);"');
      //$col1->setAjax('almregart',3,2);
      $col1->setHTML('type="text" size="20" maxlength='.chr(39).$longmas.chr(39).'');

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

      
      if ($manartlot=='S')
      {
          $col4 = new Columna('NÃºmero de Lote');
          $col4->setTipo(Columna::TEXTO);
          $col4->setEsGrabable(true);
          $col4->setAlineacionObjeto(Columna::CENTRO);
          $col4->setAlineacionContenido(Columna::CENTRO);
          $col4->setNombreCampo('numlot');
          $col4->setJScript('onBlur="javascript: Verifica_ubinumlote_repetido(this.id);"');
          $col4->setHTML('type="text" size="15" maxlength="100"');

	  $col5 = new Columna('Fecha de Elaboracion');
	  $col5->setTipo(Columna::FECHA);
	  $col5->setAlineacionObjeto(Columna::CENTRO);
	  $col5->setAlineacionContenido(Columna::CENTRO);
	  $col5->setEsGrabable(true);
          $col5->setHTML(' ');
	  $col5->setVacia(true);
	  $col5->setNombreCampo('fecela');

	  $col6 = clone $col5;
	  $col6->setTitulo('Fecha Vencimiento');
	  $col6->setNombreCampo('fecven');
      }

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      if ($manartlot=='S')
      {
         $opciones->addColumna($col4);
         $opciones->addColumna($col5);
         $opciones->addColumna($col6);
      }

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
     $gridunid=Herramientas::CargarDatosGridv2($this,$this->obj5);
      /*try
      {*/
       Articulos::salvarAlmregart($caregart,$grid,$gridunid);
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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $c=new Criteria();
        $c->add(CaramartPeer::RAMART,str_pad($this->getRequestParameter('codigo'), 6 , '0','STR_PAD_LEFT'));
        $datos=CaramartPeer::doSelectOne($c);
        if ($datos)
        {
           $nomram=$datos->getNomram();
           $output = '[["'.$cajtexmos.'","'.$nomram.'",""],["'.$cajtexcom.'","6","c"]]';
        }
        else
        {
         $javascript="alert('El Código del ramo no existe');$('caregart_ramart').value='';";
         $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","",""]]';
        }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $c=new Criteria();
        $c->add(CadefalmPeer::CODALM,str_pad($this->getRequestParameter('codigo'), 6 , '0','STR_PAD_LEFT'));
        $datos=CadefalmPeer::doSelectOne($c);
        if ($datos)
        {
           $nombre=$datos->getNomalm();
           $output = '[["'.$cajtexmos.'","'.$nombre.'",""],["'.$cajtexcom.'","6","c"]]';
        }
        else
        {
         $javascript="alert('El Código del Almacen no existe');";
         $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","",""],["'.$cajtexcom.'","",""]]';
        }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      }
     else  if ($this->getRequestParameter('ajax')=='3')
      {
         $javascript=""; $dato="";
         $c = new Criteria();
	 $c->addJoin(CadefubiPeer :: CODUBI, CaalmubiPeer :: CODUBI);
	 $c->add(CaalmubiPeer :: CODALM, $this->getRequestParameter('codalm'));
         $c->add(CadefubiPeer :: CODUBI, $this->getRequestParameter('codigo'));
         $result= CadefubiPeer ::doSelectOne($c);
         if ($result)
         {
            $dato=$result->getNomubi();
         }else $javascript="alert('La Ubicación no se encuentra asociada al almacen'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

         $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='4')
      {
        $deshabilitar='N';
        $javascript="";
        //primero verificamos que el articulo no exista en la BD antes de hacer el resto de las validaciones
        $c= new Criteria();
    	$c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
    	$exisart=CaregartPeer::doSelectOne($c);
        if ($exisart)
        {
			$javascript="alert('El Codigo del Articulo/Servicio ya existe. Por Favor, Cambielo por otro');$('caregart_codart').value='';$('caregart_codart').focus()";
			$output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$deshabilitar.'",""],["caregart_codcta","",""],["caregart_codpar","",""],["caregart_ramart","",""],["caregart_nompar","",""],["caregart_nomram","",""]]';
        }
        else
        {
		        $tipo="";
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
			        $arrdatos=array();
			        $hayerr=Articulos::validarCodart($articulo,"N",&$arrdatos);
			        if ($hayerr!=-1)
			        {
			          $menserr = Herramientas::obtenerMensajeError($hayerr);
			          $menserr=H::cambiarAcentosaHtml($menserr);
			          $javascript="alert('".$menserr."');$('caregart_codart').value='';$('caregart_codart').focus()";
			        }

		          //si el articulo a introducir no es un padre, o sea es un hijo, tiene q traer los valores de cta contable, cod. partida y ramo del padre
		          if (count($arrdatos)>0)
		          {
		            if ($arrdatos["ramart"]!="") $desram=CaramartPeer::getDesramo($arrdatos["ramart"]); else $desram="";
		            if ($arrdatos["codpar"]!="") $despar=NppartidasPeer::getNompar($arrdatos["codpar"]); else $despar="";
		            $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$deshabilitar.'",""],["caregart_codcta","'.$arrdatos["codcta"].'",""],["caregart_codpar","'.$arrdatos["codpar"].'",""],["caregart_ramart","'.$arrdatos["ramart"].'",""],["caregart_nompar","'.$despar.'",""],["caregart_nomram","'.$desram.'",""]]';
		          }
		          else
		          	$output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$deshabilitar.'",""],["caregart_codcta","",""],["caregart_codpar","",""],["caregart_ramart","",""],["caregart_nompar","",""],["caregart_nomram","",""]]';
		 }// else if ($exisart)

          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
      }//else  if ($this->getRequestParameter('ajax')=='4')
      else  if ($this->getRequestParameter('ajax')=='5')
      {
      	$c=new Criteria();
        $c->add(NppartidasPeer::CODPAR,$this->getRequestParameter('codigo'));
        $datos=NppartidasPeer::doSelectOne($c);
        if ($datos)
        {
           $nombre=$datos->getNompar();
           $output = '[["'.$cajtexmos.'","'.$nombre.'",""]]';
        }
        else
        {
         $javascript="alert('La partida no existe');$('caregart_codpar').value='';";
         $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","",""]]';
        }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
      	$c=new Criteria();
        $c->add(CacatsncPeer::CODSNC,$this->getRequestParameter('codigo'));
        $datos=CacatsncPeer::doSelectOne($c);
        if ($datos)
        {
           $nombre=$datos->getDessnc();
           $output = '[["'.$cajtexmos.'","'.$nombre.'",""]]';
        }
        else
        {
         $javascript="alert('Código no existe');$('caregart_codartsnc').value='';";
         $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","",""]]';
        }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
  else  if ($this->getRequestParameter('ajax')=='7')
    {
      $articulo=$this->getRequestParameter('articulo');
      $almacen=$this->getRequestParameter('almacen');
          $fila=$this->getRequestParameter('fil');
         $javascript="";

      $this->configGridAlmUbi($articulo,$almacen,$totalfilas);

      $t= new Criteria();
      $t->add(CaalmubiPeer::CODALM,$almacen);
      $reg= CaalmubiPeer::doSelectOne($t);
      if (!$reg) $totalfilas=0;
      else $totalfilas=1;

      if ($totalfilas!=0)
      {
      	//$javascript="$('divGrid').show();";
      }
      $output = '[["javascript","'.$javascript.'",""],["fila","'.$fila.'",""],["totalfilas","'.$totalfilas.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      //si total filas es igual a cero quiere decir que el almacen no tiene ubicaciones asociadas

    }
    else  if ($this->getRequestParameter('ajax')=='8')
      {
            $javascript="";
            $c=new Criteria();
            $c->add(ContabbPeer::CODCTA,$this->getRequestParameter('codigo'));
            $datos=ContabbPeer::doSelectOne($c);
            if (!$datos)
            {
             $javascript="alert('El Código de la Cuenta Contable no existe');$('caregart_codcta').value='';";
            }
            $output = '[["javascript","'.$javascript.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
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


  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
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

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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

  /**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridUnidades()
  {
      $c = new Criteria();
      $c->add(CaunialartPeer::CODART,$this->caregart->getCodart());
      $per = CaunialartPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almregart/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_unidades');

     $this->obj5 = $this->columnas[0]->getConfig($per);
  }

}

