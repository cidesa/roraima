<?php

/**
 * almsolegr actions.
 *
 * @package    Roraima
 * @subpackage almsolegr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almsolegrActions extends autoalmsolegrActions
{
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror3=-1;
  public  $codigo1=-1;
  public  $codigo2=-1;
  public  $codigo3=-1;
  public $codeerror=-1;
  public $razonvacia=-1;
  public $salvarrecar=-1;
  public $detallevacia=-1;
  public  $coderror=-1;
  public  $fecper=-1;
  public  $fecperfis=-1;




  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST && $this->getRequestParameter('modifi')=='S')
    {
      $this->casolart = $this->getCasolartOrCreate();
      try{ $this->updateCasolartFromRequest();}
      catch (Exception $ex){}
      $this->configGridDetalle();
      $this->configGridRecargo($this->casolart->getReqart());
      $this->configGridRazon();
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);
      $grid2 = Herramientas::CargarDatosGrid($this,$this->obj2);
      $grid3 = Herramientas::CargarDatosGrid($this,$this->obj3);
      if (!Herramientas::validarPeriodoPresuesto($this->casolart->getFecreq()))
      {
       $this->fecper=142;
       return false;
      }

      if (!Herramientas::validarPeriodoFiscal($this->casolart->getFecreq()))
      {
        $this->fecperfis=143;
        return false;
      }
      if (count($grid[0])==0)
      {
      	$this->detallevacia=128;
      	return false;
      }

		//Valida la Razon de Compra
      //if (count($grid3[0])==0)
      //{
      //	$this->razonvacia=127;
      //	return false;
      //}

    /*  if ((count($grid2[0])>0) && ($this->getUser()->getAttribute('presiono','','almsolegr'))!='S')
      {
      	$this->salvarrecar=138;
      	return false;
      }*/
      if (count($grid[0])!=0 || count($grid2[0])!=0)
      {
      SolicituddeEgresos::validarAlmsolegr($this->casolart,$grid,$grid2,$this->getRequestParameter('id'),$this->getRequestParameter('tiporecarg'),&$msj1,&$cod1,&$msj2,&$cod2,&$msj3,&$cod3);
      $this->coderror1=$msj1;
      $this->coderror2=$msj2;
      $this->coderror3=$msj3;
      $this->codigo1=$cod1;
      $this->codigo2=$cod2;
      $this->codigo3=$cod3;
      if ($this->coderror1<>-1 || $this->coderror2<>-1 || $this->coderror3<>-1)
      {
       return false;
      }else return true;
      }
    }else return true;
   }

  public function executeEdit()
    {
      $this->casolart = $this->getCasolartOrCreate();
      $this->moneda= Herramientas::cargarMoneda();
      $this->listatipo = Constantes::ListaTipoCompra();
      $this->setVars();
      $c=new Criteria();
      $c->add(CpcomproPeer::STACOM,'N',Criteria::NOT_EQUAL);
      $c->add(CpcomproPeer::REFPRC,$this->casolart->getReqart());
      $trajo= CpcomproPeer::doSelectOne($c);
      if ($trajo)
      {$this->haydespacho='S';}else {$this->haydespacho='N';}

      $c=new Criteria();
      $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
      $trajo2= CacotizaPeer::doSelect($c);
      if ($trajo2)
      {$this->cotiz='S';}else {$this->cotiz='N';}
      $sql="SELECT coalesce(SUM(CANORD),0) as CANORD FROM CAARTSOL WHERE REQART='".$this->casolart->getReqart()."'";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
      	if ($result[0]['canord']==0)
      	{$this->modifico='S';}else {$this->modifico='N';}
      }
      if ($this->modifico=='S')
      { $this->configGridDetalle(); $this->configGridRecargo($this->casolart->getReqart()); $this->configGridRazon();}
      else { $this->configGridDetalleConsulta(); $this->configGridRecargoConsulta(); $this->configGridRazonConsulta();}


      if ($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->updateCasolartFromRequest();

        if ($this->saveCasolart($this->casolart)==-1)
        {

        $this->casolart->setId(Herramientas::getX_vacio('reqart','casolart','id',$this->casolart->getReqart()));

        $this->setFlash('notice', 'Your modifications have been saved');

        $this->Bitacora('Guardo');

         $c= new Criteria();
	     $resul=CadefartPeer::doSelectOne($c);
	     if ($resul)
	     {
	       if($resul->getPrcasopre()=='S' && $resul->getPrcreqapr()!='S')
	       {

	        $totaimp=SolicituddeEgresos::totalImputacion($this->casolart->getReqart());
	        if (H::toFloat($this->casolart->getMonreq())!=$totaimp)
	        {
	        	$this->setFlash('notice', 'El Monto de la Imputaciones Generadas no es igual al de la Solicitud, Por favor verificar esta solicitud');
	        }
	       }
	     }


        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('almsolegr/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('almsolegr/list');
        }
        else
        {
          return $this->redirect('almsolegr/edit?id='.$this->casolart->getId());
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
    //    $this->getUser()->getAttributeHolder()->remove('presiono','almsolegr');
      }
    }

  public function handleErrorEdit()
    {
      $this->preExecute();
      $this->casolart = $this->getCasolartOrCreate();

      try{
      	$this->updateCasolartFromRequest();
      	}
      catch (Exception $ex){}

      $this->setVars();
      $this->configGridDetalle();
      $this->configGridRecargo($this->casolart->getReqart());
      $this->configGridRazon();
      Herramientas::CargarDatosGrid($this,$this->obj);
      Herramientas::CargarDatosGrid($this,$this->obj2);
      Herramientas::CargarDatosGrid($this,$this->obj3);


      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror1!=-1)
        {
         $err = Herramientas::obtenerMensajeError($this->coderror1);
         $this->getRequest()->setError('',$err.'  ->  '.$this->codigo1);
        }

        if($this->coderror2!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror2);
         $this->getRequest()->setError('',$err1.'  del Articulo  '.$this->codigo2);
        }

        if($this->coderror3!=-1)
        {
         $err2 = Herramientas::obtenerMensajeError($this->coderror3);
         $this->getRequest()->setError('',$err2.'  ->  '.$this->codigo3);
        }

        if($this->codeerror!=-1)
        {
         $err3 = Herramientas::obtenerMensajeError($this->codeerror);
         $this->getRequest()->setError('',$err3);
        }

        if($this->razonvacia!=-1)
        {
         $err4 = Herramientas::obtenerMensajeError($this->razonvacia);
         $this->getRequest()->setError('',$err4);
        }

        if($this->detallevacia!=-1)
        {
         $err5 = Herramientas::obtenerMensajeError($this->detallevacia);
         $this->getRequest()->setError('',$err5);
        }
        if($this->salvarrecar!=-1)
        {
         $err5 = Herramientas::obtenerMensajeError($this->salvarrecar);
         $this->getRequest()->setError('',$err5);
        }
        if($this->fecper!=-1)
        {
         $err6 = Herramientas::obtenerMensajeError($this->fecper);
         $this->getRequest()->setError('casolart{fecreq}',$err6);
        }
        if($this->fecperfis!=-1)
        {
         $err7 = Herramientas::obtenerMensajeError($this->fecperfis);
         $this->getRequest()->setError('casolart{fecreq}',$err7);
        }
      }
      return sfView::SUCCESS;
    }

    protected function saveCasolart($casolart)
    {
      if ($casolart->getId() && $this->getRequestParameter('modifi')=='N')
      {
        $casolart->save();
        $this->coderror=-1;
       	return $this->coderror;
      }
      else
      {
      $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      $grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
      $grid3=Herramientas::CargarDatosGrid($this,$this->obj3);

  	// Si en el parametro reqreqapr  de Cadefart, no requiere que la requisicion esta aprobada para despacharla
  	// entonces de una vez grabo la requisicion como aprobada
  	 if ($this->autoriza_solicutud_egreso=="") $casolart->setAprreq('S');

      if (SolicituddeEgresos::salvarAlmsolegr($casolart,$grid,$grid2,$grid3,$this->getRequestParameter('generapre'),&$error))
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
     //$this->getUser()->getAttributeHolder()->remove('presiono','almsolegr');

   }

    protected function deleteCasolart($casolart)
    {
       SolicituddeEgresos::eliminarAlmsolegr($casolart);
    }

    public function executeDelete()
  {
    $this->casolart = CasolartPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->casolart);

    try
    {
      $this->deleteCasolart($this->casolart);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Casolart. Make sure it does not have any associated items.');
      return $this->forward('almsolegr', 'list');
    }

    return $this->redirect('almsolegr/list');
  }

  protected function updateCasolartFromRequest()
    {
      $casolart = $this->getRequestParameter('casolart');
      $this->moneda = Herramientas::cargarMoneda();
      $this->listatipo = Constantes::ListaTipoCompra();
      $c=new Criteria();
      $c->add(CpcomproPeer::STACOM,'N',Criteria::NOT_EQUAL);
      $c->add(CpcomproPeer::REFPRC,$this->casolart->getReqart());
      $trajo= CpcomproPeer::doSelectOne($c);
      if ($trajo)
      {$this->haydespacho='S';}else {$this->haydespacho='N';}
      $c=new Criteria();
      $c->add(CacotizaPeer::REFSOL,$this->casolart->getReqart());
      $trajo2= CacotizaPeer::doSelect($c);
      if ($trajo2)
      {$this->cotiz='S';}else {$this->cotiz='N';}
      $c=new Criteria();
      $c->add(CaartsolPeer::CANORD,0,Criteria::NOT_EQUAL);
      $c->add(CaartsolPeer::REQART,$this->casolart->getReqart());
      $reg= CaartsolPeer::doSelect($c);
      if (count($reg)>0)
      {$this->modifico='N';}else {$this->modifico='S';}
      if ($this->modifico=='S')
      { $this->configGridDetalle(); $this->configGridRecargo($this->casolart->getReqart()); $this->configGridRazon();}
      else { $this->configGridDetalleConsulta(); $this->configGridRecargoConsulta(); $this->configGridRazonConsulta();}

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
      if (isset($casolart['tipmon']))
      {
        $this->casolart->setTipmon($casolart['tipmon']);
      }
      if (isset($casolart['desreq']))
      {
        $this->casolart->setDesreq($casolart['desreq']);
      }
      if (isset($casolart['monreq']))
      {
        $this->casolart->setMonreq($casolart['monreq']);
      }
      if (isset($casolart['unires']))
      {
        $this->casolart->setUnires($casolart['unires']);
      }
      if (isset($casolart['nomcat']))
      {
        $this->casolart->setNomcat($casolart['nomcat']);
      }
      if (isset($casolart['tipo']))
        {
          $this->casolart->setTipo($casolart['tipo']);
        }
      if (isset($casolart['tipfin']))
      {
        $this->casolart->setTipfin($casolart['tipfin']);
      }
      if (isset($casolart['nomext']))
      {
        $this->casolart->setNomext($casolart['nomext']);
      }
      if (isset($casolart['motreq']))
      {
        $this->casolart->setMotreq($casolart['motreq']);
      }
      if (isset($casolart['benreq']))
      {
        $this->casolart->setBenreq($casolart['benreq']);
      }
      if (isset($casolart['obsreq']))
      {
        $this->casolart->setObsreq($casolart['obsreq']);
      }
      if (isset($casolart['mondes']))
      {
        $this->casolart->setMondes($casolart['mondes']);
      }
      if (isset($casolart['tipreq']))
      {
        $this->casolart->setTipreq($casolart['tipreq']);
      }
      if (isset($casolart['valmon']))
      {
        $this->casolart->setValmon($casolart['valmon']);
      }

        $this->casolart->setStareq('A');

    }

    public function executeAjax()
   {
     $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $output=array();
     if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='3')
      {
	 	$c= new Criteria();
		$c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
      	$reg=CaregartPeer::doSelectOne($c);
  		if ($reg)
  		{
	        $dato=htmlspecialchars($reg->getDesart());
	        $dato1=$reg->getUnimed();
	        $dato2=number_format($reg->getCosult(),2,',','.');
	        $dato3=$reg->getCodpar();
	        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato1.'",""],["'.$this->getRequestParameter('costo').'","'.$dato2.'",""],["'.$this->getRequestParameter('partida').'","'.$dato3.'",""]]';
  		}
  		else
  		{
  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('costo') ."').value='0.00';$('". $this->getRequestParameter('partida') ."').value=''";
        	 $output = '[["javascript","'.$javascript.'",""]]';
  		}
      }
      else  if ($this->getRequestParameter('ajax')=='4')
      {
        $dato=CarecargPeer::getRecargo($this->getRequestParameter('codigo'));
        $dato1=number_format(CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo'),2,',','.');
        $dato2=CarecargPeer::getDato($this->getRequestParameter('codigo'),'tiprgo');
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"],["'.$this->getRequestParameter('monto').'","'.$dato1.'",""],["'.$this->getRequestParameter('tipo').'","'.$dato2.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='5')
      {
        $dato=CarazcomPeer::getDesrazon($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
        $this->getUser()->setAttribute('presiono', 'S','almsolegr');
        $output = '[["","",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='7')
      {
      	if (Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
      	{
         $valido='N';
      	}else { $valido='S';}

      	if (Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')))
      	{ $valido2='N';}
      	else { $valido2='S';}
        $output = '[["valfec","'.$valido.'",""],["valfec2","'.$valido2.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='8')
      {
      	$fec1 = $this->getRequestParameter('fecemi');
        $javascript="";
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        if ($fec2<$fec1)
        {
          $javascript="alert('La Fecha de Anulación no puede ser menor a la Fecha de la Solicitud'); $('casolart_fecanu').value=''; ";
        }else {
            if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
	      	{
	         $javascript="alert('La Fecha no se encuentra del Período Fiscal');	$('casolart_fecanu').value=''; ";
	      	}else {
	      		if (!Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')))
		      	{
		      	  $javascript="alert('La Fecha se encuentra dentro un Período Cerrado'); $('casolart_fecanu').value='';	";
		      	}

		    }
        }
        $output = '[["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='9')//Calcular Recargos
      {
        $d= new Criteria();
        $d->add(CarecargPeer::CODRGO,$this->getRequestParameter('codigo'));
        $recargosreg= CarecargPeer::doSelectOne($d);
        if ($recargosreg)
        {
          if ($recargosreg->getCodpre()!="")
          {
            $desrgo=$recargosreg->getNomrgo();
	        $montorgotab=$recargosreg->getMonrgo();
	        $monrgo=number_format($montorgotab,2,',','.');
	        $tiprgo=$recargosreg->getTiprgo();
	        $reccal=SolicituddeEgresos::CalcularRecargos($tiprgo,$monrgo,$this->getRequestParameter('monart'));
	        $reccalformat=number_format($reccal,2,',','.');
	        if ($tiprgo=='M' and $montorgotab==0)//Tipo recargo puntual (monto)
	            $javascript="$('".$this->getRequestParameter('moncal')."').readOnly=false; actualizarsaldos_b();";
	        else //Tipo de recargo por porcentaje
	        	 $javascript="actualizarsaldos_b();";
          }
          else
          {
          	$desrgo=""; $monrgo="0,00"; $tiprgo=""; $reccalformat="0,00";
          	$javascript="alert('Debe asociarle al Recargo el Código Presupuestario'); $('$cajtexcom').value='';";
          }
        }else{
        	$desrgo=""; $monrgo="0,00"; $tiprgo=""; $reccalformat="0,00";
          	$javascript="alert('El Recargo no existe'); $('$cajtexcom').value='';";
        }

        $output = '[["'.$cajtexmos.'","'.$desrgo.'",""],["'.$cajtexcom.'","4","c"],["'.$this->getRequestParameter('monto').'","'.$monrgo.'",""],["'.$this->getRequestParameter('tipo').'","'.$tiprgo.'",""],["'.$this->getRequestParameter('moncal').'","'.$reccalformat.'",""],["javascript","'.$javascript.'",""]]';
      }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }


    public function executeRecargos()
    {
      $articulo=$this->getRequestParameter('articulo');
      $codunidad=$this->getRequestParameter('codunidad');
      $reqart=$this->getRequestParameter('reqart');
      $modifico=$this->getRequestParameter('modifico');
      if ($modifico=='S')
            $this->configGridRecargo($reqart,$articulo,$codunidad);
      else
            $this->configGridRecargoConsulta($reqart,$articulo,$codunidad);
      $output = '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }


    public function executeAutocomplete()
    {
     if ($this->getRequestParameter('ajax')=='1')
      {
      $this->tags=Herramientas::autocompleteAjax('CODCAT','Npcatpre','codcat',$this->getRequestParameter('casolart[unires]'));
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','codfin',$this->getRequestParameter('casolart[tipfin]'));
      }
    }

    public function configGridDetalle()
    {
       $c = new Criteria();
       $c->add(CaartsolPeer::REQART,$this->casolart->getReqart());
       $c->addAscendingOrderByColumn(CaartsolPeer::CODART);
       $reg = CaartsolPeer::doSelect($c);

       $mascaraarticulo=$this->mascaraarticulo;
       $lonart=strlen($this->mascaraarticulo);
       $mascaracategoria=$this->mascaracategoria;
       $loncat=strlen($this->mascaracategoria);
       $mascarapresupuesto=$this->mascarapresupuesto;
       $lonpre=strlen($this->mascarapresupuesto);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Caartsol');
       $opciones->setAncho(2050);
       $opciones->setAnchoGrid(1800);
       $opciones->setFilas(150);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Marque');
       $col1->setTipo(Columna::CHECK);
       $col1->setNombreCampo('check');
       $col1->setEsGrabable(true);
       $col1->setHTML(' ');
       $col1->setJScript('onClick="totalmarcadas(this.id)"');

       $obj= array('codart' => 2, 'desart' => 3, 'unimed' => 4, 'cosult' => 9, 'codpar' => 13);
       $params= array('param1' => $lonart, 'param2' => "'+$('casolart_tipreq').value+'", 'val2');

       $col2 = new Columna('Cód. Artículo');
       $col2->setTipo(Columna::TEXTO);
       $col2->setEsGrabable(true);
       $col2->setAlineacionObjeto(Columna::CENTRO);
       $col2->setAlineacionContenido(Columna::CENTRO);
       $col2->setNombreCampo('codart');
       $col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajaxdetalle(event,this.id);"');
       $col2->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almsolegr',$params);
       $col2->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'"');

       $col3 = new Columna('Descripción');
       $col3->setTipo(Columna::TEXTAREA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setNombreCampo('desartsol');
       $col3->setEsGrabable(true);
       $col3->setHTML('type="text" size="25x1"');

       $col4 = new Columna('Unidad de Medida');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionObjeto(Columna::IZQUIERDA);
       $col4->setAlineacionContenido(Columna::IZQUIERDA);
       $col4->setNombreCampo('unimed');
       $col4->setEsGrabable(true);
       $col4->setHTML('type="text" size="25" readonly=true');

       $obj2= array('codcat' => 5);
       $params2= array('param1' => $loncat);

       $col5 = new Columna('Cód. Unidad');
       $col5->setTipo(Columna::TEXTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionObjeto(Columna::CENTRO);
       $col5->setAlineacionContenido(Columna::CENTRO);
       $col5->setNombreCampo('codcat');
       $col5->setHTML('type="text" size="17" maxlength="'.chr(39).$loncat.chr(39).'"');
       $col5->setCatalogo('npcatpre','sf_admin_edit_form',$obj2,'Npcatpre_Almsolegr',$params2);
       $col5->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena; perderfocus(event,this.id,15);}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(event,this.id);"');

       $col6 = new Columna('Cód. Presupuestario');
       $col6->setTipo(Columna::TEXTO);
       $col6->setEsGrabable(true);
       $col6->setNombreCampo('codigopre');
       $col6->setAlineacionObjeto(Columna::CENTRO);
       $col6->setAlineacionContenido(Columna::CENTRO);
       $col6->setHTML('type="text" size="55" maxlength="'.chr(39).$lonpre.chr(39).'"');
       $col6->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapresupuesto.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

       $col7 = new Columna('Cant. Requerida');
       $col7->setEsGrabable(true);
       $col7->setTipo(Columna::MONTO);
       $col7->setAlineacionContenido(Columna::DERECHA);
       $col7->setAlineacionObjeto(Columna::DERECHA);
       $col7->setNombreCampo('canreq');
       $col7->setEsNumerico(true);
       $col7->setHTML('type="text" size="10"');
       $col7->setJScript('onKeypress="Cantidad(event,this.id); recalcularecargos(event,this.id);"');

       $col8 = clone $col7;
       $col8->setTitulo('Cant. Recibida');
       $col8->setNombreCampo('canrec');
       $col8->setHTML('type="text" size="10" readonly=true');

       $col9 = clone $col7;
       $col9->setTitulo('Costo');
       $col9->setNombreCampo('costo');
       $col9->setHTML('type="text" size="10"');
       $col9->setJScript('onKeypress="Total(event,this.id); recalcularecargos(event,this.id);"');

       $col10 = clone $col7;
       $col10->setTitulo('Descuento');
       $col10->setNombreCampo('mondes');
       $col10->setHTML('type="text" size="10"');
       $col10->setJScript('onKeypress="Totalmenosdescuento(event,this.id);"');

       $col11 = clone $col7;
       $col11->setTitulo('Recargo');
       $col11->setNombreCampo('monrgo');
       $col11->setHTML('type="text" size="10" readonly=true');

       $col12 = clone $col11;
       $col12->setTitulo('Total');
       $col12->setNombreCampo('montot');
       $col12->setEsTotal(true,'casolart_monreq');

       $col13 = new Columna('Codigo Partida');
       $col13->setTipo(Columna::TEXTO);
       $col13->setEsGrabable(false);
       $col13->setOculta(true);
       $col13->setAlineacionObjeto(Columna::CENTRO);
       $col13->setAlineacionContenido(Columna::CENTRO);
       $col13->setNombreCampo('codpre');
       $col13->setHTML('type="text" size="20"');

       $col14 = clone $col11;
       $col14->setTitulo('Total');
       $col14->setNombreCampo('montot2');
       $col14->setOculta(true);

       $col15 = clone $col7;
       $col15->setTitulo('Recargo');
       $col15->setNombreCampo('monrgo2');
       $col15->setHTML('type="text" size="10" readonly=true');
       $col15->setOculta(true);

	   $col16 = new Columna('Recargos');
	   $col16->setTipo(Columna::TEXTO);
	   $col16->setEsGrabable(false);
	   $col16->setAlineacionObjeto(Columna::CENTRO);
	   $col16->setAlineacionContenido(Columna::CENTRO);
	   $col16->setNombreCampo('anadir');
	   $col16->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"');
	   $col16->setJScript('onClick="mostrargridrecargos(this.id)"');


	  $col17 = new Columna('cadena_datos_recargo');
      $col17->setTipo(Columna::TEXTO);
      $col17->setEsGrabable(true);
      $col17->setAlineacionObjeto(Columna::IZQUIERDA);
      $col17->setAlineacionContenido(Columna::IZQUIERDA);
      $col17->setNombreCampo('datosrecargo');
      $col17->setOculta(true);

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

       $this->obj = $opciones->getConfig($reg);

  }

      public function configGridDetalleConsulta()
   {
       $c = new Criteria();
       $c->add(CaartsolPeer::REQART,$this->casolart->getReqart());
       $c->addAscendingOrderByColumn(CaartsolPeer::CODART);
       $reg = CaartsolPeer::doSelect($c);

       $mascaraarticulo=$this->mascaraarticulo;
       $lonart=strlen($this->mascaraarticulo);
       $mascaracategoria=$this->mascaracategoria;
       $loncat=strlen($this->mascaracategoria);
       $mascarapresupuesto=$this->mascarapresupuesto;
       $lonpre=strlen($this->mascarapresupuesto);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       $opciones->setTabla('Caartsol');
       $opciones->setAncho(1700);
       $opciones->setAnchoGrid(1600);
       $opciones->setFilas(0);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Marque');
       $col1->setTipo(Columna::CHECK);
       $col1->setNombreCampo('check');
       $col1->setEsGrabable(true);
       $col1->setHTML(' ');
       $col1->setJScript('onClick="totalmarcadas(this.id)"');

       $col2 = new Columna('Cód. Artículo');
       $col2->setTipo(Columna::TEXTO);
       $col2->setEsGrabable(true);
       $col2->setAlineacionObjeto(Columna::CENTRO);
       $col2->setAlineacionContenido(Columna::CENTRO);
       $col2->setNombreCampo('codart');
       $col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
       $col2->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" readonly="true"');

       $col3 = new Columna('Descripción');
       $col3->setTipo(Columna::TEXTAREA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setNombreCampo('desartsol');
       $col3->setHTML('type="text" size="25x1" readonly=true');

       $col4 = new Columna('Unidad de Medida');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionObjeto(Columna::IZQUIERDA);
       $col4->setAlineacionContenido(Columna::IZQUIERDA);
       $col4->setNombreCampo('unimed');
       $col4->setEsGrabable(true);
       $col4->setHTML('type="text" size="25" readonly=true');

       $col5 = new Columna('Cód. Unidad');
       $col5->setTipo(Columna::TEXTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionObjeto(Columna::CENTRO);
       $col5->setAlineacionContenido(Columna::CENTRO);
       $col5->setNombreCampo('codcat');
       $col5->setHTML('type="text" size="17" maxlength="'.chr(39).$loncat.chr(39).'" readonly="true"');
       $col5->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);actualizo_cod_presupuestario(this.id);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

       $col6 = new Columna('Cód. Presupuestario');
       $col6->setTipo(Columna::TEXTO);
       $col6->setEsGrabable(true);
       $col6->setNombreCampo('codigopre');
       $col6->setAlineacionObjeto(Columna::CENTRO);
       $col6->setAlineacionContenido(Columna::CENTRO);
       $col6->setHTML('type="text" size="55" maxlength="'.chr(39).$lonpre.chr(39).'" readonly="true"');
       $col6->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapresupuesto.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

       $col7 = new Columna('Cant. Requerida');
       $col7->setEsGrabable(true);
       $col7->setTipo(Columna::MONTO);
       $col7->setAlineacionContenido(Columna::DERECHA);
       $col7->setAlineacionObjeto(Columna::DERECHA);
       $col7->setNombreCampo('canreq');
       $col7->setEsNumerico(true);
       $col7->setHTML('type="text" size="10" readonly="true"');
       $col7->setJScript('onKeypress="Cantidad(event,this.id); recalcularecargos(event,this.id);"');

       $col8 = clone $col7;
       $col8->setTitulo('Cant. Recibida');
       $col8->setNombreCampo('canrec');
       $col8->setHTML('type="text" size="10" readonly=true');

       $col9 = clone $col7;
       $col9->setTitulo('Costo');
       $col9->setNombreCampo('costo');
       $col9->setHTML('type="text" size="10" readonly="true"');
       $col9->setJScript('onKeypress="Total(event,this.id); recalcularecargos(event,this.id);"');

       $col10 = clone $col7;
       $col10->setTitulo('Descuento');
       $col10->setNombreCampo('mondes');
       $col10->setHTML('type="text" size="10" readonly="true"');
       $col10->setJScript('onKeypress="Totalmenosdescuento(event,this.id); recalcularecargos(event,this.id);"');

       $col11 = clone $col7;
       $col11->setTitulo('Recargo');
       $col11->setNombreCampo('monrgo');
       $col11->setHTML('type="text" size="10" readonly=true');

       $col12 = clone $col11;
       $col12->setTitulo('Total');
       $col12->setNombreCampo('montot');
       $col12->setEsTotal(true,'casolart_monreq');

       $col13 = new Columna('Codigo Partida');
       $col13->setTipo(Columna::TEXTO);
       $col13->setEsGrabable(false);
       $col13->setOculta(true);
       $col13->setAlineacionObjeto(Columna::CENTRO);
       $col13->setAlineacionContenido(Columna::CENTRO);
       $col13->setNombreCampo('CodPre');
       $col13->setHTML('type="text" size="20" readonly="true"');

       $col14 = clone $col11;
       $col14->setTitulo('Total');
       $col14->setNombreCampo('montot2');
       $col14->setOculta(true);

       $col15 = clone $col7;
       $col15->setTitulo('Recargo');
       $col15->setNombreCampo('monrgo2');
       $col15->setHTML('type="text" size="10" readonly=true');
       $col15->setOculta(true);

	   $col16 = new Columna('Recargos');
	   $col16->setTipo(Columna::TEXTO);
	   $col16->setEsGrabable(false);
	   $col16->setAlineacionObjeto(Columna::CENTRO);
	   $col16->setAlineacionContenido(Columna::CENTRO);
	   $col16->setNombreCampo('anadir');
	   $col16->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"');
	   $col16->setJScript('onClick="mostrargridrecargos(this.id)"');


	   $col17 = new Columna('cadena_datos_recargo');
       $col17->setTipo(Columna::TEXTO);
       $col17->setEsGrabable(true);
       $col17->setAlineacionObjeto(Columna::IZQUIERDA);
       $col17->setAlineacionContenido(Columna::IZQUIERDA);
       $col17->setNombreCampo('datosrecargo');
       $col17->setOculta(true);

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

       $this->obj = $opciones->getConfig($reg);

  }

    public function configGridRecargo($reqart="",$codart="",$coduni="")
   {
	   $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
       $c = new Criteria();
       $c->add(CadisrgoPeer::REQART,$reqart);
       $c->add(CadisrgoPeer::CODART,$codart);
       $c->add(CadisrgoPeer::CODCAT,$coduni);
       $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
       $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
       $reg = CadisrgoPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Cadisrgo');
       $opciones->setAncho(700);
       $opciones->setAnchoGrid(700);
       $opciones->setTitulo('Recargos');
       $opciones->setName('b');
       $opciones->setFilas(20);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código Recargo');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrgo');
       $col1->setHTML('type="text" size="15" maxlength="4"');
       $col1->setCatalogo('carecarg','sf_admin_edit_form',array('codrgo' => 1, 'nomrgo' => 2,'monrgo' => 3,'tiprgo' => 4));
       $col1->setJScript('onKeypress="javascript: perderfocus(event,this.id,6);" onBlur="javascript:event.keyCode=13; ajaxrecargo(event,this.id);"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('nomrgo');
       $col2->setHTML('type="text" size="35" readonly=true');

       $col3 = new Columna('Monto  Por Recargo');
       $col3->setTipo(Columna::TEXTO);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setNombreCampo('monrgoc');
       $col3->setEsNumerico(true);
       $col3->setOculta(true);

       $col4 = new Columna('Tipo Recargo');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionContenido(Columna::CENTRO);
       $col4->setAlineacionObjeto(Columna::CENTRO);
       $col4->setNombreCampo('tiprgo');
       $col4->setOculta(true);

       $col5 = new Columna('Monto Recargo');
       $col5->setTipo(Columna::MONTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionContenido(Columna::DERECHA);
       $col5->setAlineacionObjeto(Columna::DERECHA);
       $col5->setNombreCampo('monrgo');
       $col5->setEsNumerico(true);
       $col5->setHTML('type="text" size="25"');
       $col5->setJScript('readOnly=true; onKeyPress="javascript:if (event.keyCode==13 || event.keyCode==9) {actualizarsaldos_b();} "');
       $col5->setEsTotal(true,'totrecar');


       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);

       $this->obj2 = $opciones->getConfig($reg);

  }

   public function configGridRecargoConsulta($reqart="",$codart="",$coduni="")
   {
       $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
       $c = new Criteria();
       $c->add(CadisrgoPeer::REQART,$reqart);
       $c->add(CadisrgoPeer::CODART,$codart);
       $c->add(CadisrgoPeer::CODCAT,$coduni);
       $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
       $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
       $reg = CadisrgoPeer::doSelect($c);


       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       $opciones->setTabla('Cargosol');
       $opciones->setAncho(700);
       $opciones->setAnchoGrid(700);
       $opciones->setTitulo('Recargos');
       $opciones->setName('b');
       $opciones->setFilas(0);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código Recargo');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrgo');
       $col1->setHTML('type="text" size="15" maxlength="4" readonly="true"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('nomrgo');
       $col2->setHTML('type="text" size="35" readonly=true');

       $col3 = new Columna('Monto  Por Recargo');
       $col3->setTipo(Columna::TEXTO);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setNombreCampo('monrgoc');
       $col3->setEsNumerico(true);
       $col3->setOculta(true);

       $col4 = new Columna('Tipo Recargo');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionContenido(Columna::CENTRO);
       $col4->setAlineacionObjeto(Columna::CENTRO);
       $col4->setNombreCampo('tiprgo');
       $col4->setOculta(true);

       $col5 = new Columna('Monto Recargo');
       $col5->setTipo(Columna::MONTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionContenido(Columna::DERECHA);
       $col5->setAlineacionObjeto(Columna::DERECHA);
       $col5->setNombreCampo('monrgo');
       $col5->setEsNumerico(true);
       $col5->setHTML('type="text" size="25" readonly="true"');
       $col5->setJScript('onKeypress="entermonto_b(event,this.id);"');
       $col5->setEsTotal(true,'totrecar');


       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);

       $this->obj2 = $opciones->getConfig($reg);

  }

    public function configGridRazon()
   {
       $c = new Criteria();
       $c->add(CasolrazPeer::NUMSOL,$this->casolart->getReqart());
       $c->addAscendingOrderByColumn(CasolrazPeer::CODRAZCOM);
       $reg = CasolrazPeer::doSelect($c);


       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Casolraz');
       $opciones->setAncho(400);
       $opciones->setAnchoGrid(400);
       $opciones->setTitulo('');
       $opciones->setName('c');
       $opciones->setFilas(10);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrazcom');
       $col1->setHTML('type="text" size="10" maxlength="4"');
       $col1->setJScript('onkeyPress="perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajax(event,this.id)"');
       $col1->setCatalogo('carazcom','sf_admin_edit_form',array('codrazcom' => 1, 'desrazcom' => 2));


       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('desrazcom');
       $col2->setHTML('type="text" size="25" readonly=true');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);

       $this->obj3 = $opciones->getConfig($reg);

  }


  public function configGridRazonConsulta()
   {
       $c = new Criteria();
       $c->add(CasolrazPeer::NUMSOL,$this->casolart->getReqart());
       $c->addAscendingOrderByColumn(CasolrazPeer::CODRAZCOM);
       $reg = CasolrazPeer::doSelect($c);


       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Casolraz');
       $opciones->setAncho(400);
       $opciones->setAnchoGrid(400);
       $opciones->setTitulo('');
       $opciones->setName('c');
       $opciones->setFilas(10);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrazcom');
       $col1->setHTML('type="text" size="10" maxlength="4" readonly="true"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('desrazcom');
       $col2->setHTML('type="text" size="25" readonly=true');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);

       $this->obj3 = $opciones->getConfig($reg);

  }

  public function setVars()
  {
  	$this->autoriza_solicutud_egreso = Herramientas::ObtenerFormato('Cadefart','solreqapr');
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
    $this->loncat=strlen($this->mascaracategoria);
    $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
    $c= new Criteria();
    $regis= CadefartPeer::doSelectOne($c);
    if ($regis)
    {
      $this->precompromete=$regis->getPrcasopre();
      $this->autorizaprecom=$regis->getPrcreqapr();
      $this->tiporec= $regis->getAsiparrec();
    }
    else
    {
      $this->precompromete="";
      $this->autorizaprecom="";
      $this->tiporec="";
    }

    $this->cambiareti="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos']))
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->cambiareti=$varemp['aplicacion']['compras']['modulos']['almsolegr']['cambiareti'];
	       }
  }

  public function executeGenerarcompromiso()
  {
     $this->casolart = $this->getCasolartOrCreate();
     if (SolicituddeEgresos::generaPrecompromiso($this->casolart,$this->casolart->getReqart(),&$msj))
     {
       SolicituddeEgresos::generarImputacionesPrecompromiso($this->casolart->getReqart());
       $totaimp=SolicituddeEgresos::totalImputacion($this->casolart->getReqart());
        if (H::convnume($this->casolart->getMonreq())!=$totaimp)
        {
           $this->msj="El Monto de la Imputaciones Generadas no es igual al de la Solicitud, Por favor verificar esta solicitud";
           $this->id=$this->casolart->getId();
        }else{
	       $this->msj="Se genero el Precompromiso satisfactoriamente";
	       $this->id=$this->casolart->getId();
        }

     }else {$this->msj="No se pudo grabar el compromiso, ya que existe la referencia en la base de datos";
     $this->id=$this->casolart->getId();}
   }

   public function executeAnular()
   {
   $reqart=$this->getRequestParameter('reqart');
   $fecreq=$this->getRequestParameter('fecreq');

   $dateFormat = new sfDateFormat($this->getUser()->getCulture());
   $fec = $dateFormat->format($fecreq, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CasolartPeer::REQART,$reqart);
   $c->add(CasolartPeer::FECREQ,$fec);
   $this->casolart = CasolartPeer::doSelectOne($c);
   sfView::SUCCESS;
   }

  public function executeSalvaranu()
  {
    $reqart=$this->getRequestParameter('reqart');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $this->msg='';
    $sql="select a.refere as referencia from cpajuste a, cpdocaju b where a.tipaju=b.tipaju and b.refier='P' and a.refere='".$reqart."' and a.staaju='A'";
    if (!(Herramientas::BuscarDatos($sql,&$result)))
    {
      $c= new Criteria();
      $c->add(CpcomproPeer::STACOM,'N',Criteria::NOT_EQUAL);
      $c->add(CpcomproPeer::REFPRC,$reqart);
      $resul= CpcomproPeer::doSelectOne($c);
      if (!($resul))
      {
        $c= new Criteria();
        $c->add(CasolartPeer::REQART,$reqart);
        $registro= CasolartPeer::doSelectOne($c);
        if ($registro)
        {
          $registro->setFecanu($fecanu);
          $registro->setStareq('N');
          $registro->save();
        }

        $b= new Criteria();
        $b->add(CpprecomPeer::REFPRC,$reqart);
        $registro2= CpprecomPeer::doSelectOne($b);
        if ($registro2)
        {
          $registro2->setDesanu($desanu);
          $registro2->setFecanu($fecanu);
          $registro2->setStaprc('N');
          $registro2->save();

          $a= new Criteria();
          $a->add(CpimpprcPeer::REFPRC,$reqart);
          $registro3= CpimpprcPeer::doSelect($a);
          if ($registro3)
          {
            foreach ($registro3 as $cpimpprc)
            {
              $cpimpprc->setStaimp('N');
              $cpimpprc->save();
            }
          }
        }
      }else $this->msj="La Solicitud de Egreso no puede ser anulada ya que tiene un Compromiso Asociado";
    }else $this->msj="La Solicitud de Egreso no puede ser anulada ya que tiene un Ajuste Asociado";
    return sfView::SUCCESS;
  }

  protected function getLabels()
    {
      return array(
        'casolart{reqart}' => 'Número',
        'casolart{fecreq}' => 'Fecha',
        'casolart{tipmon}' => 'Moneda',
        'casolart{desreq}' => 'Descripción',
        'casolart{monreq}' => 'Monto Total',
        'casolart{unires}' => 'Unidad Responsable',
        'casolart{nomcat}' => 'Descripción',
        'casolart{tipreq}' => 'Tipo',
        'casolart{tipfin}' => 'Financiamiento',
        'casolart{nomext}' => 'Nomext',
        'casolart{motreq}' => 'Motivo',
        'casolart{benreq}' => 'Beneficio',
        'casolart{obsreq}' => 'Observaciones',
        'casolart{mondes}' => 'Descripción',
        'casolart{valmon}' => 'Valor',
        'casolart{stareq}' => 'estatus',
      );
    }

  protected function getCasolartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $casolart = new Casolart();

    }
    else
    {
      $casolart = CasolartPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($casolart);
    }

    return $casolart;
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/casolart/filters');

    $this->cambiareti="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos']))
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$this->cambiareti=$varemp['aplicacion']['compras']['modulos']['almsolegr']['cambiareti'];
	       }


     // 15    // pager
    $this->pager = new sfPropelPager('Casolart', 15);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

}
