<?php

/**
 * almtraalm actions.
 *
 * @package    Roraima
 * @subpackage almtraalm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almtraalmActions extends autoalmtraalmActions
{
  private $coderror=-1;


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->catraalm = $this->getCatraalmOrCreate();
	$this->setVars();
	$this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatraalmFromRequest();
      if ($this->saveCatraalm($this->catraalm)==-1)
      {
		  $this->catraalm->setId(Herramientas::getX_vacio('codtra','Catraalm','id',$this->catraalm->getCodtra()));

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almtraalm/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almtraalm/list');
	      }
	      else
	      {
	        return $this->redirect('almtraalm/edit?id='.$this->catraalm->getId());
	      }
      }
      else
      {
	          $this->labels = $this->getLabels();
	          $err = Herramientas::obtenerMensajeError($this->coderror);
         	  $this->getRequest()->setError('',$err);
	          return sfView::SUCCESS;
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
    $this->catraalm = $this->getCatraalmOrCreate();
    $this->updateCatraalmFromRequest();
    $this->setVars();
	$this->configGrid();
	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
  	$grid_arreglo=Herramientas::CargarDatosGrid($this,$this->obj,true);
    $this->labels = $this->getLabels();

	if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	        if($this->coderror!=-1)
	        {
	          $err = Herramientas::obtenerMensajeError($this->coderror);
         	  $this->getRequest()->setError('',$err.$this->coderror_art);
	        }
      }
    return sfView::SUCCESS;
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
  	/**************************************************************************
  	 **         Grid de la Orden de Compra Formulario Amlordcom                      **
  	 **       Jaime Suárez Graba en Clase Articulos.class.php                 **
  	 **************************************************************************/


  	$c = new Criteria();
  	$c->add(CadettraPeer::CODTRA,$this->catraalm->getCodtra());
  	$per = CadettraPeer::doSelect($c);
  	$mascaraarticulo=$this->mascaraarticulo;
  	$lonart=strlen($this->mascaraarticulo);
  	$formatocategoria=$this->formatocategoria;
  	$params= array('param1' => $lonart);

  	// Se crea el objeto principal de la clase OpcionesGrid
  	$opciones = new OpcionesGrid();
  	// Se configuran las opciones globales del Grid
  	if (!$this->catraalm->getId())
  	    $opciones->setEliminar(true);
  	else
  	    $opciones->setEliminar(false);
  	if ($this->catraalm->getId()) $opciones->setFilas(0);
  	$opciones->setTabla('Cadettra');
  	$opciones->setName('a');
  	$opciones->setAnchoGrid(850);
  	$opciones->setAncho(850);
  	$opciones->setTitulo('Artículos');
  	$opciones->setHTMLTotalFilas(' ');

        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
  	// Se generan las columnas
  	$col1 = new Columna('Código  Artículo');
  	$col1->setTipo(Columna::TEXTO);
  	$col1->setEsGrabable(true);
  	$col1->setAlineacionObjeto(Columna::CENTRO);
  	$col1->setAlineacionContenido(Columna::CENTRO);
  	$col1->setNombreCampo('Codart');
        $signo="-";
        $signomas="+";
  	if (!$this->catraalm->getId())
  		$col1->setHTML('type="text" size="15"  maxlength="'.chr(39).$lonart.chr(39).'"');
  	else
  	   $col1->setHTML('type="text" size="15"  readonly=true');
	if (!$this->catraalm->getId()) $col1->setCatalogo('caregart','sf_admin_edit_form', array('codart' => 1, 'desart' => 2, 'unimed' => 3),'Caregart_Almtraalm',$params);
  	if ($manartlot=='S') {
           if (!$this->catraalm->getId()) $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjaxUpdater(obtenerColumna(this.id,5,'.chr(39).$signomas.chr(39).'),3,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$F("catraalm_codubiori")+'.chr(39).'!'.chr(39).'+$F("catraalm_almori")+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
        }
        else {
  	if (!$this->catraalm->getId()) $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; ajaxdetalle(event,this.id);"');
        }

  	$col2 = new Columna('Descripción');
  	$col2->setTipo(Columna::TEXTAREA);
  	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
  	$col2->setAlineacionContenido(Columna::IZQUIERDA);
  	$col2->setNombreCampo('Desart');
  	$col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="30x1" readonly=true');

  	$col3 = new Columna('Unidad');
  	$col3->setTipo(Columna::TEXTO);
  	$col3->setEsGrabable(true);
  	$col3->setAlineacionObjeto(Columna::DERECHA);
  	$col3->setAlineacionContenido(Columna::DERECHA);
  	$col3->setNombreCampo('Unimed');
  	$col3->setHTML('type="text" size="10" readonly=true');

  	$col4 = new Columna('Disponible');
  	$col4->setTipo(Columna::MONTO);
  	$col4->setEsGrabable(true);
  	$col4->setAlineacionContenido(Columna::DERECHA);
  	$col4->setAlineacionObjeto(Columna::DERECHA);
  	$col4->setNombreCampo('Exitot');
  	$col4->setEsNumerico(true);
  	$col4->setHTML('type="text" size="15" readonly=true');
  	$col4->setJScript('onKeypress="entermonto(event,this.id)"');
  	if ($this->catraalm->getId()) $col4->setOculta(true);

  	$col5 = new Columna('Transferir');
  	$col5->setTipo(Columna::MONTO);
  	$col5->setEsGrabable(true);
  	$col5->setAlineacionContenido(Columna::DERECHA);
  	$col5->setAlineacionObjeto(Columna::DERECHA);
  	$col5->setNombreCampo('Canart');
  	$col5->setEsNumerico(true);
  	if (!$this->catraalm->getId())
  	    $col5->setHTML('type="text" size="15"');
  	 else
  	    $col5->setHTML('type="text" size="15" readonly=true');
    if (!$this->catraalm->getId()) $col5->setJScript('onKeypress="validarcantidad(event,this.id)"');

    if ($manartlot=='S')
    {
        if ($this->catraalm->getId())
        {
           $col6= new Columna('Número de Lote');
           $col6->setTipo(Columna::TEXTO);
           $col6->setEsGrabable(true);
           $col6->setAlineacionObjeto(Columna::CENTRO);
           $col6->setAlineacionContenido(Columna::CENTRO);
           $col6->setNombreCampo('numlot');
           $col6->setHTML('type="text" size="15" readonly=true');
         }
         else
          {
                $col6= new Columna('Nro. de Lote');
                $col6->setTipo(Columna::COMBOCLASE);
                $col6->setEsGrabable(true);
                $col6->setNombreCampo('numlot');
                $col6->setCombosclase('Numlotxart');
                $col6->setHTML(' ');
          }

           $col7= new Columna('codalm');
	   $col7->setTipo(Columna::TEXTO);
	   $col7->setEsGrabable(true);
	   $col7->setNombreCampo('codalm');
	   $col7->setOculta(true);


           $col8= new Columna('codubi');
	   $col8->setTipo(Columna::TEXTO);
	   $col8->setEsGrabable(true);
	   $col8->setNombreCampo('codubi');
	   $col8->setOculta(true);
    }


  	// Se guardan las columnas en el objetos de opciones
  	$opciones->addColumna($col1);
  	$opciones->addColumna($col2);
  	$opciones->addColumna($col3);
  	$opciones->addColumna($col4);
  	$opciones->addColumna($col5);
        if ($manartlot=='S')
        {
            $opciones->addColumna($col6);
            $opciones->addColumna($col7);
            $opciones->addColumna($col8);
        }


  	// Ee genera el arreglo de opciones necesario para generar el grid
  	$this->obj = $opciones->getConfig($per);

  }
  public function setVars()
  {
  	$this->mascaraarticulo = Herramientas::getMascaraArticulo();
  	$this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
    $this->mascaraubi= Herramientas::ObtenerFormato('Cadefart','Forubi');
    $this->lonubi=strlen($this->mascaraubi);

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
  protected function saveCatraalm($catraalm)
  {
  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
  	$grid_arreglo=Herramientas::CargarDatosGrid($this,$this->obj,true);
  	$grid_detallado=$grid_arreglo[0];
    if (!$catraalm->getId()) //REGISTRO NUEVO
    {
	  	if (Articulos::salvarGrabar_Transferencia($catraalm,$grid,$grid_detallado,&$error_obtenido,&$codigo_articulo))
	  	{
	  		   $this->coderror_art=$codigo_articulo;
	  		   $this->coderror=$error_obtenido;
	  		   return $error_obtenido;
		}//	if (Articulos::salvarGrabar_Transferencia($catraalm,$grid,$grid_detallado,&$error_obtenido,&$codigo_articulo))
		else
		{
		    $this->coderror_art=$codigo_articulo;
			$this->coderror=$error_obtenido;
			return $error_obtenido;
		}
    }//if (!$catraalm->getId()) //REGISTRO NUEVO
    else
    {
       $catraalm->save();
       return -1;
    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCatraalmFromRequest()
  {
  	$catraalm = $this->getRequestParameter('catraalm');
	$this->setVars();
	$this->configGrid();

  	if (isset($catraalm['codtra']))
  	{
  		$this->catraalm->setCodtra($catraalm['codtra']);
  	}
  	if (isset($catraalm['fectra']))
  	{
  		if ($catraalm['fectra'])
  		{
  			try
  			{
  				$dateFormat = new sfDateFormat($this->getUser()->getCulture());
  				if (!is_array($catraalm['fectra']))
  				{
  					$value = $dateFormat->format($catraalm['fectra'], 'i', $dateFormat->getInputPattern('d'));
  				}
  				else
  				{
  					$value_array = $catraalm['fectra'];
  					$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
  				}
  				$this->catraalm->setFectra($value);
  			}
  			catch (sfException $e)
  			{
  				// not a date
  			}
  		}
  		else
  		{
  			$this->catraalm->setFectra(null);
  		}
  	}
  	if (isset($catraalm['destra']))
  	{
  		$this->catraalm->setDestra($catraalm['destra']);
  	}
  	if (isset($catraalm['almori']))
  	{
  		$this->catraalm->setAlmori($catraalm['almori']);
  	}
  	if (isset($catraalm['almdes']))
  	{
  		$this->catraalm->setAlmdes($catraalm['almdes']);
  	}
  	if (isset($catraalm['codubiori']))
  	{
  		$this->catraalm->setCodubiori($catraalm['codubiori']);
  	}
  	if (isset($catraalm['codubides']))
  	{
  		$this->catraalm->setCodubides($catraalm['codubides']);
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
  	$cajtexmos=$this->getRequestParameter('cajtexmos');
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	  {
	  	$dato=CadefalmPeer::getDesalmacen($this->getRequestParameter('codigo'));
	  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
	  }
	  else if ($this->getRequestParameter('ajax')=='2')
	    {
	  	  $codalm=$this->getRequestParameter('codalm');
	  	  $codubi=$this->getRequestParameter('codigo');
	  	  $origen=$this->getRequestParameter('origen');
	      if (trim($codalm)!="")
	      {
	  		 if (Compras::verificarexistenciaubialm($codalm,$codubi))
              {
                  $dato=CadefubiPeer::getDesubicacion($codubi);
                  $javascript="";
              }
               else
              {
              	 if ($origen=="O")//ubicacion origen
                   $javascript="alert('La ubicacion : ".$codubi.", no existe para el Almacén Origen seleccionado...');$('catraalm_codubiori').value='';$('catraalm_nomubiori').value='';$('catraalm_codubiori').focus();";
                else
                   $javascript="alert('La ubicacion : ".$codubi.", no existe para el Almacén Destino seleccionado...');$('catraalm_codubides').value='';$('catraalm_nomubides').value='';$('catraalm_codubides').focus();";
                $dato="";
              }
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
	      }
	      else
	      {
	      	 if ($origen=="O")//ubicacion origen
	      		$javascript="alert('Primero debe seleccionar un Almacén Origen...');$('catraalm_codubiori').value='';$('catraalm_nomubiori').value='';$('catraalm_codubiori').focus();";
	         else
	         	$javascript="alert('Primero debe seleccionar un Almacén Destino...');$('catraalm_codubides').value='';$('catraalm_nomubides').value='';$('catraalm_codubides').focus();";
  			$output = '[["javascript","'.$javascript.'",""]]';
	      }
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
	    }
		else  if ($this->getRequestParameter('ajax')=='3')
	    {
	      	$manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
                if ($manartlot=='S')
                {
                    $datos=split('!',$this->getRequestParameter('codigo'));
                    $codart=$datos[0];
                    $codubi=$datos[1];
                    $codalm=$datos[2];
                    $cajtexmos=$datos[3];
                    $aux = split('_',$cajtexmos);
                    $name=$aux[0];
                    $fil=$aux[1];
                    $cajtexcom=$name."_".$fil."_1";
                    $cajunidad=$name."_".$fil."_3";
                    $cajdispon=$name."_".$fil."_4";
                    $cajcantra=$name."_".$fil."_5";
                    $cajcodalm=$name."_".$fil."_7";
                    $cajcodubi=$name."_".$fil."_8";
                    $numlot="";
                    $output = '[["","",""]]';
                    if ($codart!="")
                    {
	      	$c= new Criteria();
                        $c->add(CaregartPeer::CODART,$codart);
                        $reg=CaregartPeer::doSelectOne($c);
                        if ($codalm!="" and $codubi!="")
                        {
                            if ($reg)
                            {
                                $exiact=0;
                                if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($codart,$codalm,$codubi,&$exiact,&$numlot))
                                {
                                    $desart=htmlspecialchars($reg->getDesart());
                                    $unimed=$reg->getUnimed();
                                    $disponibilidad=$exiact;
                                    $output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$cajunidad.'","'.$unimed.'",""],["'.$cajdispon.'","'.$disponibilidad.'",""],["'.$cajcodalm.'","'.$codalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""]]';
                                }//if (Despachos::verificaexisydisp($x[$j]->getCodart(),$cadphart['codalm'],$cadphart['codubi'],$x[$j]->getCandes(),&$msg)
                                else
                                {
                                    $mensaje="El Artículo ".$codart." no esta definido en el Almacen ".$codalm." para la Ubicacion ".$codubi;
                                    $javascript="alert('".$mensaje."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00'";
                                    $output = '[["javascript","'.$javascript.'",""]]';
                                }
                            }
                            else
                            {
                                 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $cajunidad ."').value='';$('". $cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00'";
                                 $output = '[["javascript","'.$javascript.'",""]]';
                            }
                        }//if ($this->getRequestParameter('almori')!="")
                        else
                        {
                          $javascript="alert('Debe seleccionar el Almacén y la Ubicación Origen antes de incluir los artículos a transferir...');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('".$cajunidad ."').value='';$('".$cajdispon ."').value='0.00';$('". $cajcantra ."').value='0.00'";
                          $output = '[["javascript","'.$javascript.'",""]]';
                        }
                    }//if ($codart!="")
                  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                  $this->numlot=$numlot;
                  $this->lotes=$this->ObtenerNumlotxart($codart,$codalm,$codubi);
                }else {

                $c= new Criteria();
			$c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
	      	$reg=CaregartPeer::doSelectOne($c);
	      	if ($this->getRequestParameter('almori')!="" and $this->getRequestParameter('ubiori')!="")
	      	{
		  		if ($reg)
		  		{
		  			$exiact=0;
		  		    if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($this->getRequestParameter('codigo'),$this->getRequestParameter('almori'),$this->getRequestParameter('ubiori'),&$exiact))
		  		    {
				        $desart=htmlspecialchars($reg->getDesart());
				        $unimed=$reg->getUnimed();
		                $disponibilidad=$exiact;
				        $output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$this->getRequestParameter('unidad').'","'.$unimed.'",""],["'.$this->getRequestParameter('dispon').'","'.$disponibilidad.'",""]]';
				    }//if (Despachos::verificaexisydisp($x[$j]->getCodart(),$cadphart['codalm'],$cadphart['codubi'],$x[$j]->getCandes(),&$msg)
				    else
				    {
				    	$mensaje="El Artículo ".$this->getRequestParameter('codigo')." no esta definido en el Almacen ".$this->getRequestParameter('almori')." para la Ubicacion ".$this->getRequestParameter('ubiori');
				    	$javascript="alert('".$mensaje."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('dispon') ."').value='0.00';$('". $this->getRequestParameter('cantransf') ."').value='0.00'";
		        	 	$output = '[["javascript","'.$javascript.'",""]]';
				    }
		  		}
		  		else
		  		{
		  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('dispon') ."').value='0.00';$('". $this->getRequestParameter('cantransf') ."').value='0.00'";
		        	 $output = '[["javascript","'.$javascript.'",""]]';
		  		}
	      	}//if ($this->getRequestParameter('almori')!="")
      		else
	  		{
	  		  $javascript="alert('Debe seleccionar el Almacén y la Ubicación Origen antes de incluir los artículos a transferir...');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('dispon') ."').value='0.00';$('". $this->getRequestParameter('cantransf') ."').value='0.00'";
	          $output = '[["javascript","'.$javascript.'",""]]';
	  		}
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}
	    }//else  if ($this->getRequestParameter('ajax')=='3')

	}

       public function ObtenerNumlotxart($codart="",$codalm="",$codubi="")
      {
        $c = new Criteria();
        $c->add(CaartalmubiPeer::CODALM,$codalm);
        $c->add(CaartalmubiPeer::CODUBI,$codubi);
        $c->add(CaartalmubiPeer::CODART,$codart);
        $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
        $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

        $datos = CaartalmubiPeer::doSelect($c);

        $lotes = array();

        foreach($datos as $obj_datos)
        {
         if ($obj_datos->getFecven()!="")
         {
            $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
            $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
         }
          else
            $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());

        }
        return $lotes;
      }

   public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',trim($this->getRequestParameter('catraalm[almori]')));
	    }

	}


  protected function deleteCatraalm($catraalm)
  {
     Articulos::eliminar_Transferencia($catraalm,&$error);
     $this->coderror=$error;
     if ($error!=-1)
       return false;
     else
       return true;
  }

   /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->catraalm = CatraalmPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->catraalm);

    try
    {
      if (!$this->deleteCatraalm($this->catraalm))
      {
      	$err = Herramientas::obtenerMensajeError($this->coderror);
        $this->setFlash('notice',$err);
        //$this->getRequest()->setError('',$err);
		return $this->redirect('almtraalm/edit?id='.$this->getRequestParameter('id'));
      }
      else
      {
      	 $this->Bitacora('Elimino');
      	 return $this->redirect('almtraalm/list');
      }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Catraalm. Make sure it does not have any associated items.');
      return $this->forward('almtraalm', 'list');
    }
  }

   
  
  
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
		    $this->catraalm = $this->getCatraalmOrCreate();
   			$this->updateCatraalmFromRequest();
			$catraalm = $this->getRequestParameter('catraalm');
		 	if ($catraalm['almori']!="" and $catraalm['codubiori']!="")
		 	{
			    if (Compras::verificarexistenciaubialm($catraalm['almori'],$catraalm['codubiori']))
			    {
	                 if ($catraalm['almdes']!="" and $catraalm['codubides']!="")
				 	 {
					    if (Compras::verificarexistenciaubialm($catraalm['almdes'],$catraalm['codubides']))
					    {
			                   return true;
					    }//if (Compras::verificarexistenciaubialm($cadphart['almdes'],$cadphart['codubides']))
					 	else
					 	{
					 		$mierr = Herramientas::obtenerMensajeError('168');
		                    $this->getRequest()->setError('catraalm{codubides}',$mierr);
					 		return false;
					 	}
				 	 }//if $catraalm['almori']!="" and $catraalm['codubiori']!="")
			    }//if (Compras::verificarexistenciaubialm($catraalm['almori'],$catraalm['codubiori']))
			 	else
			 	{
			 		$mierr = Herramientas::obtenerMensajeError('168');
                    $this->getRequest()->setError('catraalm{codubiori}',$mierr);
			 		return false;
			 	}

		 	 }//if $catraalm['almori']!="" and $catraalm['codubiori']!=""
		 	else return true;
      }// if($this->getRequest()->getMethod() == sfRequest::POST)
    else return true;
  }

}