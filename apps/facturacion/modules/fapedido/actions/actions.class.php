<?php

/**
 * fapedido actions.
 *
 * @package    siga
 * @subpackage fapedido
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fapedidoActions extends autofapedidoActions
{
  private $coderror=-1;
  private $coderror1=-1;
  private $coderror2=-1;
  private $coderror3=-1;
  private $coderror4=-1;
  private $coderror5=-1;
  private $coderror6=-1;
  private $coderror7=-1;

  public function editing()
  {
  	if ($this->fapedido->getId()=="")
  	{$c= new Criteria();
  	$reg=FacorrelatPeer::doSelectOne($c);
  	if ($reg)
  	{
  		$numero=str_pad($reg->getCorped(), 8, '0', STR_PAD_LEFT);
  	}else { $numero="";}

  	$this->fapedido->setNroped($numero);
  	}
  	$entrega=Facturacion::entregas($this->fapedido->getNroped());
  	$this->fapedido->setEntrega($entrega);
  	if ($this->fapedido->getId()!="")
  	{
  	  if ($this->fapedido->getStatus()=='N')
  	  {
  	  	$fecha=date('d/m/Y',strtotime($this->fapedido->getFecanu()));
  	  	$this->fapedido->setEstatus('Anulado el'.$fecha);
  	  }	else $this->fapedido->setEstatus('');
  	}else $this->fapedido->setEstatus('');
  	$this->fapedido->setReapor($this->getUser()->getAttribute('loguse'));
  	$this->setVars();
	$this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridArtPed($this->fapedido->getNroped(),$this->getRequestParameter('fapedido[refped]'),$this->getRequestParameter('fapedido[combo]'));
    $this->configGridFecPed($this->fapedido->getNroped());
  }

  public function configGridArtPed($nroped='', $refpre='', $combo='')
  {
  	if ($refpre!='')
  	{
  	  $c = new Criteria();
  	  $c->add(FadetprePeer::REFPRE,$refpre);
  	  $artped = FadetprePeer::doSelect($c);
  	}else if ($combo!="")
  	{
      $c = new Criteria();
  	  $c->add(FaartcomPeer::CODCOM,$combo);
  	  $artped = FaartcomPeer::doSelect($c);
  	}
  	else
  	{
  	  $c = new Criteria();
  	  $c->add(FaartpedPeer::NROPED,$nroped);
  	  $artped = FaartpedPeer::doSelect($c);
  	}
  	$this->fil1=count($artped);

  	$mascara=$this->mascaraarticulo;
  	$lonarti=$this->lonart;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fapedido/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_faartped');
    if ($refpre!='')
    {
    $this->columnas[0]->setTabla('Fadetpre');
    $this->columnas[1][8]->setNombrecampo('totart2');
    }
    else if ($combo!='')
    $this->columnas[0]->setTabla('Faartcom');
    else $this->columnas[0]->setTabla('Faartped');

    $obj= array('codart' => 1, 'desart' => 2);
    $params= array('param1' => $lonarti, 'val2');
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,8);" onBlur="javascript:event.keyCode=13; ajaxarticulos(event,this.id);"');
    $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Fapedido',$params);
    $this->columnas[1][2]->setHTML(' size="10" onKeyPress=Cantidad(event,this.id);');
    $this->columnas[1][6]->setCombo(FaartpvpPeer::getPrecios());
    $this->columnas[1][6]->setHTML('onChange=Precio(this.id);');
    $this->columnas[1][7]->setHTML('size="10" readonly=true onKeyPress=Preciocaja(event,this.id);');
    $this->columnas[1][8]->setEsTotal(true,'fapedido_monped');

    $this->obj =$this->columnas[0]->getConfig($artped);

    $this->fapedido->setObj($this->obj);
  }

  public function configGridFecPed($nroped='')
  {
  	$c = new Criteria();
  	$c->add(FafecpedPeer::NROPED,$nroped);
  	$fecped = FafecpedPeer::doSelect($c);

    $this->columnas=Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fapedido/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fafecped');
    $this->objfecped = $this->columnas[0]->getConfig($fecped);

    $this->fapedido->setObjfecped($this->objfecped);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript="";

    switch ($ajax){
      case '2':
       $codcli=""; $rifcli= ""; $nomcli= ""; $nitcli= ""; $dircli= ""; $telcli= ""; $javascript="";
       if ($codigo!="")
       {
         $c= new Criteria();
         $c->add(FaclientePeer::RIFPRO,$codigo);
         $reg= FaclientePeer::doSelectOne($c);
         if ($reg)
         {
           $this->sql="CODREC NOT IN (SELECT CODREC FROM FARECPRO WHERE CODPRO='".$reg->getCodpro()."')";
           $a= new Criteria();
           $a->add(CarecaudPeer::LIMREC,'S');
           $a->add(CarecaudPeer::CODTIPREC,$reg->getCodtiprec());
           $a->add(CarecaudPeer::CODREC,$this->sql,Criteria::CUSTOM);
           $regi= CarecaudPeer::doSelectOne($a);
           if (!$regi)
           {
             $codcli=$reg->getCodpro();
             $rifcli=$reg->getRifpro();
             $nomcli=$reg->getNompro();
             $nitcli=$reg->getNitpro();
             $dircli=$reg->getDirpro();
             $telcli=$reg->getTelpro();
             if ($reg->getCodcta()=="")
             {
             	$javascript="alert('El Cliente no posee Cuenta Contable asociada');";
             }
           }
           else
           {
           	$javascript="alert('El Cliente no ha consignado todos los recaudos limitantes');$('fapedido_rifpro').value='';";
           }
         }
         else
         {
         	$javascript="alert('El Cliente no existe'); $('fapedido_rifpro').value='';";
         }
       }
        $output = '[["fapedido_codcli","'.$codcli.'",""],["fapedido_rifpro","'.$rifcli.'",""],["fapedido_nompro","'.$nomcli.'",""],["fapedido_nitcli","'.$nitcli.'",""],["fapedido_dircli","'.$dircli.'",""],["fapedido_telcli","'.$telcli.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '3':
        $c= new Criteria();
		$c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
      	$reg=CaregartPeer::doSelectOne($c);
  		if ($reg)
  		{
	        $dato=$reg->getDesart();
	        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  		}
  		else
  		{
  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
        	 $output = '[["javascript","'.$javascript.'",""]]';
  		}
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '4':
         $this->ajaxs='';
         $this->combo='';
         $this->fapedido = $this->getFapedidoOrCreate();
         $c= new Criteria();
         $c->add(FapedidoPeer::REFPED,$this->getRequestParameter('codigo'));
         $data= FapedidoPeer::doSelectOne($c);
         if (!$data)
         {
           if ($this->getRequestParameter('docref')=='PR')
           {
             $a= new Criteria();
             $a->add(FapresupPeer::REFPRE,$this->getRequestParameter('codigo'));
             $reg= FapresupPeer::doSelectOne($a);
             if ($reg)
             {
               $codcli=$reg->getCodcli();
               $desped=$reg->getDespre();
               $d= new Criteria();
               $d->add(FaclientePeer::CODPRO,$codcli);
               $regi= FaclientePeer::doSelectOne($d);
               if ($regi)
               {
                 $rifcli= $regi->getRifpro();
                 $nomcli= $regi->getNompro();
                 $nitcli= $regi->getNitpro();
                 $dircli= $regi->getDirpro();
                 $telcli= $regi->getTelpro();
                 $cuenta_contable= $regi->getCodcta();
                 $javascript="$('fapedido_rifpro').readonly=true; $$('.botoncat')[1].disabled=true;";
                 if ($cuenta_contable=="")
                 {
                 	$javascript= $javascript."alert('El Cliente no posee Cuenta Contable asociada');";
                 }
                 $this->configGridArtPed('',$reg->getRefpre(),'');
               }
               else
               {
               	 $rifcli= "";
                 $nomcli= "";
                 $nitcli= "";
                 $dircli= "";
                 $telcli= "";
                 $cuenta_contable="";
                 $javascript="";
               }
             }
             else
             {
               $codcli=""; $desped=""; $rifcli= ""; $nomcli= ""; $nitcli= ""; $dircli= ""; $telcli= "";
               $cuenta_contable="";
               $this->configGridArtPed();
               $javascript="alert('El Presupuesto no se encuentra Registrado'); $('fapedido_refped').value=''";
             }
           }
         }
         else
         {
         	$codcli=""; $desped=""; $rifcli= ""; $nomcli= ""; $nitcli= ""; $dircli= ""; $telcli= "";
            $cuenta_contable="";
            $this->configGridArtPed();
         	$javascript="alert('El Presupuesto ya posee un Pedido'); $('fapedido_refped').value=''";
         }

        $output = '[["fapedido_codcli","'.$codcli.'",""],["fapedido_rifpro","'.$rifcli.'",""],["fapedido_nompro","'.$nomcli.'",""],["fapedido_nitcli","'.$nitcli.'",""],["fapedido_dircli","'.$dircli.'",""],["fapedido_telcli","'.$telcli.'",""],["fapedido_desped","'.$desped.'",""],["fapedido_com","'.$this->combo.'",""],["fapedido_fil","'.$this->fil1.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '5':
        $this->ajaxs='5';
        $this->precios=array();
        $javascript = "";
        $precioe=$this->getRequestParameter('precioe');
        $this->precios=FaartpvpPeer::getPrecios($codigo);
        if (count($this->precios)==0)
		{
		  $javascript=$javascript."$('$precioe').readOnly=false;";
		}
		$output = '[["javascript","' . $javascript . '",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
       break;
      case '6':
        $dateFormat = new sfDateFormat('es_VE');
	    $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

	    $c= new Criteria();
	    $c->add(FapedidoPeer::NROPED,$this->getRequestParameter('nroped'));
	    $data=FapedidoPeer::doSelectOne($c);
	    if ($data)
	    {
	      if ($fecha<$data->getFecped())
	      {
	      	$msj="alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha del Pedido'); $('fapedido_fecanu').value=''";
	      }
	      else { $msj=""; }	    }
	    else  { $msj=""; }
	    $output = '[["javascript","'.$msj.'",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
       break;
      case '7':
        $this->ajaxs='';
        $this->combo='1';
        $msj="";
        $this->fapedido = $this->getFapedidoOrCreate();
        $this->configGridArtPed('','',$this->getRequestParameter('codcom'));
        $output = '[["fapedido_com","'.$this->combo.'",""],["fapedido_fil","'.$this->fil1.'",""],["javascript","'.$msj.'",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       break;
    }


  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('CODCOM','Fadefcom','codcom',$this->getRequestParameter('fapedido[combo]'));
    }
  }


  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->fapedido = $this->getFapedidoOrCreate();
      try{ $this->updateFapedidoFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();
      if ($this->getRequestParameter('fapedido[tipref]')=='PR')
      {
        if ($this->getRequestParameter('fapedido[refped]')=='')
        {
         $this->coderror=1104;
         return false;
        }
      }

      if ($this->getRequestParameter('fapedido[codcli]')=='')
      {
      	$this->coderror7=1111;
         return false;
      }

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
      $x=$grid[0];
      $i=0;
      if (count($x)>0)
      {
	      while ($i<count($x))
	      {
	       if ($x[$i]->getCodart()=="")
	       {
	       	$this->coderror1=1105;
	       	return false;
	       }
	       if ($x[$i]->getCanord()=="0,00")
	       {
	       	$this->coderror2=1106;
	       	return false;
	       }
	       if ($this->getRequestParameter('fapedido[combo]')!='')
	       {
		       if ($x[$i]->getPreart(true)=="0.00")
		       {
		       	$this->coderror3=1107;
		       	return false;
		       }
	       }else
	       {
	       	   if ($x[$i]->getPreart()=="0.00")
		       {
		       	$this->coderror3=1107;
		       	return false;
		       }
	       }
	       $i++;
	      }
      }
      else
      {
        $this->coderror4=1108;
        return false;
      }

      $grid2=Herramientas::CargarDatosGridv2($this,$this->objfecped);
      $y=$grid2[0];
      $l=0;
      if (count($y)>0)
      {
        while($l<count($y))
        {
           if ($y[$l]->getFecent()=="")
	       {
	       	$this->coderror6=1110;
	       	return false;
	       }
          $l++;
        }
      }
      else
      {
      	$this->coderror5=1109;
      	return false;
      }
      return true;
    }else return true;
  }

  protected function saving($fapedido)
  {
  	if ($fapedido->getId())
  	{
  	  $fapedido->save();
  	}
  	else
  	{
     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
     $grid2=Herramientas::CargarDatosGridv2($this,$this->objfecped);
     Facturacion::salvarPedidos($fapedido,$grid,$grid2);
  	}
  	return -1;
  }

  protected function deleting($fapedido)
  {
    if ($fapedido->getStatus()!='N')
    {
     $c= new Criteria();
     $c->add(FaartpedPeer::NROPED,$fapedido->getNroped());
     FaartpedPeer::doDelete($c);

     $c= new Criteria();
     $c->add(FafecpedPeer::NROPED,$fapedido->getNroped());
     FafecpedPeer::doDelete($c);
     //$fapedido->delete();
     return -1;
    }else return 1112;
  }

   public function setVars()
  {
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->lonart=strlen($this->mascaraarticulo);
  }

    public function executeAnular()
  {
   $this->referencia=$this->getRequestParameter('referencia');
   $nroped=$this->getRequestParameter('nroped');
   $fecped=$this->getRequestParameter('fecped');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecped, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(FapedidoPeer::NROPED,$nroped);
   $c->add(FapedidoPeer::FECPED,$fec);
   $this->fapedido = FapedidoPeer::doSelectOne($c);
   sfView::SUCCESS;
   }

  public function executeSalvaranu()
  {
    $nroped=$this->getRequestParameter('nroped');
    $fecanu=$this->getRequestParameter('fecanu');
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msg="";
    $c= new Criteria();
    $c->add(FapedidoPeer::NROPED,$nroped);
    $resul= FapedidoPeer::doSelectOne($c);
    if ($resul)
    {
      $resul->setFecanu($fec);
      $resul->setStatus('N');
      $resul->save();
    }
    return sfView::SUCCESS;
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->params=array();
    $this->fapedido = $this->getFapedidoOrCreate();
    try{ $this->updateFapedidoFromRequest();}
    catch (Exception $ex){}
     $this->configGrid();
     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
     $grid2=Herramientas::CargarDatosGridv2($this,$this->objfecped);

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
        if($this->coderror!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('fapedido{refped}',$err1);
        }
        if($this->coderror1!=-1)
        {
         $err = Herramientas::obtenerMensajeError($this->coderror1);
         $this->getRequest()->setError(' ',$err);
        }
        if($this->coderror2!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror2);
         $this->getRequest()->setError('',$err1);
        }
        if($this->coderror3!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror3);
         $this->getRequest()->setError('',$err1);
        }
        if($this->coderror4!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror4);
         $this->getRequest()->setError('',$err1);
        }
        if($this->coderror5!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror5);
         $this->getRequest()->setError('',$err1);
        }
        if($this->coderror6!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror6);
         $this->getRequest()->setError('',$err1);
        }
        if($this->coderror7!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror7);
         $this->getRequest()->setError('fapedido{rifpro}',$err1);
        }
      }
    return sfView::SUCCESS;
  }

}
