<?php

/**
 * fadesp actions.
 *
 * @package    siga
 * @subpackage fadesp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fadespActions extends autofadespActions
{

private $coderror =-1;


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
	         $valor4 = $cadphart['mondph'];
	         $campo4='mondph';
	    	 $resp=Herramientas::ValidarCodigo($valor,$this->cadphart,$campo);
	    	 if ($valor1!="") $resp1=Herramientas::ValidarCodigo($valor1,$this->cadphart,$campo1,'F');
	    	 $resp2=Herramientas::ValidarCodigo($valor2,$this->cadphart,$campo2);
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
	        else if($resp4!=-1){
		        $this->coderror = $resp4;
		        return false;
		      }
            else return true;
		 }
		 else//un nuevo despacho
		 {
		 	$cadphart = $this->getRequestParameter('cadphart');


		   $grid=Herramientas::CargarDatosGrid($this,$this->obj);
	       if ($this->ValidarDatosVaciosenGrid($grid,&$error))
	           {
	              $this->coderror=$error;
	              return false;
	           }
	       else{
	       	  $cantconcero = 0;
		      $x=$grid[0];
		      $this->numreg=count($grid[0]);
			  $j=0;
		      while ($j<count($x))
		      {
			       if ( $x[$j]->getCodart()!="")
			       {
			        $c= new Criteria();
			        $c->add(CaartalmPeer::CODALM,$x[$j]->getCodalm());
			        $c->add(CaartalmPeer::CODART,$x[$j]->getCodart());
			        $reg= CaartalmPeer::doSelectOne($c);
			        if (!$reg){
			            $this->coderror=1120;
			            return false;
			        }

			        $c= new Criteria();
			        $c->add(CaartalmubiPeer::CODALM,$x[$j]->getCodalm());
			        $c->add(CaartalmubiPeer::CODUBI,$x[$j]->getCodubi());
			        $c->add(CaartalmubiPeer::CODART,$x[$j]->getCodart());
			        $reg= CaartalmubiPeer::doSelectOne($c);
					if ($reg){
						if ($x[$j]->getCandesp() > 0){
							if ($x[$j]->getCandesp() > $reg->getExiact()){
					            $this->coderror=1119;
					            return false;
							}
							else{
								$totent = Facturacion::BuscarTotalEntregado($x[$j]->getCodart(), $this->getRequestParameter('cadphart[tipref]'), $this->getRequestParameter('cadphart[reqart]'));
					        	if ((number_format($x[$j]->getCandesp()) - number_format($totent)) == 0){
						            $this->coderror=1121;
						            return false;
					        	}
					        	else if (number_format($x[$j]->getCandesp()) > (number_format($x[$j]->getCansol()) - number_format($totent))){
						            $this->coderror=1122;
						            return false;
					        	}
							}
						}
						else{
							$cantconcero = $cantconcero + 1;
						}
					}
					else{
			            $this->coderror=1125;
			            return false;
					}
			       }
			       $j++;
		      }
		      if (count($x) == $cantconcero){
	            $this->coderror=1134;
	            return false;
		      }

	       }
	      return true;


		 }

    }else return true;

  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }
      if ($codcatvacio)
        return true;
      else
        return false;
  }

  public function executeEdit()
  {
    $this->cadphart = $this->getCadphartOrCreate();
    $this->setVars();
    //$this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadphartFromRequest();

       if($this->saveCadphart($this->cadphart)==-1){
          $this->setFlash('notice', 'Your modifications have been saved');
 		  $this->cadphart->setId(Herramientas::getX_vacio('dphart','cadphart','id',$this->cadphart->getDphart()));

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('fadesp/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('fadesp/list');
	      }
	      else
	      {
	        return $this->redirect('fadesp/edit?id='.$this->cadphart->getId());
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
    if (isset($cadphart['tipref']))
    {
      $this->cadphart->setTipref($cadphart['tipref']);
    }
  }

  protected function saveCadphart($cadphart)
  {
    if ($cadphart->getId())
    {
      $cadphart->save();

    }
    else //nuevo
    {
  	  $grid2=Herramientas::CargarDatosGrid($this,$this->obj);
	  Despachos::salvarFadesp($cadphart,$grid2);
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
      $this->configGridDetalle('',$this->getRequestParameter('cadphart[reqart]'),$this->getRequestParameter('cadphart[tipref]'));

    }
    else
    {
      $cadphart = CadphartPeer::retrieveByPk($this->getRequestParameter($id));
	  $this->configGridConsulta($cadphart->getDphart());
      $this->forward404Unless($cadphart);

    }

    return $cadphart;
  }

   public function configGrid(){
		$this->configGridDetalle($this->getRequestParameter('cadphart[dphart]'),$this->getRequestParameter('cadphart[reqart]'),$this->getRequestParameter('cadphart[tipref]'));
   }

  public function configGridDetalle($nrodph = '', $codigo='', $tipref='')
	{

		if ($nrodph != ''){
			$c= new Criteria();
			$c->add(CaartdphPeer::DPHART,$nrodph);
			$per= CaartdphPeer::doSelect($c);
		}
		else{
		  if ($tipref == 'F'){
		      $c = new Criteria();
		      $c->add(FaartfacPeer::REFFAC,$codigo);
		      //$this->sql = "Faartfac.candes < Faartfac.cantot ";
		      //$c->add(FaartfacPeer::CANTOT, $this->sql, Criteria::CUSTOM);
		      $per = FaartfacPeer::doSelect($c);
		  }
		  else if ($tipref == 'P'){
		      $c = new Criteria();
		      $c->add(FaartpedPeer::NROPED,$codigo);
		      $per = FaartpedPeer::doSelect($c);
		  }
		  else{
		  	  $per = Array();
		  }
		}

	    if ($tipref == 'F'){
	        if (Despachos::BuscarTotalEntregado($codigo) == 1)
	        {
	         $this->mensaje="La factura ". $codigo ." ya ha sido despachada en su totalidad !!";
	        }
	    }

	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
        $opciones->setEliminar(false);
        if ($tipref == 'F'){
        	$opciones->setTabla('Faartfac');
        }
        else if ($tipref == 'P'){
        	$opciones->setTabla('Faartped');
        }
        $opciones->setAnchoGrid(1500);
        $opciones->setAncho(1500);
        $opciones->setTitulo('Detalle del Despacho');
        //$opciones->setName('b');
        $opciones->setFilas(30);
        $opciones->setHTMLTotalFilas(' ');

	    $objalm= array ('codalm' => '1','nomalm' =>'2');
		$col1 = new Columna('Cod. Almacén');
	    $col1->setTipo(Columna::TEXTO);
	    $col1->setAlineacionObjeto(Columna::CENTRO);
	    $col1->setAlineacionContenido(Columna::CENTRO);
	    $col1->setEsGrabable(true);
	    $col1->setNombreCampo('codalm');
	    if ($nrodph != '')
	    {
	        $col1->setHTML('type="text" size="8" maxlength="6" readonly=true');
	    }
	    else
	    {
		    $col1->setHTML('type="text" size="8" maxlength="6"');
		    $col1->setCatalogo('Cadefalm','sf_admin_edit_form',$objalm,'Cadelfalm_Almordrec');
	        $signo="-";
	    	$signomas="+";
		    $col1->setJScript('onBlur="toAjax(1,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,4,'.chr(39).$signomas.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,4,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
	    }

	    $col2 = new Columna('Nombre Almacén');
		$col2->setTipo(Columna::TEXTAREA);
		$col2->setEsGrabable(true);
		$col2->setNombreCampo('nomalm');
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
	    $col2->setHTML('type="text" size="15x1" readonly=true');

	    $objubi= array ('codubi' => '3','nomubi' =>'4');
	    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
	    $col3 = new Columna('Cod. Ubicación');
	    $col3->setTipo(Columna::TEXTO);
	    $col3->setAlineacionObjeto(Columna::CENTRO);
	    $col3->setAlineacionContenido(Columna::CENTRO);
	    $col3->setEsGrabable(true);
	    $col3->setNombreCampo('codubi');
	    if ($nrodph != '')
	    {
		    $col3->setHTML('type="text" size="8" readonly=true');
	    }
	    else
	    {   $signo="-";
	    	$signomas="+";
		    $col3->setHTML('type="text" size="8" maxlength="'.chr(39).$this->lonubialm.chr(39).'"');
		    $col3->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);
		    $col3->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaraubicacionalm.chr(39).')"  onBlur="toAjax(5,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signomas.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,2,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
	    }

	    $col4 = new Columna('Nombre Ubicación');
		$col4->setTipo(Columna::TEXTAREA);
		$col4->setEsGrabable(true);
		$col4->setNombreCampo('nomubi');
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
	    $col4->setHTML('type="text" size="8x1" readonly=true');

        // Se generan las columnas
        $col5 = new Columna('Cod. Artículo');
        $col5->setTipo(Columna::TEXTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionObjeto(Columna::CENTRO);
        $col5->setAlineacionContenido(Columna::CENTRO);
        $col5->setNombreCampo('codart');
        $col5->setHTML('type="text" size="10" readonly=true');

        $col6 = new Columna('Descripción');
        $col6->setTipo(Columna::TEXTAREA);
        $col6->setAlineacionObjeto(Columna::IZQUIERDA);
        $col6->setAlineacionContenido(Columna::IZQUIERDA);
        $col6->setNombreCampo('desart');
        $col6->setHTML('type="text" size="30x1" readonly=true');

        $col7 = new Columna('Cant. Despachar');
        $col7->setTipo(Columna::MONTO);
        $col7->setEsGrabable(true);
        $col7->setAlineacionContenido(Columna::IZQUIERDA);
        $col7->setAlineacionObjeto(Columna::IZQUIERDA);
        $col7->setNombreCampo('candesp');
        $col7->setEsNumerico(true);
        $col7->setHTML('type="text" size="10"');
        $col7->setJScript('onBlur="Cantidad(this.id)"');

        $col8 = clone $col7;
        $col8->setTitulo('Cant. No Despachada');
		$col8->setNombreCampo('cannodes');
        $col8->setHTML('type="text" size="10" readonly=true');
        $col8->setJScript('');

        $col9 = new Columna('Costo Por articulo');
        $col9->setTipo(Columna::MONTO);
        $col9->setNombreCampo('preart');
        $col9->setEsNumerico(true);
        $col9->setHTML('type="text" size="10" readonly=true');

        $col10 = clone $col7;
        $col10->setTitulo('Costo Total');
        $col10->setNombreCampo('montotdes');
        $col10->setHTML('type="text" size="10" readonly=true');
        $col10->setJScript('');
        $col10->setEsTotal(true,'cadphart_mondph');

        $col11 = clone $col7;
        $col11->setTitulo('Cant. No Despachada');
		$col11->setNombreCampo('cannodesaux');
        $col11->setHTML('type="text" size="10" readonly=true');
        $col11->setOculta(true);

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

	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per);


	}

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
		  	if ($codart!="")
		  	{
		  		$aux = split('_',$cajtexmos);
				$name=$aux[0];
				$fil=$aux[1];
				$cajtexcom=$name."_".$fil."_6";
				$cajcodalm=$name."_".$fil."_1";
				$cajnomalm=$name."_".$fil."_2";
				$cajcodubi=$name."_".$fil."_3";
				$cajnomubi=$name."_".$fil."_4";
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
		             	$output = '[["'.$cajtexcom.'","6","c"],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""]]';
		           }
		           else//el almacen seleccionado no existe para el articulo introducido por el usuario
		           {
			    	$javascript="alert('El artículo : ".$codart.", no existe en el Almacén seleccionado: ".$codalm." ');$('".$cajtexmos."').focus()";
			    	$output = '[["'.$cajcodalm.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["javascript","'.$javascript.'",""]]';
		           }

			     }
			    else
			    {
			    	$nomalm="";
			    	$javascript="alert('Código del Almacén no existe...')";
			    	$output = '[["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["javascript","'.$javascript.'",""]]';
			    }// if ($datos)

		  	}

	    }
		else  if ($this->getRequestParameter('ajax')=='3')
	    {
	  	    $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else  if ($this->getRequestParameter('ajax')=='4')
	    {
	  		$dato=CamotfalPeer::getMotivo($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
	    }
	  else if ($this->getRequestParameter('ajax')=='5')
		{
		      	//$javascript="alert('".$this->getRequestParameter('codigo')."');";
	  			//$output = '[["javascript","'.$javascript.'",""]]';

		  	$datos=split('!',$this->getRequestParameter('codigo'));
		   	$codubi=$datos[0];
		  	$codalm=$datos[1];
		  	$codart=$datos[2];
		  	$cajtexmos=$datos[3];
		  	$output = '[["","",""]]';
		  	if ($codart!="")
		  	{
		  		$aux = split('_',$cajtexmos);
				$name=$aux[0];
				$fil=$aux[1];
				$cajcodubi=$name."_".$fil."_3";
				$cajnomubi=$name."_".$fil."_4";
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
	                  $javascript="alert('La ubicación : ".$codubi.", no existe para el almacén seleccionado: ".$codalm." y el artículo ".$codart." ')";
	                  $dato="";
	                  $codubi="";
	              }
	            $output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
		      }
		      else
		      {
		      	$javascript="alert('Primero debe seleccionar un Almacén...');";
		      	$dato="";
		      	$codubi="";
	  			$output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
		      }

		  	}

	  		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	        return sfView::HEADER_ONLY;
	   }

	    /*
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
	                   $msg=$msg.". Coloque cantidad desp. en cero (0) a este articulo si desea continuar con el despacho del resto de los articulos...";
	            }
			}

            $output = '[["verificaexisydisp","'.$dato.'",""],["mensaje","'.$msg.'",""]]';
	    }
		else  if ($this->getRequestParameter('ajax')=='6')//Ubicación
	    {
	  		 $existe="";
	  		 $codalm=$this->getRequestParameter('codalm');
	  		 $codubi=$this->getRequestParameter('codigo');
	  		 if (Compras::verificarexistenciaubialm($codalm,$codubi))
              {
                  $existe="S";
                  $dato=CadefubiPeer::getDesubicacion($codubi);
              }
                else
              {
                  $existe="N";
                  $dato="";
              }
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["existeubicacion","'.$existe.'",""]]';
	    }
	    */
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
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
	     $tipref=$this->getRequestParameter('tipref');
	     $this->mensaje="";
	    if ($this->getRequestParameter('codigo')!="")
	    {
			if ($this->getRequestParameter('ajax')=='2')
			{
				if ($tipref == 'P'){

					$codigo=str_pad($this->getRequestParameter('codigo'), 8 , '0','STR_PAD_LEFT');
					$this->configGridDetalle('',$codigo, $tipref);

		            $c = new Criteria();
		      		$c->add(FapedidoPeer::NROPED,$codigo);
		      		$datos = FapedidoPeer::doSelectOne($c);
		      		if ($datos){
						if ($datos->getStatus() == 'N'){
			               $this->configGrid();
			               $this->mensaje="El Pedido se encuentra Anulado.";
						}
						else{
							$codcli = $datos->getCodcli();
				  			$c2 = new Criteria();
				  			$c2->add(FaclientePeer::CODPRO, $codcli);
				  			$reg2 = FaclientePeer::doSelectOne($c);
				  			if ($reg2){
								$rifpro = $reg2->getRifpro();
								$nompro = $reg2->getNompro();
								$dirpro = $reg2->getDirpro();
								$telpro = $reg2->getTelpro();

				  			}

				            $output = '[["cadphart_codcli","'.$codcli.'",""],["cadphart_rifpro","'.$rifpro.'",""],["cadphart_nompro","'.$nompro.'",""],["cadphart_dirpro","'.$dirpro.'",""],["cadphart_telpro","'.$telpro.'",""],["'.$cajtexmos.'","",""],["cadphart_codori","",""],["cadphart_nomcat","",""],["'.$cajtexcom.'","8","c"]]';
				         	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
						}
		      		}
					else {
		               $this->configGrid();
		               $this->mensaje="El Número de Pedido no existe.";
					}
				}
				else if ($tipref == 'F'){
		            $output = '[["'.$cajtexmos.'","",""],["cadphart_codori","",""],["cadphart_nomcat","",""],["'.$cajtexcom.'","8","c"]]';
		         	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

					$codigo=str_pad($this->getRequestParameter('codigo'), 8 , '0','STR_PAD_LEFT');
					$this->configGridDetalle('',$codigo, $tipref);

		            $c = new Criteria();
		      		$c->add(FafacturPeer::REFFAC,$codigo);
		      		$datos = FafacturPeer::doSelectOne($c);
					if ($datos){
						if ($datos->getStatus() == 'N'){
			               $this->configGrid();
			               $this->mensaje="La Factura se encuentra Anulada.";
						}
					}
					else{
		               $this->configGrid();
		               $this->mensaje="El Número de Factura no existe.";
					}
				}

			}
	    }//if ($this->getRequestParameter('codigo')!="")
	    else
	       $this->configGrid();
	}

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
        $opciones->setAnchoGrid(1500);
        $opciones->setAncho(1500);
        $opciones->setFilas(0);
        $opciones->setName('b');
        $opciones->setTitulo('Detalle del Despacho');
        $opciones->setHTMLTotalFilas(' ');

		$col1 = new Columna('Cod. Almacén');
	    $col1->setTipo(Columna::TEXTO);
	    $col1->setAlineacionObjeto(Columna::CENTRO);
	    $col1->setAlineacionContenido(Columna::CENTRO);
	    $col1->setEsGrabable(true);
	    $col1->setNombreCampo('codalm');
        $col1->setHTML('type="text" size="8" maxlength="6" readonly=true');

	    $col2 = new Columna('Nombre Almacén');
		$col2->setTipo(Columna::TEXTAREA);
		$col2->setEsGrabable(true);
		$col2->setNombreCampo('nomalm');
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
	    $col2->setHTML('type="text" size="15x1" readonly=true');

	    $col3 = new Columna('Cod. Ubicación');
	    $col3->setTipo(Columna::TEXTO);
	    $col3->setAlineacionObjeto(Columna::CENTRO);
	    $col3->setAlineacionContenido(Columna::CENTRO);
	    $col3->setEsGrabable(true);
	    $col3->setNombreCampo('codubi');
	    $col3->setHTML('type="text" size="8" readonly=true');

	    $col4 = new Columna('Nombre Ubicación');
		$col4->setTipo(Columna::TEXTAREA);
		$col4->setEsGrabable(true);
		$col4->setNombreCampo('nomubi');
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
	    $col4->setHTML('type="text" size="8x1" readonly=true');

        $col5 = new Columna('Código del Artículo');
        $col5->setTipo(Columna::TEXTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionObjeto(Columna::CENTRO);
        $col5->setAlineacionContenido(Columna::CENTRO);
        $col5->setNombreCampo('codart');
        $col5->setHTML('type="text" size="20" readonly=true');

        $col6 = new Columna('Descripción');
        $col6->setTipo(Columna::TEXTO);
        $col6->setAlineacionObjeto(Columna::IZQUIERDA);
        $col6->setAlineacionContenido(Columna::IZQUIERDA);
        $col6->setNombreCampo('desart');
        $col6->setHTML('type="text" size="30" disabled=true');

        $col7 = new Columna('Cant. Desp');
        $col7->setTipo(Columna::MONTO);
        $col7->setEsGrabable(true);
        $col7->setAlineacionContenido(Columna::IZQUIERDA);
        $col7->setAlineacionObjeto(Columna::IZQUIERDA);
        $col7->setNombreCampo('candph');
        $col7->setEsNumerico(true);
        $col7->setHTML('type="text" size="10" readonly=true');

        $col8 = clone $col7;
        $col8->setTitulo('Cant. No Desp');
        $col8->setNombreCampo('candev');

		$col9 = clone $col7;
        $col9 = new Columna('Costo Por articulo');
        $col9->setNombreCampo('preart');

        $col10 = clone $col7;
        $col10->setTitulo('Costo Total');
        $col10->setNombreCampo('montotdes');


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
    $this->numreg=0;
  }

}
