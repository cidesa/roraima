<?php

/**
 * almtraalm actions.
 *
 * @package    siga
 * @subpackage almtraalm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almtraalmActions extends autoalmtraalmActions
{
  private $coderror=-1;


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

  	// Se generan las columnas
  	$col1 = new Columna('Código  Artículo');
  	$col1->setTipo(Columna::TEXTO);
  	$col1->setEsGrabable(true);
  	$col1->setAlineacionObjeto(Columna::CENTRO);
  	$col1->setAlineacionContenido(Columna::CENTRO);
  	$col1->setNombreCampo('Codart');
  	if (!$this->catraalm->getId())
  		$col1->setHTML('type="text" size="15"  maxlength="'.chr(39).$lonart.chr(39).'"');
  	else
  	   $col1->setHTML('type="text" size="15"  readonly=true');
	if (!$this->catraalm->getId()) $col1->setCatalogo('caregart','sf_admin_edit_form', array('codart' => 1, 'desart' => 2, 'unimed' => 3),'Caregart_Almtraalm',$params);
  	if (!$this->catraalm->getId()) $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; ajaxdetalle(event,this.id);"');

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


  	// Se guardan las columnas en el objetos de opciones
  	$opciones->addColumna($col1);
  	$opciones->addColumna($col2);
  	$opciones->addColumna($col3);
  	$opciones->addColumna($col4);
  	$opciones->addColumna($col5);


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

  public function executeAjax()
  {
  	$cajtexmos=$this->getRequestParameter('cajtexmos');
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	  {
	  	$dato=CadefalmPeer::getDesalmacen($this->getRequestParameter('codigo'));
	  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
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
	    }
		else  if ($this->getRequestParameter('ajax')=='3')
	    {
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
	    }//else  if ($this->getRequestParameter('ajax')=='3')
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
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