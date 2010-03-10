<?php

/**
 * almordrec actions.
 *
 * @package    Roraima
 * @subpackage almordrec
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 32987 2009-09-11 14:43:17Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almordrecActions extends autoalmordrecActions
{
	public $msgeli="";

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
	    $datos=split('!',$this->getRequestParameter('codigo'));
	  	$codalm=$datos[0];
	  	$codart=$datos[1];
	  	$cajtexmos=$datos[2];
	    $codubi="";
	  	$output = '[["","",""]]';

	  if ($codalm!="")
	  {
		$aux = split('_',$cajtexmos);
		$name=$aux[0];
		$fil=$aux[1];
		$cajtexcom=$name."_".$fil."_20";
		$cajcodubi=$name."_".$fil."_21";
		$cajnomubi=$name."_".$fil."_22";
		$codalm=str_pad($codalm,6,'0',STR_PAD_LEFT);
		$c=new Criteria();
	    $c->add(CadefalmPeer::CODALM,$codalm);
	    $datos=CadefalmPeer::doSelectOne($c);
	    if ($datos)
		{
		       $nomalm=$datos->getNomalm();
		       //busco la primera ubicacion para el almacen seleccionado, para el articulo tipeado
		       $c = new Criteria();
	           $c->add(CaartalmubiPeer::CODALM,$codalm);
	           $c->add(CaartalmubiPeer::CODART,$codart);
	           $c->addAscendingOrderByColumn(CaartalmubiPeer::CODUBI);
	           $alm = CaartalmubiPeer::doSelectOne($c);
	           if ($alm)
	           {
	             	$codubi=$alm->getCodubi();
	             	$nomubi=CadefubiPeer::getDesubicacion($codubi);
	             	$output = '[["'.$cajtexmos.'","'.$nomalm.'",""],["'.$cajtexcom.'","6","c"],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""]]';
	           }
	           else//el almacen seleccionado no existe para el articulo introducido por el usuario
	           {
		    	$javascript="alert('El articulo : ".$codart.", no existe en el Almacen seleccionado: ".$codalm." ');$('".$cajtexmos."').focus()";
		    	$output = '[["'.$cajtexmos.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
	           }

		}
		else
		{
		    	$nomalm="";
		    	$javascript="alert('Codigo del Almacen no existe...')";
		    	$output = '[["'.$cajtexmos.'","'.$nomalm.'",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
		}// if ($datos)
	    }// if ($codalm)
	   }
	   else if ($this->getRequestParameter('ajax')=='2')
	    {
	  		$dato=CaordcomPeer::getFecord($this->getRequestParameter('codigo'));
	  		$dato=date("d/m/Y",strtotime($dato));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","8","c"]]';
	    }
	     else  if ($this->getRequestParameter('ajax')=='3')
	    {
	  		$dato=CamotfalPeer::getMotivo($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
	    }
	    else  if ($this->getRequestParameter('ajax')=='4')//Ubicación
	    {
	  	    $datos=split('!',$this->getRequestParameter('codigo'));
		   	$codubi=$datos[0];
		  	$codalm=$datos[1];
		  	$codart=$datos[2];
		  	$cajtexmos=$datos[3];
		  	$javascript="";
		  	$output = '[["","",""]]';
		  	if ($codart=="")
		  	{
		     $javascript="alert('Debe primero seleccionar el artículo');";
		     $output = '[["javascript","'.$javascript.'",""]]';
		  	}
		  	else
		  	{
		  		$aux = split('_',$cajtexmos);
				$name=$aux[0];
				$fil=$aux[1];
				$cajcodubi=$name."_".$fil."_21";
				$cajnomubi=$name."_".$fil."_22";
				if (trim($codalm)!="")
		        {
	               $c = new Criteria();
		           $c->add(CaartalmubiPeer::CODALM,$codalm);
		           $c->add(CaartalmubiPeer::CODUBI,$codubi);
		           $c->add(CaartalmubiPeer::CODART,$codart);
		           $alm = CaartalmubiPeer::doSelectOne($c);
	           	   if ($alm)
	           	   {
	           	   		$dato=CadefubiPeer::getDesubicacion($codubi);
	           	   		$javascript="";
	           	   }
	              else
	              {
	                  $javascript="alert('La ubicacion : ".$codubi.", no existe para el almacen seleccionado: ".$codalm." y el articulo ".$codart." ')";
	                  $dato="";
	                  $codubi="";
	              }
	            $output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
		      }
		      else
		      {
		      	$javascript="alert('Primero debe seleccionar un Almacen...');";
		      	$dato="";
		      	$codubi="";
	  			$output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
		      }
		  	}

        }
	    else  if ($this->getRequestParameter('ajax')=='5')
	    {
	  	    $msg="";
            $codart=$this->getRequestParameter('codart');
            $codalm=$this->getRequestParameter('codalm');
	  		$codubi=$this->getRequestParameter('codubi');
	  		$canrec=$this->getRequestParameter('canrec');
	  		$dato="";
	  	    if ($canrec>0)
			{
	  	        if (Recepcion::verificaexiartalmubi($codart,$codalm,$codubi,&$msg))
	                   $dato="S";
	            else
	                   $dato="N";
			}//if ($canrec>0)
            $output = '[["verificaexisydisp","'.$dato.'",""],["mensaje","'.$msg.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

   public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',trim($this->getRequestParameter('carcpart[codalm]')));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('ORDCOM','Caordcom','Ordcom',trim($this->getRequestParameter('carcpart[ordcom]')));
	    }
	}

   public function executeGrid()
	{
        $cajtexcom=$this->getRequestParameter('cajtexcom');
        $this->mensaje="";
        if (trim($this->getRequestParameter('codigo'))!="")
	    {
		 if ($this->getRequestParameter('ajax')=='2')
		 {
 			$c = new Criteria();
	   		$c->add(CaordcomPeer::ORDCOM,$this->getRequestParameter('codigo'));
	   		$c->add(CaordcomPeer::STAORD,'N',Criteria::NOT_EQUAL);
	   		$datos = CaordcomPeer::doSelectOne($c);
	   		$entro=false;
	   		$output = '[["carcpart_fecord","",""],["carcpart_codpro","",""],["carcpart_nompro","",""],["carcpart_desconpag","",""],["carcpart_desforent","",""],["carcpart_desrcp","",""],["carcpart_monrcp","",""]]';
	   		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	   		if ($datos)
	   		{
		   		 $fecrec= $this->getRequestParameter('fecrec');
		   		 $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	   			 $fecreccom = $dateFormat->format($fecrec, 'i', $dateFormat->getInputPattern('d'));
	             if ($datos->getFecord()<=$fecreccom)
	             {
	  				$sql = "Select a.refprc as refprc,a.afeprc as afeprc,a.afecom as afecom,a.afedis as afedis from cpdoccom a,cpcompro b where a.tipcom=b.tipcom and b.refcom='". $datos->getOrdcom() ."'";
	                if (Herramientas::BuscarDatos($sql,&$result))
	                {
	                     if ($result[0]['refprc'] == "N" and $result[0]['afeprc'] == "N" and $result[0]['afecom'] == "N" and $result[0]['afedis'] == "N")
	                     {
	                     	$this->configGrid();
	                        $this->mensaje= "La Orden de Compra no genera Recepcion ya que es ExtraPresupuesto";
	                        $entro=true;
	                     }
	                    $fecha=$datos->getFecord();//CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Fecord');
				  		$fecha=date("d/m/Y",strtotime($fecha));
				  		$codpro=$datos->getCodpro();//CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Codpro');
				  		$nompro=$datos->getNompro();//CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Nompro');
				  		$conpag=$datos->getDesconpag();//CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Desconpag');
				  		$forent=$datos->getDesforent();//CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Desforent');
				  		$monord=$datos->getMonord();//CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Monord');
				  		$monord=number_format($monord,2,',','.');
				  		$des="RECEP. ".$this->getRequestParameter('numero');
			            $output = '[["carcpart_fecord","'.$fecha.'",""],["carcpart_codpro","'.$codpro.'",""],["carcpart_nompro","'.$nompro.'",""],["carcpart_desconpag","'.$conpag.'",""],["carcpart_desforent","'.$forent.'",""],["carcpart_desrcp","'.$des.'",""],["carcpart_monrcp","'.$monord.'",""],["'.$cajtexcom.'","8","c"]]';
			            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			            ////
			            $this->configGrid($this->getRequestParameter('codigo'));
                    }// if (Herramientas::BuscarDatos($sql,&$result))
                   else
	               {
	                	 $this->configGrid();
				 	     $this->mensaje="La Orden de Compra no tiene documento de compromiso asociado...";
	               }
	             }//  if ($fecrec<$fecreccom)
	             else
	             {  $this->configGrid();
				 	$this->mensaje="La Fecha de la Orden de Compra es Mayor a la Fecha de la Recepción";
	             }
	   		}  //	if ($datos)
		 	else
      		{//no existe la requisicion
               $this->configGrid();
               $this->mensaje="La Orden de Compra no existe o esta anulada";
      		}
		 }
	    }//if ($this->getRequestParameter('codigo')!="")
	    else
	       $this->configGrid();
	}

 protected function getCarcpartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $carcpart = new Carcpart();
      $this->configGrid($this->getRequestParameter('carcpart[ordcom]'));
    }
    else
    {
      $carcpart = CarcpartPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($carcpart);
      $this->configGridConsulta($carcpart->getRcpart());
    }

    return $carcpart;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
	 {
	//////////////////////
	//GRID

    $this->setVars();
	$c = new Criteria();
	$c->add(CaartordPeer::ORDCOM,$codigo);
	$c->add(CaartordPeer::CERART,null);
	$this->sql = "Caartord.canord - Caartord.canaju > Caartord.canrec ";
    $c->add(CaartordPeer::CANORD, $this->sql, Criteria::CUSTOM);

	$per = CaartordPeer::doSelect($c);
	$i=0;
	 //si no existen datos quiere decir que no hay articulos pendientes por recibir, la orden de compra ha sido recibida en su totalidad
      if ($codigo!="" && !$per)
      {
         $this->mensaje="La Orden de Compra ". $codigo ." ya ha sido recibida en su totalidad !!";
      }

	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid
	$opciones->setEliminar(false);
	$opciones->setTabla('Caartord');
	$opciones->setAnchoGrid(2500);
	$opciones->setAncho(2500);
	$opciones->setTitulo('Detalle de la Recepción');
	$opciones->setName('a');
	$opciones->setFilas(0);
	$opciones->setHTMLTotalFilas(' ');

	// Se generan las columnas
	$col1 = new Columna('Código Articulo');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('codart');
	$col1->setAlineacionObjeto(Columna::CENTRO);
	$col1->setAlineacionContenido(Columna::CENTRO);
	$col1->setHTML('type="text" size="10" readonly=true');

	$col2 = new Columna('Descripción');
	$col2->setTipo(Columna::TEXTAREA);
	$col2->setNombreCampo('desart');
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setHTML('type="text" size="30x1" readonly=true');

	$col3 = new Columna('Cant. Rec.');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('canrecgri');
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10"');
    $col3->setJScript('onKeypress="cantrecibida(event,this.id)"');

    $col4 = clone $col3;
    $col4->setEsGrabable(false);
    $col4->setTitulo('Cant. Falta.');
    $col4->setNombreCampo('canfal');
    $col4->setHTML('type="text" size="10" readonly=true');

    $col5 = clone $col3;
    $col5->setTitulo('Cant. Dev.');
    $col5->setNombreCampo('candev');
    $col5->setHTML('type="text" size="10" readonly=true');

    $col6 = clone $col3;
    $col6->setTitulo('Costo');
    $col6->setEsNumerico(false);
    $col6->setNombreCampo('preart');
    $col6->setHTML('type="text" size="10" readonly=true');

    $col7 = clone $col3;
    $col7->setTitulo('Descuento');
    $col7->setNombreCampo('dtoart');
    $col7->setHTML('type="text" size="10" readonly=true');

    $col8 = clone $col3;
    $col8->setTitulo('Recargo');
    $col8->setNombreCampo('rgoart');
    $col8->setHTML('type="text" size="10" readonly=true');

    $col9 = clone $col3;
    $col9->setTitulo('Total');
    $col9->setNombreCampo('montot');
    $col9->setEsTotal(true,'carcpart_monrcp');
    $col9->setHTML('type="text" size="10" readonly=true');

    $col10 = new Columna('Cod. Unidad');
	$col10->setTipo(Columna::TEXTO);
	$col10->setEsGrabable(true);
	$col10->setNombreCampo('codcat');
	$col10->setAlineacionObjeto(Columna::CENTRO);
	$col10->setAlineacionContenido(Columna::CENTRO);
	$col10->setHTML('type="text" size="10" readonly=true');


    $obj2= array ('codfal' => '11','desfal' =>'12');
    $col11 = new Columna('Cod. Motivo Faltante');
	$col11->setTipo(Columna::TEXTO);
	$col11->setEsGrabable(true);
	$col11->setNombreCampo('codfal');
	$col11->setAlineacionObjeto(Columna::CENTRO);
	$col11->setAlineacionContenido(Columna::CENTRO);
	$col11->setHTML('type="text" size="5" maxlength="3"');
    //$col11->setCatalogo('camotfal','sf_admin_edit_form','12');
    $col11->setCatalogo('Camotfal','sf_admin_edit_form',$obj2,'Camotfal_Almordrec');
    $col11->setAjax('almordrec',3,12);

    $col12 = new Columna('Motivo Faltante');
	$col12->setTipo(Columna::TEXTAREA);
	$col12->setEsGrabable(true);
	$col12->setNombreCampo('desfal');
	$col12->setAlineacionObjeto(Columna::CENTRO);
	$col12->setAlineacionContenido(Columna::CENTRO);
    $col12->setHTML('type="text" size="30x1" readonly=true');


	$col13 = new Columna('Fecha Estimada de Entrega');
    $col13->setTipo(Columna::FECHA);
    $col13->setAlineacionObjeto(Columna::CENTRO);
    $col13->setAlineacionContenido(Columna::CENTRO);
    $col13->setEsGrabable(true);
    $col13->setNombreCampo('fecest');
    $col13->setHTML(' ');


	//Columnas Ocultas
    $col14 = new Columna('CantRecReal');
    $col14->setTipo(Columna::MONTO);
    $col14->setEsGrabable(false);
    $col14->setNombreCampo('canrecgrireal');
    $col14->setEsNumerico(true);
    $col14->setOculta(true);

    $col15 = new Columna('DtoReal');
    $col15->setTipo(Columna::MONTO);
    $col15->setEsGrabable(false);
    $col15->setNombreCampo('dtoart');
    $col15->setEsNumerico(true);
    $col15->setOculta(true);

    $col16 = new Columna('RgoReal');
    $col16->setTipo(Columna::MONTO);
    $col16->setEsGrabable(false);
    $col16->setNombreCampo('rgoart');
    $col16->setEsNumerico(true);
    $col16->setOculta(true);

    $col17 = new Columna('Cantord');
    $col17->setTipo(Columna::MONTO);
    $col17->setEsGrabable(false);
    $col17->setNombreCampo('canord');
    $col17->setEsNumerico(true);
    $col17->setOculta(true);

    $col18 = new Columna('Cerrar Articulo');
    $col18->setTipo(Columna::CHECK);
    $col18->setNombreCampo('cerart');
    $col18->setEsGrabable(true);
    $col18->setOculta(true);
    $col18->setHTML(' ');

	$objalm= array ('codalm' => '19','nomalm' =>'20');
	$col19 = new Columna('Codigo del Almacen');
    $col19->setTipo(Columna::TEXTO);
    $col19->setAlineacionObjeto(Columna::CENTRO);
    $col19->setAlineacionContenido(Columna::CENTRO);
    $col19->setEsGrabable(true);
    $col19->setNombreCampo('codalm');
    $col19->setHTML('type="text" size="8" maxlength="6"');
    $col19->setCatalogo('Cadefalm','sf_admin_edit_form',$objalm,'Cadelfalm_Almordrec');
    $signo="-";
   	$signomas="+";
    $col19->setJScript('onBlur="toAjax(1,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,18,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');

    $col20 = new Columna('Nombre Almacén');
	$col20->setTipo(Columna::TEXTAREA);
	$col20->setEsGrabable(true);
	$col20->setNombreCampo('nomalm');
	$col20->setAlineacionObjeto(Columna::CENTRO);
	$col20->setAlineacionContenido(Columna::CENTRO);
    $col20->setHTML('type="text" size="30x1" readonly=true');

    $objubi= array ('codubi' => '21','nomubi' =>'22');
    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
    $col21 = new Columna('Codigo de Ubicacion');
    $col21->setTipo(Columna::TEXTO);
    $col21->setAlineacionObjeto(Columna::CENTRO);
    $col21->setAlineacionContenido(Columna::CENTRO);
    $col21->setEsGrabable(true);
    $col21->setNombreCampo('codubi');
    $col21->setHTML('type="text" size="10" maxlength="'.chr(39).$this->lonubi.chr(39).'"');
    $col21->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);
    $col21->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaraubi.chr(39).')"  onBlur="toAjax(4,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,20,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');

    $col22 = new Columna('Nombre Ubicación');
	$col22->setTipo(Columna::TEXTAREA);
	$col22->setEsGrabable(true);
	$col22->setNombreCampo('nomubi');
	$col22->setAlineacionObjeto(Columna::CENTRO);
	$col22->setAlineacionContenido(Columna::CENTRO);
    $col22->setHTML('type="text" size="30x1" readonly=true');


	// Se guardan las columnas en el objetos de opciones
	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);
	$opciones->addColumna($col7);
	$opciones->addColumna($col8);
	$opciones->addColumna($col9);
	$opciones->addColumna($col10);
	$opciones->addColumna($col11);
	$opciones->addColumna($col12);
	$opciones->addColumna($col13);
	$opciones->addColumna($col14);
	$opciones->addColumna($col15);
	$opciones->addColumna($col16);
	$opciones->addColumna($col17);
	$opciones->addColumna($col18);
	$opciones->addColumna($col19);
	$opciones->addColumna($col20);
    $opciones->addColumna($col21);
	$opciones->addColumna($col22);

	// Se genera el arreglo de opciones necesario para generar el grid
	$this->grid = $opciones->getConfig($per);
	}

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulta($rcpart)
	 {
	//////////////////////
	//GRID
	$c = new Criteria();
	//$c->add(CaartrcpPeer::RCPART,$this->carcpart->getRcpart());
	$c->add(CaartrcpPeer::RCPART,$rcpart);
	$per = CaartrcpPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid
	$opciones->setEliminar(false);
	$opciones->setTabla('Caartrcp');
	$opciones->setAnchoGrid(100);
	$opciones->setAncho(100);
	$opciones->setTitulo('Detalle de la Recepción');
	$opciones->setName('a');
	$opciones->setFilas(0);
	$opciones->setHTMLTotalFilas(' ');
	// Se generan las columnas
	$col1 = new Columna('Código Articulo');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(false);
	$col1->setNombreCampo('codart');
	$col1->setAlineacionObjeto(Columna::CENTRO);
	$col1->setAlineacionContenido(Columna::CENTRO);
	$col1->setHTML('type="text" size="15" disabled=true');

	$col2 = new Columna('Descripción');
	$col2->setTipo(Columna::TEXTO);
	$col2->setNombreCampo('desart');
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);
	$col2->setHTML('type="text" size="40" disabled=true');
	$col2->setEsGrabable(false);

	$col3 = new Columna('Cant. Rec.');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(false);
    $col3->setNombreCampo('canrec');
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10"');

    $col4 = clone $col3;
    $col4->setTitulo('Cant. Falta.');
    $col4->setNombreCampo('canfal');

    $col5 = clone $col3;
    $col5->setTitulo('Cant. Dev.');
    $col5->setNombreCampo('candev');

    $col6 = clone $col3;
    $col6->setTitulo('Costo');
    $col3->setEsNumerico(false);
    $col6->setNombreCampo('costos');

    $col7 = clone $col3;
    $col7->setTitulo('Descuento');
    $col7->setNombreCampo('mondes');

    $col8 = clone $col3;
    $col8->setTitulo('Recargo');
    $col8->setNombreCampo('monrgo');

    $col9 = clone $col3;
    $col9->setTitulo('Total');
    $col9->setNombreCampo('montot');


    $col10 = new Columna('Cod. Unidad');
	$col10->setTipo(Columna::TEXTO);
	$col10->setEsGrabable(true);
	$col10->setNombreCampo('codcat');
	$col10->setAlineacionObjeto(Columna::CENTRO);
	$col10->setAlineacionContenido(Columna::CENTRO);
	$col10->setHTML('type="text" size="15" disabled=true');
	$col10->setEsGrabable(false);

    $col11 = new Columna('Cod. Motivo Faltante');
	$col11->setTipo(Columna::TEXTO);
	$col11->setEsGrabable(true);
	$col11->setNombreCampo('codfal');
	$col11->setAlineacionObjeto(Columna::CENTRO);
	$col11->setAlineacionContenido(Columna::CENTRO);
	$col11->setHTML('type="text" size="5" disabled=true');
	$col11->setEsGrabable(false);

    $col12 = new Columna('Motivo Faltante');
	$col12->setTipo(Columna::TEXTO);
	$col12->setEsGrabable(true);
	$col12->setNombreCampo('desfal');
	$col12->setAlineacionObjeto(Columna::CENTRO);
	$col12->setAlineacionContenido(Columna::CENTRO);
	$col12->setHTML('type="text" size="20" disabled=true');
	$col12->setEsGrabable(false);

	$col13 = new Columna('Fecha Estimada de Entrega');
	$col13->setTipo(Columna::TEXTO);
	$col13->setEsGrabable(true);
	$col13->setNombreCampo('fecest');
	$col13->setAlineacionObjeto(Columna::CENTRO);
	$col13->setAlineacionContenido(Columna::CENTRO);
	$col13->setHTML('type="text" size="10" disabled=true');
	$col13->setEsGrabable(false);

	$col14 = new Columna('Codigo del Almacen');
    $col14->setTipo(Columna::TEXTO);
    $col14->setAlineacionObjeto(Columna::CENTRO);
    $col14->setAlineacionContenido(Columna::CENTRO);
    $col14->setEsGrabable(true);
    $col14->setNombreCampo('codalm');
    $col14->setHTML('type="text" size="10" readonly=true');


    $col15 = new Columna('Nombre Almacén');
	$col15->setTipo(Columna::TEXTAREA);
	$col15->setEsGrabable(true);
	$col15->setNombreCampo('nomalm');
	$col15->setAlineacionObjeto(Columna::CENTRO);
	$col15->setAlineacionContenido(Columna::CENTRO);
    $col15->setHTML('type="text" size="30x1" readonly=true');

    $col16 = new Columna('Codigo de Ubicacion');
    $col16->setTipo(Columna::TEXTO);
    $col16->setAlineacionObjeto(Columna::CENTRO);
    $col16->setAlineacionContenido(Columna::CENTRO);
    $col16->setEsGrabable(true);
    $col16->setNombreCampo('codubi');
    $col16->setHTML('type="text" size="10" readonly=true');

    $col17 = new Columna('Nombre Ubicación');
	$col17->setTipo(Columna::TEXTAREA);
	$col17->setEsGrabable(true);
	$col17->setNombreCampo('nomubi');
	$col17->setAlineacionObjeto(Columna::CENTRO);
	$col17->setAlineacionContenido(Columna::CENTRO);
    $col17->setHTML('type="text" size="30x1" readonly=true');


	// Se guardan las columnas en el objetos de opciones
	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);
	$opciones->addColumna($col7);
	$opciones->addColumna($col8);
	$opciones->addColumna($col9);
	$opciones->addColumna($col10);
	$opciones->addColumna($col11);
	$opciones->addColumna($col12);
	$opciones->addColumna($col13);
	$opciones->addColumna($col14);
	$opciones->addColumna($col15);
	$opciones->addColumna($col16);
	$opciones->addColumna($col17);
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->grid = $opciones->getConfig($per);
	}


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->carcpart = $this->getCarcpartOrCreate();
    $this->setVars();
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCarcpartFromRequest();

      $this->saveCarcpart($this->carcpart);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
	  $this->carcpart->setId(Herramientas::getX_vacio('rcpart','carcpart','id',$this->carcpart->getRcpart()));

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almordrec/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almordrec/list');
      }
      else
      {
        return $this->redirect('almordrec/edit?id='.$this->carcpart->getId());
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
  protected function updateCarcpartFromRequest()
  {
    $carcpart = $this->getRequestParameter('carcpart');

    if (isset($carcpart['rcpart']))
    {
      $this->carcpart->setRcpart($carcpart['rcpart']);
    }
    if (isset($carcpart['fecrcp']))
    {
      if ($carcpart['fecrcp'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($carcpart['fecrcp']))
          {
            $value = $dateFormat->format($carcpart['fecrcp'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $carcpart['fecrcp'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->carcpart->setFecrcp($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->carcpart->setFecrcp(null);
      }
    }
    if (isset($carcpart['codalm']))
    {
      $this->carcpart->setCodalm($carcpart['codalm']);
    }
    if (isset($carcpart['nomalm']))
    {
      $this->carcpart->setNomalm($carcpart['nomalm']);
    }
    if (isset($carcpart['ordcom']))
    {
      $this->carcpart->setOrdcom($carcpart['ordcom']);
    }
    if (isset($carcpart['fecord']))
    {
      $this->carcpart->setFecord($carcpart['fecord']);
    }
    if (isset($carcpart['desrcp']))
    {
      $this->carcpart->setDesrcp($carcpart['desrcp']);
    }
    if (isset($carcpart['codpro']))
    {
      $this->carcpart->setCodpro($carcpart['codpro']);
    }
    if (isset($carcpart['nompro']))
    {
      $this->carcpart->setNompro($carcpart['nompro']);
    }
    if (isset($carcpart['desconpag']))
    {
      $this->carcpart->setDesconpag($carcpart['desconpag']);
    }
    if (isset($carcpart['desforent']))
    {
      $this->carcpart->setDesforent($carcpart['desforent']);
    }
    if (isset($carcpart['numfac']))
    {
      $this->carcpart->setNumfac($carcpart['numfac']);
    }
    if (isset($carcpart['nroent']))
    {
      $this->carcpart->setNroent($carcpart['nroent']);
    }
    if (isset($carcpart['monrcp']))
    {
      $this->carcpart->setMonrcp($carcpart['monrcp']);
    }
     $this->carcpart->setStarcp('A');
     $this->carcpart->setGenord('N');
    if (isset($carcpart['codubi']))
    {
      $this->carcpart->setCodubi($carcpart['codubi']);
    }
    if (isset($carcpart['nomubi']))
    {
      $this->carcpart->setNomubi($carcpart['nomubi']);
    }

    if (isset($carcpart['canjau']))
    {
      $this->carcpart->setCanjau($carcpart['canjau']);
    }

    if (isset($carcpart['nomcli']))
    {
      $this->carcpart->setNomcli($carcpart['nomcli']);
    }

    if (isset($carcpart['cancaj']))
    {
      $this->carcpart->setCancaj($carcpart['cancaj']);
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
  protected function saveCarcpart($carcpart)
  {
    if ($carcpart->getId())
     {
	 $carcpart->save();
    }
    else //nuevo
    {
		$grid2=Herramientas::CargarDatosGrid($this,$this->grid);
		Recepcion::salvarAlmrec($carcpart,$grid2);
	}
  }

  protected function deleteCarcpart($carcpart)
  {
    $this->msgeli="";
    if (Recepcion::eliminarAlmrec($carcpart,&$this->msgeli))
     return true;
    else
     return false;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->carcpart = CarcpartPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->carcpart);
    $id=$this->getRequestParameter('id');

    try
    {
     if ($this->deleteCarcpart($this->carcpart))
     {
     	$this->Bitacora('Elimino');
     	return $this->redirect('almordrec/list');
     }
     else
     {
     	$meneli="No se puede eliminar la Recepción ". $this->carcpart->getRcpart() .", ya que ".$this->msgeli. ", con lo cual no se pueden devolver los artículos al almacén/ubicación correspondiente.";
    	$this->getRequest()->setError('delete', $meneli);
	    return $this->forward('almordrec', 'list');
        //return $this->redirect('almordrec/edit?id='.$id);
     }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Carcpart. Make sure it does not have any associated items.');
      return $this->forward('almordrec', 'list');
    }


  }
   
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
     $resp=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
		 $this->carcpart = $this->getCarcpartOrCreate();
		 if ($this->carcpart->getId())
		 {
	         $carcpart = $this->getRequestParameter('carcpart');
	         $valor = $carcpart['rcpart'];
	         $campo='rcpart';
	    	 $valor1 = $carcpart['fecrcp'];
	         $campo1='fecrcp';
	    	 $valor2 = $carcpart['ordcom'];
	         $campo2='ordcom';

	    	 $resp=Herramientas::ValidarCodigo($valor,$this->carcpart,$campo);
	    	 if ($valor1!="") $resp1=Herramientas::ValidarCodigo($valor1,$this->carcpart,$campo1,'F');
	    	 $resp2=Herramientas::ValidarCodigo($valor2,$this->carcpart,$campo2);

		     if($resp!=-1){
		        $this->coderror = $resp;
		        return false;
		      }
		    else if($resp1!=-1){
		        $this->coderror = $resp1;
		        return false;
		      }
		    else if($resp2!=-1){
		        $this->coderror = $resp2;
		        return false;
		      }
		      else return true;
        }
       else//una nueva recepcion
		 {
		 	$carcpart = $this->getRequestParameter('carcpart');
		 	//if ($carcpart['codalm']!="" and $carcpart['codubi']!="")
		 	//{
			  //  if (Compras::verificarexistenciaubialm($carcpart['codalm'],$carcpart['codubi']))
			   // {
			    	//verificar en el grid de articulos que todos los articulos pertenezcan al almacen y ubicacion indicada
			    	//y verificar que al menos un articulo del grid tenga cantidad mayo que cero.
			    	  $grid=Herramientas::CargarDatosGrid($this,$this->grid);
			    	  $x=$grid[0];
				      $j=0;
				      $msg="";
				      $h=0;
				      $encontro=false;
				      while ($j<count($x))
				      {
				       if ($x[$j]->getCerart()!=1)
				       {
				         if ($x[$j]->getCanrecgri()>0)
				      	 {
				      	 $encontro=true;
				      	 if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
				      	 {
				      	 	$msg="Debe indicar el Código del Almacén y la Ubicación de todos los Artículos del Detalle de la Recepción";
				      	 	$this->getRequest()->setError('',$msg);
			 				return false;
				      	 }// if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
				         if (!Recepcion::verificaexiartalmubi($x[$j]->getCodart(),$x[$j]->getCodalm(),$x[$j]->getCodubi(),&$msg))
		                 {
							$msg=$msg." Coloque cantidad a recibir en cero (0) a este articulo si desea continuar con la recepcion del resto de los articulos...";
							$this->getRequest()->setError('',$msg);
			 				return false;
		                 }
				      	}//if ($x[$j]->getCanrecgri()>0)
				      }// if ($x[$j]->getCerart()!=1)
				         $j++;
				      }//while ($j<count($x))
	                   if (!$encontro)
	                   {
	                   	$mierr = Herramientas::obtenerMensajeError('162');
	                    $this->getRequest()->setError('',$mierr);
				 		return false;
	                   }
	                   return true;
			   /* }//if (Compras::verificarexistenciaubialm($carcpart['codalm'],$carcpart['codubi']))
			 	else
			 	{
			 		$mierr = Herramientas::obtenerMensajeError('168');
                    $this->getRequest()->setError('carcpart{codubi}',$mierr);
			 		return false;
			 	}
//		 	 }//if ($carcpart['codalm']!="" and $carcpart['codubi']!="")*/
		 	//else
		 }
    }else return true;

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
    $this->carcpart = $this->getCarcpartOrCreate();

	try{
		$this->updateCarcpartFromRequest();
		}catch(Exception $ex){}
    $this->setVars();
	$grid2=Herramientas::CargarDatosGrid($this,$this->grid);
    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function setVars()
  {
  	$this->recmer='';
    $this->mascaraubi= Herramientas::ObtenerFormato('Cadefart','Forubi');
    $this->lonubi=strlen($this->mascaraubi);

   		  $recmer = 'N';     //Integracion con Presupuesto
		    $this->mansolocor="";
		    $this->bloqfec="";
		    $this->oculeli="";
		  $varemp = $this->getUser()->getAttribute('configemp');
		  if(is_array($varemp))
		    if(array_key_exists('aplicacion',$varemp))
		  	  if(array_key_exists('compras',$varemp['aplicacion']))
			   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
			     if(array_key_exists('almordrec',$varemp['aplicacion']['compras']['modulos'])){
			       if(array_key_exists('recmer',$varemp['aplicacion']['compras']['modulos']['almordrec']))
			       {
		  		       $this->recmer = $varemp['aplicacion']['compras']['modulos']['almordrec']['recmer'];
			       }
		           if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almordrec']))
			       {
			       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almordrec']['mansolocor'];
			       }
			       if(array_key_exists('bloqfec',$varemp['aplicacion']['compras']['modulos']['almordrec']))
			       {
			       	$this->bloqfec=$varemp['aplicacion']['compras']['modulos']['almordrec']['bloqfec'];
			       }
			       if(array_key_exists('oculeli',$varemp['aplicacion']['compras']['modulos']['almordrec']))
			       {
			       	$this->oculeli=$varemp['aplicacion']['compras']['modulos']['almordrec']['oculeli'];
			       }

			     }
  }


}
