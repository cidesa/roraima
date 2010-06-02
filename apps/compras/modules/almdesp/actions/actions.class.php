<?php

/**
 * almdesp actions.
 *
 * @package    Roraima
 * @subpackage almdesp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almdespActions extends autoalmdespActions
{
 private $coderror =-1;


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
     $resp=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
		 $this->cadphart = $this->getCadphartOrCreate();
		 if  ($this->cadphart->getId())
		 {
	         $cadphart = $this->getRequestParameter('cadphart');
	         $valor = $cadphart['dphart'];
	         $campo='dphart';
	    	 $valor1 = $cadphart['fecdph'];
	         $campo1='fecdph';
	    	 $valor2 = $cadphart['reqart'];
	         $campo2='reqart';
	         $valor3 = $cadphart['codori'];
	         $campo3='codori';
	         $valor4 = $cadphart['mondph'];
	         $campo4='mondph';
	    	 $resp=Herramientas::ValidarCodigo($valor,$this->cadphart,$campo);
	    	 if ($valor1!="") $resp1=Herramientas::ValidarCodigo($valor1,$this->cadphart,$campo1,'F');
	    	 $resp2=Herramientas::ValidarCodigo($valor2,$this->cadphart,$campo2);
	         $resp3=Herramientas::ValidarCodigo($valor3,$this->cadphart,$campo3);
	         $resp4=Herramientas::ValidarCodigo($valor4,$this->cadphart,$campo4);

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
		     else if($resp3!=-1){
		        $this->coderror = $resp3;
		        return false;
		      }
		       else if($resp4!=-1){
		        $this->coderror = $resp4;
		        return false;
		      }
             else return true;
		 }
		 else//un nuevo despacho
		 {
			    	//verificar en el grid de articulos que todos los articulos pertenezcan al almacen y ubicacion indicada
			    	//y verificar que al menos un articulo del grid tenga cantidad mayo que cero.
			    	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
			    	  $x=$grid[0];
				      $j=0;
				      $msg="";
				      $h=0;
				      $encontro=false;
				      while ($j<count($x))
				      {
				      	if ($x[$j]->getCandes()>0)
				      	{
				      	 if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
				      	 {
							$msg="Debe indicar el Código del Almacén, la Ubicación a despachar por cada artículo del detalle";
							$this->getRequest()->setError('',$msg);
			 				return false;
				      	 }
				      	 $encontro=true;
				         if (!Despachos::verificaexisydisp($x[$j]->getCodart(),$x[$j]->getCodalm(),$x[$j]->getCodubi(),$x[$j]->getCandes(),&$msg))
		                 {
		                 	$msg=$msg.". Coloque la cantidad a despachar disponible en cero (0) a este articulo si desea continuar con el despacho del resto de los articulos...";
							$this->getRequest()->setError('',$msg);
			 				return false;
		                 }
				      	}
				         $j++;
				      } //while ($j<count($x))
	                   if (!$encontro)
	                   {
	                   	$mierr = Herramientas::obtenerMensajeError('160');
	                    $this->getRequest()->setError('',$mierr);
				 		return false;
	                   }
	                   return true;
		 }

    }else return true;

  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->cadphart = $this->getCadphartOrCreate();
    $this->setVars();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadphartFromRequest();

       if($this->saveCadphart($this->cadphart)==-1){
          $this->setFlash('notice', 'Your modifications have been saved');
 		  $this->cadphart->setId(Herramientas::getX_vacio('dphart','cadphart','id',$this->cadphart->getDphart()));

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almdesp/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almdesp/list');
	      }
	      else
	      {
	        return $this->redirect('almdesp/edit?id='.$this->cadphart->getId());
	      }
       }
       else
	    {
          $this->labels = $this->getLabels();
       	  if($this->coderror!=-1)
	      {
	       $err = Herramientas::obtenerMensajeError($this->coderror);
	       $this->getRequest()->setError('',$err);
	      }
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
    $this->cadphart = $this->getCadphartOrCreate();
    try{
    $this->updateCadphartFromRequest();
    }
    catch(Exception $ex){}
	$grid2=Herramientas::CargarDatosGrid($this,$this->obj);
    $this->labels = $this->getLabels();

 	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }

    return sfView::SUCCESS;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCadphartFromRequest()
  {
    $cadphart = $this->getRequestParameter('cadphart');
    $this->setVars();


    if (isset($cadphart['dphart']))
    {
      $this->cadphart->setDphart($cadphart['dphart']);
    }
    if (isset($cadphart['fecdph']))
    {
      if ($cadphart['fecdph'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cadphart['fecdph']))
          {
            $value = $dateFormat->format($cadphart['fecdph'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cadphart['fecdph'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cadphart->setFecdph($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cadphart->setFecdph(null);
      }
    }
    if (isset($cadphart['codalm']))
    {
      $this->cadphart->setCodalm($cadphart['codalm']);
    }
    if (isset($cadphart['nomalm']))
    {
      $this->cadphart->setNomalm($cadphart['nomalm']);
    }
    if (isset($cadphart['reqart']))
    {
      $this->cadphart->setReqart($cadphart['reqart']);
    }
    if (isset($cadphart['desreq']))
    {
      $this->cadphart->setDesreq($cadphart['desreq']);
    }
    if (isset($cadphart['fecreq']))
    {
      $this->cadphart->setFecreq($cadphart['fecreq']);
    }
    if (isset($cadphart['desdph']))
    {
      $this->cadphart->setDesdph($cadphart['desdph']);
    }
    if (isset($cadphart['codori']))
    {
      $this->cadphart->setCodori($cadphart['codori']);
    }
    if (isset($cadphart['nomcat']))
    {
      $this->cadphart->setDescat($cadphart['nomcat']);
    }
    if (isset($cadphart['mondph']))
    {
      $this->cadphart->setMondph($cadphart['mondph']);
    }

      $this->cadphart->setStadph('A');

    if (isset($cadphart['dphart']))
    {
      $this->cadphart->setNumcom('D'.(substr($cadphart['dphart'],1,strlen($cadphart['dphart']))));
    }
    if (isset($cadphart['dphart']))
    {
      $this->cadphart->setRefpag($cadphart['dphart']);
    }
    if (isset($cadphart['tipdph']))
    {
      $this->cadphart->setTipdph($cadphart['tipdph']);
    }
    if (isset($cadphart['codcli']))
    {
      $this->cadphart->setCodcli($cadphart['codcli']);
    }
    if (isset($cadphart['obsdph']))
    {
      $this->cadphart->setObsdph($cadphart['obsdph']);
    }
    if (isset($cadphart['fordesp']))
    {
      $this->cadphart->setFordesp($cadphart['fordesp']);
    }
    if (isset($cadphart['reapor']))
    {
      $this->cadphart->setReapor($cadphart['reapor']);
    }
    if (isset($cadphart['fecanu']))
    {
      if ($cadphart['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cadphart['fecanu']))
          {
            $value = $dateFormat->format($cadphart['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cadphart['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cadphart->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cadphart->setFecanu(null);
      }
    }
        if (isset($cadphart['codubi']))
    {
      $this->cadphart->setCodubi($cadphart['codubi']);
    }
    if (isset($cadphart['nomubi']))
    {
      $this->cadphart->setNomubi($cadphart['nomubi']);
    }
    if (isset($cadphart['codcen']))
    {
      $this->cadphart->setCodcen($cadphart['codcen']);
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
  protected function saveCadphart($cadphart)
  {
    if ($cadphart->getId())
    {
      $cadphart->save();

    }
    else //nuevo
    {
  	  $grid2=Herramientas::CargarDatosGrid($this,$this->obj);
	  Despachos::salvarAlmdesp($cadphart,$grid2);
    }
    return -1;
  }

  protected function deleteCadphart($cadphart)
   {
    Despachos::eliminarAlmdesp($cadphart);
   }

  protected function getCadphartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cadphart = new Cadphart();
      $this->configGrid($this->getRequestParameter('cadphart[reqart]'));
    }
    else
    {
      $cadphart = CadphartPeer::retrieveByPk($this->getRequestParameter($id));
	  $this->configGridConsulta($cadphart->getDphart());
      $this->forward404Unless($cadphart);

    }

    return $cadphart;
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
	  $c = new Criteria();
      $c->add(CaartreqPeer::REQART,$codigo);
      $this->sql = "Caartreq.canrec < Caartreq.canreq ";
      $c->add(CaartreqPeer::CANREQ, $this->sql, Criteria::CUSTOM);
      $c->addAscendingOrderByColumn(CaartreqPeer::CODART);

      $per = CaartreqPeer::doSelect($c);

      //si no existen datos quiere decir que no hay articulos pendientes por despachar, la requisición ha sido despachada en su totalidad
      if ($codigo!="" && !$per)
      {
         $this->mensaje="La requisición ". $codigo ." ya ha sido despachada en su totalidad !!";
      }

        $this->setVars();
	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
        $opciones->setEliminar(false);
        $opciones->setTabla('Caartreq');
        $opciones->setAnchoGrid(1800);
        $opciones->setAncho(1800);
        $opciones->setTitulo('Detalle del Despacho');
        $opciones->setName('b');
        $opciones->setFilas(0);
        $opciones->setHTMLTotalFilas(' ');

        // Se generan las columnas
        $col1 = new Columna('Código del Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codart');
        $col1->setHTML('type="text" size="15" readonly=true');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30x1" readonly=true');

        $col3 = new Columna('Cant. Desp');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setNombreCampo('candes');
        $col3->setEsNumerico(true);
        $col3->setHTML('type="text" size="8"');
        $col3->setJScript('onKeypress="if (event.keyCode==13 || event.keyCode==9) cantdespachada(event,this.id)"');

        $col4 = clone $col3;
        $col4->setTitulo('Cant. No Desp');
       	$col4->setNombreCampo('cannodes');
        $col4->setHTML('type="text" size="8" readonly=true');
        $col4->setJScript('');

        $col5 = clone $col3;
        $col5->setTitulo('Costo');
        $col5->setNombreCampo('montotdes');
        $col5->setHTML('type="text" size="8" readonly=true');
        $col5->setJScript('');
        $col5->setEsTotal(true,'cadphart_mondph');

        $col6 = clone $col1;
        $col6->setTitulo('Cód. Unidad');
        $col6->setNombreCampo('codcat');
        $col6->setHTML('type="text" size="8" readonly=true');

        $col7 = clone $col2;
        $col7->setTipo(Columna::TEXTO);
        $col7->setTitulo('U. Medida');
        $col7->setNombreCampo('unimed');
        $col7->setHTML('type="text" size="10" readonly=true');

        $col8 = new Columna('Cod. Motivo');
        $col8->setTipo(Columna::TEXTO);
        $col8->setEsGrabable(true);
        $col8->setAlineacionObjeto(Columna::CENTRO);
        $col8->setAlineacionContenido(Columna::CENTRO);
        $col8->setNombreCampo('codfal');
        $col8->setCatalogo('camotfal','sf_admin_edit_form', array('codfal'=> 8, 'desfal'=> 9));
        $col8->setAjax('almdesp',4,9);
        $col8->setHTML('type="text" size="5"');

        $col9 = clone $col2;
        $col9->setTitulo('Descripción');
        $col9->setNombreCampo('descrifal');
        $col9->setHTML('type="text" size="10x1" readonly=true');

        $col10 = new Columna('Costo Por articulo');
        $col10->setTipo(Columna::MONTO);
        $col10->setNombreCampo('cospro');
        $col10->setEsNumerico(true);
        $col10->setOculta(true);

        $col11 = clone $col10;
        $col11->setTitulo('cantreq');
        $col11->setNombreCampo('canreq');

        $col12 = clone $col10;
        $col12->setTitulo('candesp');
        $col12->setNombreCampo('candesreal');

	    $objalm= array ('codalm' => '13','nomalm' =>'14');
		$col13 = new Columna('Codigo del Almacen');
	    $col13->setTipo(Columna::TEXTO);
	    $col13->setAlineacionObjeto(Columna::CENTRO);
	    $col13->setAlineacionContenido(Columna::CENTRO);
	    $col13->setEsGrabable(true);
	    $col13->setNombreCampo('codalm');
	    $col13->setHTML('type="text" size="8" maxlength="6"');
	    $col13->setCatalogo('Cadefalm','sf_admin_edit_form',$objalm,'Cadelfalm_Almordrec');
	    $signo="-";
    	$signomas="+";
	    $col13->setJScript('onBlur="toAjax(1,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,12,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');


	    $col14 = new Columna('Nombre Almacén');
		$col14->setTipo(Columna::TEXTAREA);
		$col14->setEsGrabable(true);
		$col14->setNombreCampo('nomalm');
		$col14->setAlineacionObjeto(Columna::CENTRO);
		$col14->setAlineacionContenido(Columna::CENTRO);
	    $col14->setHTML('type="text" size="15x1" readonly=true');

	    $objubi= array ('codubi' => '15','nomubi' =>'16');
	    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
	    $col15 = new Columna('Codigo de Ubicacion');
	    $col15->setTipo(Columna::TEXTO);
	    $col15->setAlineacionObjeto(Columna::CENTRO);
	    $col15->setAlineacionContenido(Columna::CENTRO);
	    $col15->setEsGrabable(true);
	    $col15->setNombreCampo('codubi');
	    $signo="-";
		$signomas="+";
	    $col15->setHTML('type="text" size="8" maxlength="'.chr(39).$this->lonubialm.chr(39).'"');
	    $col15->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);
	    $col15->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaraubicacionalm.chr(39).')"  onBlur="toAjax(6,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,14,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');

        $col16 = new Columna('Nombre Ubicación');
   	    $col16->setTipo(Columna::TEXTAREA);
		$col16->setEsGrabable(true);
		$col16->setNombreCampo('nomubi');
		$col16->setAlineacionObjeto(Columna::CENTRO);
		$col16->setAlineacionContenido(Columna::CENTRO);
	    $col16->setHTML('type="text" size="8x1" readonly=true');



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
	    // se genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per);
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
     ////////////////////////////////////
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
	$cajtexcom=$name."_".$fil."_13";
	$cajcodubi=$name."_".$fil."_15";
	$cajnomubi=$name."_".$fil."_16";
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

  	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
		else  if ($this->getRequestParameter('ajax')=='3')
	    {
	  	    $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   			return sfView::HEADER_ONLY;
	    }
	    else  if ($this->getRequestParameter('ajax')=='4')
	    {
	  		$dato=CamotfalPeer::getMotivo($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   			return sfView::HEADER_ONLY;
	    }
		else  if ($this->getRequestParameter('ajax')=='5')
	    {
	  	    $msg="";
            $codart=$this->getRequestParameter('codart');
            $codalm=$this->getRequestParameter('codalm');
	  		$codubi=$this->getRequestParameter('codubi');
	  		$cantd=$this->getRequestParameter('candes');
	  		$dato="";
	  	    if ($cantd>0)
			{
	            if (Despachos::verificaexisydisp($codart,$codalm,$codubi,$cantd,&$msg))
	            {
	                   $dato="S";
	            }
	            else
	            {
	                   $dato="N";
	                   $msg=$msg.". Coloque la cantidad a despachar disponible o en cero (0) a este articulo si desea continuar con el despacho del resto de los articulos...";
	            }
			}

            $output = '[["verificaexisydisp","'.$dato.'",""],["mensaje","'.$msg.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   			return sfView::HEADER_ONLY;
	    }
		else  if ($this->getRequestParameter('ajax')=='6')//Ubicación
	    {
  	    $datos=split('!',$this->getRequestParameter('codigo'));
	   	$codubi=$datos[0];
	  	$codalm=$datos[1];
	  	$codart=$datos[2];
	  	$cajtexmos=$datos[3];
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
			$cajcodubi=$name."_".$fil."_15";
			$cajnomubi=$name."_".$fil."_16";
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
  		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  		return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='7')
      {
        $q= new Criteria();
        $q->add(CadefcenPeer::CODCEN,$this->getRequestParameter('codigo'));
        $reg= CadefcenPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDescen(); $javascript=""; 
        }else {
            $dato="";
            $javascript="alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }


	}

  public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',$this->getRequestParameter('cadphart[codalm]'));
	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$this->tags=Herramientas::autocompleteAjax('REQART','Careqart','Reqart',$this->getRequestParameter('cadphart[reqart]'));
	    }
	    else  if ($this->getRequestParameter('ajax')=='3')
	    {
	    	$this->tags=Herramientas::autocompleteAjax('CODCAT','Npcatpre','Codcat',trim($this->getRequestParameter('cadphart[codori]')));
	    }
	}

  public function executeGrid()
	{
		 $cajtexmos=$this->getRequestParameter('cajtexmos');
	     $cajtexcom=$this->getRequestParameter('cajtexcom');
	     $this->mensaje="";
	     if ($this->getRequestParameter('codigo')!="")
	     {
  		  if ($this->getRequestParameter('ajax')=='2')
			{
	            $codigo=str_pad($this->getRequestParameter('codigo'), 8 , '0','STR_PAD_LEFT');
	            $c = new Criteria();
	      		$c->add(CareqartPeer::REQART,$codigo);
	      		$datos = CareqartPeer::doSelectOne($c);
	      		if ($datos)
	      		{
		      		$desreq=$datos->getDesreq();
			  	    $uniori=$datos->getCodcatreq();
			  	    $desuniori=BnubibiePeer::getDesubicacion($uniori);
                                    $codcen=$datos->getCodcen();
                                    $descen=H::getX_vacio('CODCEN', 'Cadefcen', 'Descen', $codcen);
		            $output = '[["'.$cajtexmos.'","'.$desreq.'",""],["cadphart_codori","'.$uniori.'",""],["cadphart_nomcat","'.$desuniori.'",""],["cadphart_codcen","'.$codcen.'",""],["cadphart_descen","'.$descen.'",""],["'.$cajtexcom.'","8","c"]]';
		         	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		            ////
		            $this->configGrid($codigo);
	      		}
	      		else
	      		{//no existe la requisicion
	               $this->configGrid();
	               $this->mensaje="El código de la requisición no existe.";
	      		}
			}
	    }//if ($this->getRequestParameter('codigo')!="")
	    else
	       $this->configGrid();
	}

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConsulta($codigo=' ')
	 {
       //////////////////////
       //GRID
	   $c = new Criteria();
	   $c->add(CaartdphPeer::DPHART,$codigo);
	   $per = CaartdphPeer::doSelect($c);

        // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
        $opciones->setEliminar(false);
        $opciones->setTabla('Caartdph');
        $opciones->setAnchoGrid(1450);
        $opciones->setAncho(1450);
        $opciones->setFilas(0);
        $opciones->setName('b');
        $opciones->setTitulo('Detalle del Despacho');
        $opciones->setHTMLTotalFilas(' ');
        // Se generan las columnas
        $col1 = new Columna('Código del Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codart');
        $col1->setHTML('type="text" size="15" readonly=true');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30x1" readonly=true');

        $col3 = new Columna('Cant. Desp');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setNombreCampo('candph');
        $col3->setEsNumerico(true);
        $col3->setHTML('type="text" size="8" readonly=true');

        $col4 = clone $col3;
        $col4->setTitulo('Cant. No Desp');
        $col4->setNombreCampo('candev');
        $col4->setHTML('type="text" size="8" readonly=true');

        $col5 = clone $col3;
        $col5->setTitulo('Costo');
        $col5->setNombreCampo('montot');
        $col5->setHTML('type="text" size="8" readonly=true');

        $col6 = clone $col1;
        $col6->setTitulo('Cód. Unidad');
        $col6->setNombreCampo('codcat');

        $col7 = clone $col2;
        $col7->setTitulo('U. Medida');
        $col7->setNombreCampo('unimed');
        $col7->setHTML('type="text" size="10x1" readonly=true');


        $col8 = new Columna('Cod. Motivo');
        $col8->setTipo(Columna::TEXTO);
        $col8->setEsGrabable(true);
        $col8->setAlineacionObjeto(Columna::CENTRO);
        $col8->setAlineacionContenido(Columna::CENTRO);
        $col8->setNombreCampo('codfal');
        $col8->setHTML('type="text" size="5" readonly=true');

        $col9 = clone $col2;
        $col9->setTitulo('Descripción');
        $col9->setNombreCampo('desfal');
        $col9->setHTML('type="text" size="10x1" readonly=true');

		$col10 = new Columna('Codigo del Almacen');
	    $col10->setTipo(Columna::TEXTO);
	    $col10->setAlineacionObjeto(Columna::CENTRO);
	    $col10->setAlineacionContenido(Columna::CENTRO);
	    $col10->setEsGrabable(true);
	    $col10->setNombreCampo('codalm');
	    $col10->setHTML('type="text" size="8" maxlength="6"  readonly=true');


	    $col11 = new Columna('Nombre Almacén');
		$col11->setTipo(Columna::TEXTAREA);
		$col11->setEsGrabable(true);
		$col11->setNombreCampo('nomalm');
		$col11->setAlineacionObjeto(Columna::CENTRO);
		$col11->setAlineacionContenido(Columna::CENTRO);
	    $col11->setHTML('type="text" size="15x1" readonly=true');

	    $col12 = new Columna('Codigo de Ubicacion');
	    $col12->setTipo(Columna::TEXTO);
	    $col12->setAlineacionObjeto(Columna::CENTRO);
	    $col12->setAlineacionContenido(Columna::CENTRO);
	    $col12->setEsGrabable(true);
	    $col12->setNombreCampo('codubi');
	  	$col12->setHTML('type="text" size="8"   readonly=true');

        $col13 = new Columna('Nombre Ubicación');
   	    $col13->setTipo(Columna::TEXTAREA);
		$col13->setEsGrabable(true);
		$col13->setNombreCampo('nomubi');
		$col13->setAlineacionObjeto(Columna::CENTRO);
		$col13->setAlineacionContenido(Columna::CENTRO);
	    $col13->setHTML('type="text" size="8x1" readonly=true');


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



	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per);
	}

  public function setVars()
  {
	$this->mascaraarticulo = Herramientas::ObtenerFormato('Cadefart','Forart');
	$this->mascarapartida = Herramientas::getMascaraPartida();
	$this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi= Herramientas::ObtenerFormato('Bndefins','lonubi');
    $this->mascaraubicacionalm = Herramientas::ObtenerFormato('Cadefart','Forubi');
    $this->lonubialm=strlen($this->mascaraubicacionalm);
    $this->dphdesh="";
    $this->mansolocor="";
    $this->bloqfec="";
    $this->oculeli="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almdesp',$varemp['aplicacion']['compras']['modulos'])){
               if(array_key_exists('dphdesh',$varemp['aplicacion']['compras']['modulos']['almdesp']))
	       {
	       	$this->dphdesh=$varemp['aplicacion']['compras']['modulos']['almdesp']['dphdesh'];
	       }
	       if(array_key_exists('mansolocor',$varemp['aplicacion']['compras']['modulos']['almdesp']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['compras']['modulos']['almdesp']['mansolocor'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['compras']['modulos']['almdesp']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['compras']['modulos']['almdesp']['bloqfec'];
	       }
	       if(array_key_exists('oculeli',$varemp['aplicacion']['compras']['modulos']['almdesp']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['compras']['modulos']['almdesp']['oculeli'];
	       }
	     }

  }


}
