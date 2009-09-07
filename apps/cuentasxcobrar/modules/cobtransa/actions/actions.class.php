<?php

/**
 * cobtransa actions.
 *
 * @package    Roraima
 * @subpackage cobtransa
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cobtransaActions extends autocobtransaActions
{

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
     $this->configGrid();
     $this->cobtransa->afterHydrate();
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
  	 if ($this->cobtransa->getId())
  	 {
  	  $this->configGridDet($this->cobtransa->getNumtra());
  	  $this->configGridFormaPago($this->cobtransa->getNumtra());
  	 }
     else
     {
       $this->configGridDet($this->cobtransa->getNumtra(),$this->getRequestParameter('cobtransa[codcli]'));
       $this->configGridFormaPago($this->cobtransa->getNumtra(),$this->getRequestParameter('cobtransa[codcli]'));
     }

     $this->cobtransa->setFilasdet($this->filasdet);

     $this->cobtransa->setFilasfor($this->filasfor);
     $this->configGridRecargos($this->cobtransa->getNumtra(),$this->cobtransa->getCodcli());
     $this->configGridDescuento($this->cobtransa->getNumtra(),$this->cobtransa->getCodcli());
  }


   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDet($numtra="", $codcli="")
   {
     if ($codcli!="")
     {
	   $this->sql=" codcli='" .$codcli."' And (MonDoc + RecDoc - DscDoc - AboDoc) > 0 order by RefDoc";
	   $a= new Criteria();
	   $a->add(CobdocumePeer::STADOC,'A');
	   $a->add(CobdocumePeer::CODCLI,$this->sql,Criteria::CUSTOM);
	   $reg= CobdocumePeer::doSelect($a);
     }
     else
     {
       $a= new Criteria();
	   $a->add(CobdettraPeer::NUMTRA,$numtra);
	   $reg= CobdettraPeer::doSelect($a);
     }

     $this->filasdet=count($reg);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_documentos');
    if ($codcli!="")
    {
      $this->columnas[0]->setTabla('Cobdocume');
    }
    $this->columnas[1][5]->setHTML('size=10 onKeyPress=apagar(event,this.id);');
    $this->columnas[1][7]->setHTML('size=10 readonly=true onBlur=ValidarMontoGridv2(this); mostrar1(this.id);');
    $this->columnas[1][8]->setHTML('size=10 readonly=true onBlur=ValidarMontoGridv2(this); mostrar2(this.id);');



    $this->objdocumentos = $this->columnas[0]->getConfig($reg);
    $this->cobtransa->setObjdocumentos($this->objdocumentos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFormaPago($numtra='',$nuevo='')
   {
    $reg1=array();
    if ($nuevo!="")
    {
      $a= new Criteria();
      $reg1= FatippagPeer::doSelect($a);
    }
    else
    {
      $a= new Criteria();
      $a->add(CobdetforPeer::NUMTRA,$numtra);
      $reg1= CobdetforPeer::doSelect($a);
    }

    $this->filasfor=count($reg1);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_formapago');
    if ($nuevo!="")
    {
      $this->columnas[0]->setTabla('Fatippag');
    }
    $this->columnas[1][1]->setHTML('size=10 onKeyPress=montopagar(event,this.id);');
    $this->columnas[1][4]->setCombo($this->cobtransa->getBancos());
    //$this->columnas[1][4]->setHTML('disabled=true');
    $this->objformapagos = $this->columnas[0]->getConfig($reg1);

    $this->cobtransa->setObjformapagos($this->objformapagos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRecargos($numtra,$codcli)
   {
   	$reg=array();

     $c = new Criteria();
     $c->add(CobrectraPeer::NUMTRA,$numtra);
     $c->add(CobrectraPeer::CODCLI,$codcli);
     $reg =  CobrectraPeer::doSelect($c);


    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_recargos');
  /*if ($this->cobtransa->getId())
  {
    $this->columnas[0]->setFilas(0);
    $this->columnas[0]->setEliminar(false);
    $this->columnas[1][0]->setTipo(Columna::TEXTO);
    $this->columnas[1][0]->setAlineacionObjeto(Columna::CENTRO);
    $this->columnas[1][0]->setAlineacionContenido(Columna::CENTRO);
    $this->columnas[1][0]->setNombreCampo('coddesrec');
    $this->columnas[1][0]->setHTML('type="text" size="40" readonly=true');
    $this->columnas[1][1]->setHTML('readonly=true;');
  }else
  {*/
    $this->columnas[1][0]->setHTML('size=10 readonly=true onBlur=colocadoc(this.id);');
    $this->columnas[1][1]->setCombo($this->cobtransa->getRecargos());
    $this->columnas[1][1]->setHTML('onChange=recargos(this.id);');
    $this->columnas[1][2]->setHTML('size=10 onKeyPress=montorecarg(event,this.id);');
  //}
    $this->objrecargos = $this->columnas[0]->getConfig($reg);
    $this->cobtransa->setObjrecargos($this->objrecargos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDescuento($numtra='',$codcli='')
   {
   	$reg=array();

    $c = new Criteria();
    $c->add(CobdestraPeer::NUMTRA,$numtra);
    $c->add(CobdestraPeer::CODCLI,$codcli);
    $reg =  CobdestraPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobtransa/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_descuentos');

   /*if ($this->cobtransa->getId())
   {
    $this->columnas[0]->setFilas(0);
    $this->columnas[0]->setEliminar(false);
    $this->columnas[1][0]->setTipo(Columna::TEXTO);
    $this->columnas[1][0]->setAlineacionObjeto(Columna::CENTRO);
    $this->columnas[1][0]->setAlineacionContenido(Columna::CENTRO);
    $this->columnas[1][0]->setNombreCampo('coddesdto');
    $this->columnas[1][0]->setHTML('type="text" size="40" readonly=true');
    $this->columnas[1][1]->setHTML('readonly=true;');
   }else
   {*/
    $this->columnas[1][0]->setHTML('size=10 readonly=true onBlur=colocadoc(this.id);');
    $this->columnas[1][1]->setCombo($this->cobtransa->getDescuentos());
    $this->columnas[1][1]->setHTML('onChange=descuentos(this.id);');
    $this->columnas[1][2]->setHTML('size=10 onKeyPress=montodescuentos(event,this.id);');
    //$this->columnas[1][1]->setEsTotal(true,'cobdocume_dscdoc');
   //}

    $this->objdescuentos = $this->columnas[0]->getConfig($reg);
    $this->cobtransa->setObjdescuentos($this->objdescuentos);
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
    switch ($ajax){
	   case '1':
	   $this->ajax='1';
          $cajnompro = 'cobtransa_nompro';
          $cajrifpro = 'cobtransa_rifpro';
          $cajcodcli = 'cobtransa_codcli';
          $rifpro=""; $nompro=""; $javascript="";

          $c = new Criteria();
          $c->add(FaclientePeer::CODPRO,$codigo);
          $cliente = FaclientePeer::doSelectOne($c);
          if($cliente){
           $this->sql=" codcli='".$codigo."' And (MonDoc + RecDoc - DscDoc - AboDoc) > 0 order by RefDoc";
           $a= new Criteria();
		   $a->add(CobdocumePeer::STADOC,'A');
		   $a->add(CobdocumePeer::CODCLI,$this->sql,Criteria::CUSTOM);
		   $result= CobdocumePeer::doSelect($a);
           if ($result)
           {
           	$rifpro = $cliente->getRifpro();
        	$nompro = $cliente->getNompro();
        	$javascript="cargardatosfor();";
           }
           else
           {
           	$javascript="alert('No existen documentos por pagar para el Cliente o Empleado')";
           	$codigo="";
           }

          }
          else{
          	$javascript="alert('El Cliente no esta registrado')";
            $codigo="";
          }
        $this->cobtransa = $this->getCobtransaOrCreate();
        $this->configGridDet('',$codigo);
        $output = '[["'.$cajcodcli.'","'.$codigo.'",""],["'.$cajrifpro.'","'.$rifpro.'",""],["'.$cajnompro.'","'.$nompro.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $this->ajax='';
        $javascript="";
        $a= new Criteria();
        $reg1= FatippagPeer::doSelect($a);
        if (!$reg1) $javascript="alert('No existen formas de Pago definidas'); ";
        $this->cobtransa = $this->getCobtransaOrCreate();
        $this->configGridFormaPago('','a');
        $output = '[["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '3':
        if ($codigo!="")
        {
          $documento=$this->getRequestParameter('doc');
          $codcta=$this->getRequestParameter('codcta');
          $monrec=$this->getRequestParameter('monrec');
          $monori=$this->getRequestParameter('monori');
          $javascript="";
          $a= new Criteria();
          $a->add(CarecargPeer::CODRGO,$codigo);
          $result= CarecargPeer::doSelectOne($a);
          if ($result)
          {
          	$cuenta=$result->getCodcta();
            if ($result->getTiprgo()=='P')
            {
             $valmonrec=(($result->getMonrgo()*$monori)/100);
             $montorec=number_format($valmonrec,2,',','.');
             //$javascript="sumar_recargos('$documento');";
            }
            else
            {
              $valmonrec=$result->getMonrgo();
              $montorec=number_format($valmonrec,2,',','.');
              //$javascript="sumar_recargos('$documento');";
            }
          }
          else
          {
            $montorec="0,00"; $cuenta="";
          	$javascript="alert('Se Debe Incluir el Tipo de Recargo Primero');";
          }
        }

        $output = '[["'.$monrec.'","'.$montorec.'",""],["'.$codcta.'","'.$cuenta.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '4':
        if ($codigo!="")
        {
          $documento=$this->getRequestParameter('doc');
          $codcta=$this->getRequestParameter('codcon');
          $mondes=$this->getRequestParameter('mondes');
          $monori=$this->getRequestParameter('monori');
          $javascript="";
          $a= new Criteria();
          $a->add(FadesctoPeer::CODDESC,$codigo);
          $result= FadesctoPeer::doSelectOne($a);
          if ($result)
          {
            $cuenta=$result->getCodcta();
            if ($result->getTipdesc()=='P')
            {
     	      $valmondes=(($result->getMondesc()*$monori)/100);
     	      $mondesc=number_format($valmondes,2,',','.');
     	      //$javascript="sumar_descuentos('$documento');";
            }
            else
            {
              $valmondes=$result->getMondesc();
     	      $mondesc=number_format($valmondes,2,',','.');
     	      //$javascript="sumar_descuentos('$documento');";
            }
          }
          else
          {
          	$javascript="alert('Se Debe Incluir el Tipo de Descuento Primero');";
          }
        }
        $output = '[["'.$mondes.'","'.$mondesc.'",""],["'.$codcta.'","'.$cuenta.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '5':
	        $dateFormat = new sfDateFormat('es_VE');
		    $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

		    $c= new Criteria();
		    $c->add(CobtransaPeer::NUMTRA,$this->getRequestParameter('numtra'));
		    $data=CobtransaPeer::doSelectOne($c);
		    if ($data)
		    {
		      if ($fecha<$data->getFectra())
		      {
		        $msj="alert('La Fecha de Anulacion no puede ser menor a la fecha de la Transaccion'); $('cobtransa_fecanu').value=''";
		      }
		      else
		      {
		        $msj="";
		        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
		        {
		          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('cobtransa_fecanu').value=''; $('cobtransa_fecanu').focus(); ";
		        }
		        else { $msj=""; }
		      }
		    }
		    else
		    {
		      $msj="";
		    }
		    $output = '[["javascript","'.$msj.'",""]]';
		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;
      case '6':
        $dato=TstipmovPeer::getDestip($codigo);
        $output = '[["cobtransa_destip","'.$dato.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
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
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
     $this->cobtransa = $this->getCobtransaOrCreate();
      try{ $this->updateCobtransaFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();
      $gridfor=Herramientas::CargarDatosGridv2($this,$this->objformapagos);
      $gridpag = Herramientas::CargarDatosGridv2($this,$this->objdocumentos);

      if ($this->getRequestParameter('cobtransa[fectra]')!="")
      {
	      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('cobtransa[fectra]'))==true)
	  	  {
	        $this->coderr=529;
	        return false;
	  	  }
      }

      if ($this->cobtransa->getTottra()<=0)
      {
        $this->coderr=1800;
        return false;
      }

      if ($this->cobtransa->getMonpagado()<=0)
      {
        $this->coderr=1801;
        return false;
      }

	$varemp = $this->getUser()->getAttribute('configemp');
  	$this->gencom = 'S';
  	if(is_array($varemp))
	if(array_key_exists('aplicacion',$varemp))
		if(array_key_exists('cuentasxcobrar',$varemp['aplicacion']))
			if(array_key_exists('modulos',$varemp['aplicacion']['cuentasxcobrar']))
				if(array_key_exists('cobtransa',$varemp['aplicacion']['cuentasxcobrar']['modulos']))
				{

					if(array_key_exists('gencom',$varemp['aplicacion']['cuentasxcobrar']['modulos']['cobtransa']))
 						$this->gencom = $varemp['aplicacion']['cuentasxcobrar']['modulos']['cobtransa']['gencom'];
				}

     if ($this->gencom=="S"){
	      if (self::validarGeneraComprobante())
	      {
		    $this->coderr=508;
		    return false;
		  }
     }
      $x=$gridfor[0];
      $i=0;
      if (count($x)==0)
      {
      	while($i<count($x))
      	{
      		if ($x[$i]->getMonpag()>0)
      		{
      		  $o= new Criteria();
      		  $o->add(FatippagPeer::ID,$x[$i]->getFatippagId());
      		  $resul= FatippagPeer::doSelectOne($o);
      		  if ($resul)
      		  {
      		  	if ($resul->getGenmov()=='S')
      		  	{
      		  		if ($x[$i]->getNumide2()=="" && $x[$i]->getCodban()=="")
      		  		{
      		           $this->coderr=1802;
                       return false;
      		  		}
      		  	}
      		  }

      		}
      		$i++;
      	}

      }

      $y=$gridpag[0];
      $l=0;
      if (count($y)==0)
      {
      	while($l<count($y))
      	{
      		if ($y[$l]->getMonpag()>0)
      		{
      		  $o= new Criteria();
      		  $o->add(CobdocumePeer::REFDOC,$y[$l]->getRefdoc());
      		  $o->add(CobdocumePeer::CODCLI,$this->cobtransa->getCodcli());
      		  $resul= CobdocumePeer::doSelectOne($o);
      		  if ($resul)
      		  {
      		  	$reffac=$resul->getReffac();
      		  	if ($reffac!='')
      		  	{
      		  		if ($this->cobtransa->getHayingreso()=='S')
      		  		{
      		  		  $q= new Criteria();
      		  		  $q->add(OpbenefiPeer::CEDRIF,$this->cobtransa->getRifpro());
      		  		  $resul2= OpbenefiPeer::doSelectOne($q);
      		  		  if (!$resul)
      		  		  {
      		  		  	$this->coderr=1803;
                        return false;
      		  		  }

      		  		}
      		  	}
      		  }

      		}
      		$i++;
      	}

      }


      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  public function updateError()
  {
    $this->configGrid();

    $grid1 = Herramientas::CargarDatosGridv2($this,$this->objdocumentos);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->objformapagos);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->objrecargos);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
  }

   protected function saving($cobtransa)
  {
  	if ($cobtransa->getId())
  	{
       $cobtransa->save();
  	}
  	else
  	{
  	  $numcom=null;
  	  $form="sf_admin/cobtransa/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        $concom=$this->getRequestParameter('cobtransa[totalcomprobantes]');
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

     	$grid1 = Herramientas::CargarDatosGridv2($this,$this->objdocumentos);
     	$grid2 = Herramientas::CargarDatosGridv2($this,$this->objformapagos);
	    $grid3 = Herramientas::CargarDatosGridv2($this,$this->objrecargos);
	    $grid4 = Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
   	    Cuentasxcobrar::salvarTransacciones($cobtransa,$grid1,$grid2,$grid3,$grid4,$numcom);
  	}
    return -1;

  }

  protected function deleting($cobtransa)
  {
  	if (!Cuentasxcobrar::verificarHijos($cobtransa->getNumtra(),&$msj))
    {
      $q= new Criteria();
      $q->add(ContabcPeer::NUMCOM,$cobtransa->getNumcom());
      $q->add(ContabcPeer::FECCOM,$cobtransa->getFeccom());
      $dat= ContabcPeer::doSelectOne($q);
      if ($dat)
      {
      	$q1= new Criteria();
        $q1->add(Contabc1Peer::NUMCOM,$cobtransa->getNumcom());
        $q1->add(Contabc1Peer::FECCOM,$cobtransa->getFeccom());
        Contabc1Peer::doDelete($q1);
        $dat->delete();
      }

      Cuentasxcobrar::eliminarMovlibTrassacion($cobtransa->getNumtra());
  	  Herramientas::EliminarRegistro('Cobrectra','Numtra',$cobtransa->getNumtra());
  	  Herramientas::EliminarRegistro('Cobdestra','Numtra',$cobtransa->getNumtra());
  	  Herramientas::EliminarRegistro('Cobdetfor','Numtra',$cobtransa->getNumtra());
  	  Cuentasxcobrar::actualizaTransacion($cobtransa->getNumtra(),$cobtransa->getFectra(),$cobtransa->getCodcli());
  	  Herramientas::EliminarRegistro('Cobdettra','Numtra',$cobtransa->getNumtra());
  	  $cobtransa->delete();
  	  return -1;

    }else
    {
      return 1804;
    }
  }

  public function executeAnular()
  {
   $this->referencia=$this->getRequestParameter('referencia');
   $numtra=$this->getRequestParameter('numtra');
   $fectra=$this->getRequestParameter('fectra');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CobtransaPeer::NUMTRA,$numtra);
   $c->add(CobtransaPeer::FECTRA,$fec);
   $this->cobtransa = CobtransaPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $numtra=$this->getRequestParameter('numtra');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $this->msg='';
    $this->mensaje2="";
    if (Tesoreria::validaPeriodoCerrado($fecanu)==true)
   {
     $coderror=529;
     $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
     return sfView::SUCCESS;
   }else {
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(CobtransaPeer::NUMTRA,$numtra);
    $resul= CobtransaPeer::doSelectOne($c);
    if ($resul)
    {
      if ($fec>=$resul->getFectra())
      {
        if (!Cuentasxcobrar::verificarHijos($numtra,&$msj))
        {
          Cuentasxcobrar::actualizaTransacion($numtra,$resul->getFectra(),$resul->getCodcli());

          $resul->setFecanu($fec);
          $resul->setDesanu($desanu);
          $resul->setStatus('N');
          $resul->save();

         Cuentasxcobrar::anularComprobante($resul->getNumcom(),$resul->getFeccom());
         Cuentasxcobrar::anularMovlib($numtra,$fec);

        }
        else
        {
          $this->msg=$msj;
          return sfView::SUCCESS;
        }
      }
      else
      {
        $this->msg="Transaccion no se puede Anular con una Fecha Menor a la de Emision";
        return sfView::SUCCESS;
      }
    }
   }
    return sfView::SUCCESS;
  }


     /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->cobtransa = $this->getCobtransaOrCreate();
     $this->updateCobtransaFromRequest();
     $concom=0; $msjuno=""; $msjtres=""; $comprobante=""; $this->msjuno=""; $this->msjtres=""; $this->i=""; $this->formulario=array();
     $this->configGrid();
     $formapagos=Herramientas::CargarDatosGridv2($this,$this->objformapagos);
     $recargos=Herramientas::CargarDatosGridv2($this,$this->objrecargos);
     $descuentos=Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
     if ($this->cobtransa->getCodcli()=="" || count($formapagos[0])==0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Cliente ó los Documentos, para luego generar el comprobante";
     }

     if ($msjtres=="")
     {
      $x=Cuentasxcobrar::generarComprobante($this->cobtransa,$formapagos,$recargos,$descuentos,&$msjuno,&$comprobante);
      $concom=$concom + 1;

      if ($msjuno=="")
      {
	      $form="sf_admin/cobtransa/confincomgen";
	      $i=0;
	      while ($i<$concom)
	      {
	       $f[$i]=$form.$i;
	       $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
	       $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
	       $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
	       $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
	       $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
	       $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
	       $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
	       $this->getUser()->setAttribute('tipmov', '');
	       $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
	       $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
	       $i++;
	      }
	      $this->i=$concom-1;
	      $this->formulario=$f;
	      }else
	      {
	        $this->msjuno=$msjuno;
	      }
     }
     else
     {
        $this->msjtres=$msjtres;
     }
      $output = '[["cobtransa_totalcomprobantes","'.$concom.'",""],["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

   public function validarGeneraComprobante()
  {
    $form="sf_admin/cobtransa/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }

}
