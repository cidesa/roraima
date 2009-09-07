<?php

/**
 * cobdocume actions.
 *
 * @package    Roraima
 * @subpackage cobdocume
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cobdocumeActions extends autocobdocumeActions
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
     $this->configGridDto();
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
   	$reg=array();
   	if ($this->cobdocume->getId())
   	{
	    $c = new Criteria();
	    $c->add(CobrecdocPeer::CODCLI,$this->cobdocume->getCodcli());
	    $c->add(CobrecdocPeer::REFDOC,$this->cobdocume->getRefdoc());
	    $reg =  CobrecdocPeer::doSelect($c);;
   	}

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobdocume/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_recargos');
  if ($this->cobdocume->getId())
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
  {
    $this->columnas[1][0]->setCombo($this->cobdocume->getRecargos());
    $this->columnas[1][0]->setHTML('onChange=CalculaRecargos(this.id);');
    $this->columnas[1][1]->setEsTotal(true,'cobdocume_recdoc');
  }
    $this->objrecargos = $this->columnas[0]->getConfig($reg);
    $this->cobdocume->setObjrecargos($this->objrecargos);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDto()
   {
   	$reg=array();
   	if ($this->cobdocume->getId())
   	{
	    $c = new Criteria();
	    $c->add(CobdesdocPeer::CODCLI,$this->cobdocume->getCodcli());
	    $c->add(CobdesdocPeer::REFDOC,$this->cobdocume->getRefdoc());
	    $reg =  CobdesdocPeer::doSelect($c);;
   	}

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/cobdocume/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_descuentos');

   if ($this->cobdocume->getId())
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
   {
    $this->columnas[1][0]->setCombo($this->cobdocume->getDescuentos());
    $this->columnas[1][0]->setHTML('onChange=CalculaDescuentos(this.id);');
    $this->columnas[1][1]->setEsTotal(true,'cobdocume_dscdoc');
   }

    $this->objdescuentos = $this->columnas[0]->getConfig($reg);
    $this->cobdocume->setObjdescuentos($this->objdescuentos);
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
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
          $cajnompro = 'cobdocume_nompro';
          $cajrifpro = 'cobdocume_rifpro';
          $cajcodcli = 'cobdocume_codcli';


          $c = new Criteria();
          $c->add(FaclientePeer::CODPRO,$codigo);

          $cliente = FaclientePeer::doSelectOne($c);

          if($cliente){
          	//verificar si el cliente tiene todos los recaudos
           $this->sql="CODREC NOT IN (SELECT CODREC FROM COBRECCLI WHERE CODCLI='".$cliente->getCodpro()."')";
           $a= new Criteria();
           $a->add(CarecaudPeer::LIMREC,'S');
           $a->add(CarecaudPeer::CODTIPREC,$cliente->getCodtiprec());
           $a->add(CarecaudPeer::CODREC,$this->sql,Criteria::CUSTOM);
           $regi= CarecaudPeer::doSelectOne($a);
           if (!$regi)
           {
            $rifpro = $cliente->getRifpro();
        	$nompro = $cliente->getNompro();
            $output = '[["'.$cajrifpro.'","'.$rifpro.'",""],["'.$cajnompro.'","'.$nompro.'",""]]';
           }
           else
           {
           	$javascript="alert('El Cliente no ha consignado todos los recaudos limitantes');";
           	$output = '[["'.$cajcodcli.'","",""],["'.$cajrifpro.'","",""],["'.$cajnompro.'","",""],["javascript","'.$javascript.'",""]]';
           }

          }
          else{
          	$javascript="alert('El Cliente no esta registrado')";
            $output = '[["'.$cajcodcli.'","",""],["'.$cajrifpro.'","",""],["'.$cajnompro.'","",""],["javascript","'.$javascript.'",""]]';
          }

        break;
      case '2':
            $output = '[["","",""],["","",""],["","",""]]';
            $codcli = $this->getRequestParameter('codcli','');
            $cajsaldoc = 'cobdocume_saldoc';
            $cajrecdoc = 'cobdocume_recdoc';
            if ($codcli=="")
            {
				$javascript="alert('Primero debe introducir el Cliente...')";
	            $cajmon='cobdocume_mondoc';
	            $output = '[["'.$cajmon.'","0,00",""],["'.$cajsaldoc.'","0,00",""],["javascript","'.$javascript.'",""]]';
            }
            else
            {
	            $montodoc= $this->getRequestParameter('codigo',0);
	            $output = '[["'.$cajsaldoc.'","'.$montodoc.'",""]]';
	            $montodoc=H::convnume($montodoc);
	            $c = new Criteria();
	       		$c->add(FaclientePeer::CODPRO,$codcli);
	       		$cliente = FaclientePeer::doSelectOne($c);
	            if($cliente)
	            {
	              $limcre=$cliente->getLimcre();
	            }
	            $sql = "Select * From CobDocume Where StaDoc='A' and CodCli = '" .$codcli."'";
	            if (Herramientas::BuscarDatos($sql,&$result))
	            {
	 				  $sqla = "Select Sum(MonDoc) as cargos, Sum(AboDoc) as abonos From CobDocume Where StaDoc='A' and CodCli ='" .$codcli."'";
	                  if (Herramientas::BuscarDatos($sqla,&$resulta))
	                  {
	                     $deuda =$resulta[0]['cargos']-$resulta[0]['abonos'];
	                  }
	                  $deudatotal=$deuda +$montodoc;

	                  if ($deudatotal>$limcre)
	                  {
	                  	$javascript="alert('Ya excedio el límite de crédito')";
	                  	$cajmon='cobdocume_mondoc';
	                    $output = '[["'.$cajmon.'","0,00",""],["'.$cajsaldoc.'","0,00",""],["javascript","'.$javascript.'",""]]';
	                  }
	            }
	            else
	            {
	            	 if ($montodoc>$limcre)
	                  {
	            	    $javascript="alert('Ya excedio el límite de crédito')";
	                  	$cajmon='cobdocume_mondoc';
	                    $output = '[["'.$cajmon.'","0,00",""],["'.$cajsaldoc.'","0,00",""],["javascript","'.$javascript.'",""]]';
	                  }
	            }
            }//else  if ($codcli=="")
           break;
           case '3':
            $output = '[["","",""],["","",""],["","",""]]';
            $reccalformat=0;
            $colmonrec = $this->getRequestParameter('monrec','');
            $saldodocumento = H::FormatoNum($this->getRequestParameter('mondoc',0));
	        $montorgotab=CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo');
	        $monrgo=H::FormatoNum($montorgotab);
	        $tiprgo=CarecargPeer::getDato($codigo,'tiprgo');
	       $reccal=SolicituddeEgresos::CalcularRecargos($tiprgo,$monrgo,$saldodocumento);

	        $reccalformat=H::FormatoMonto($reccal);
            $output = '[["'.$colmonrec.'","'.$reccalformat.'",""]]';
           break;
          case '4':
                $output = '[["","",""],["","",""],["","",""]]';
                $colmondto = $this->getRequestParameter('mondes','');
                $saldodocumento = $this->getRequestParameter('mondoc',0);
                $salrecargos = $this->getRequestParameter('monrec',0);
                $dtocal=0;
	            $c = new Criteria();
	       		$c->add(FadesctoPeer::CODDESC,$codigo);
	       		$datos = FadesctoPeer::doSelectOne($c);
	            if($datos)
	            {
	                $tipopagodescuento = $datos->getTipdesc();
            		$montotipodescuento = $datos->getMondesc();
            		$esretencion =$datos->getTiprec();
	            }

	           if ($tipopagodescuento=="P")
	           {
	            if  ($esretencion=="S")
	               $dtocal =(($montotipodescuento * $salrecargos)/100);
	            else
	               $dtocal =(($montotipodescuento * $saldodocumento)/100);
	           }
	          else
	          {
	            $dtocal=$datos->getMondesc();
	          }
	         $dtocalformat=H::FormatoMonto($dtocal);
             $output = '[["'.$colmondto.'","'.$dtocalformat.'",""]]';

           break;
          case '5':
	        $dateFormat = new sfDateFormat('es_VE');
		    $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

		    $c= new Criteria();
		    $c->add(CobdocumePeer::REFDOC,$this->getRequestParameter('refdoc'));
		    $data=CobdocumePeer::doSelectOne($c);
		    if ($data)
		    {
		      if ($fecha<$data->getFecemi())
		      {
		        $msj="alert('La Fecha de Anulacion no puede ser menor a la fecha del Documento'); $('cobdocume_fecanu').value=''; $('cobdocume_fecanu').focus();";
		      }
		      else
		      {
		        $msj="";
		        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
		        {
		          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('cobdocume_fecanu').value=''; $('cobdocume_fecanu').focus(); ";
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
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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

      if ($this->getRequestParameter('cobdocume[fecemi]')!="")
      {
	      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('cobdocume[fecemi]'))==true)
	  	  {
	        $this->coderr=529;
	  	  }
      }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;

  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->cobdocume= $this->getCobdocumeOrCreate();
    try{
    	$this->updateCobdocumeFromRequest();
        $this->configGrid();
    	$this->configGridDto();

    	$grid = Herramientas::CargarDatosGridv2($this,$this->objrecargos);
    	$grid = Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
    }
      catch (Exception $ex){
      	return 0;
      }
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($cobdocume)
  {
    $numerocomp="";
    if ($cobdocume->getId())
  	{
  	  $cobdocume->save();
  	}
  	else
  	{
      ///////////////PARA GRABAR EL COMPROBANTE ////////////////////////
      $numcom=null;
  	  $form="sf_admin/cobdocume/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        $concom=$cobdocume->getTotalcomprobantes();
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

          $numerocomp = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));
          $i++;
         }
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
      /////////////////////////////////////////////////
     $cobdocume->setOridoc("CXC");
     if ($numerocomp!="") $cobdocume->setNumcom($numerocomp);
     $cobdocume->setFeccom($cobdocume->getFecemi());
     $grid=Herramientas::CargarDatosGridv2($this,$this->objrecargos);
     $grid2=Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
     Cuentasxcobrar::salvarDocumentos($cobdocume,$grid,$grid2);
  	}
  	return -1;

  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->cobdocume= $this->getCobdocumeOrCreate();
     $this->updateCobdocumeFromRequest();
     $this->editing();
     $c = new Criteria();
     $c->add(FaclientePeer::CODPRO,$this->cobdocume->getCodcli());
     $cliente = FaclientePeer::doSelectOne($c);
     if ($cliente) $this->cobdocume->setCodctacli($cliente->getCodcta());

     $grid=Herramientas::CargarDatosGridv2($this,$this->objrecargos);
     $grid2=Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
     $mensaje="";
     $comprobante="";
     $concom=0; $msjuno=""; $msjdos=""; $comprobante="";
     $this->msjuno="";$this->msjdos="";
     $this->i="";
     $this->formulario=array();


     if ($this->cobdocume->getRefdoc()=="" || $this->cobdocume->getCodcli()=="" || $this->cobdocume->getFecemi()=="" || $this->cobdocume->getFecVen()==""|| $this->cobdocume->getDesdoc()==""|| $this->cobdocume->getFatipmovId()=="" || $this->cobdocume->getMondoc()==0)
     {
       $this->mensaje="No se puede Generar el Comprobante, Verique si introdujo todos los Datos: Cod. del Cliente, Referencia del Documento, Fecha Emisión, Fecha Vencimiento, Descripcion, Tipo de Movimiento,  y Saldo Original, para luego generar el comprobante";
     }


     if ($this->mensaje=="")
     {

      Cuentasxcobrar::generar_comprobante($this->cobdocume,$grid,$grid2,&$comprobante);
      $concom=$concom + 1;

      if ($msjuno=="")
      {
	      $form="sf_admin/cobdocume/confincomgen";
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
        $this->msjdos=$msjdos;
     }
      $output = '[["cobdocume_totalcomprobantes","'.$concom.'",""],["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

   /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->cobdocume = $this->getCobdocumeOrCreate();
    $this->updateCobdocumeFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('cobdocume{fecemi}',$err);
      }
    }
    return sfView::SUCCESS;
  }

   public function executeAnular()
  {
   $refdoc=$this->getRequestParameter('refdoc');
   $fecemi=$this->getRequestParameter('fecdoc');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CobdocumePeer::REFDOC,$refdoc);
   $c->add(CobdocumePeer::FECEMI,$fec);
   $this->cobdocume = CobdocumePeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $refdoc=$this->getRequestParameter('refdoc');
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
    $c->add(CobdocumePeer::REFDOC,$refdoc);
    $resul= CobdocumePeer::doSelectOne($c);
    if ($resul)
    {
      if ($resul->getAbodoc()<=0){

      if ($fec>=$resul->getFecemi())
      {
          $r= new Criteria();
          $r->add(ContabcPeer::NUMCOM,$resul->getNumcom());
          $r->add(ContabcPeer::FECCOM,$resul->getFeccom());
          $datos= ContabcPeer::doSelectOne($r);
          if ($datos)
          {
          	if ($datos->getStacom()=='D')
          	{
              Cuentasxcobrar::anularDocumento($resul->getRefdoc(),$fec,$desanu);
              Cuentasxcobrar::anularComprobanteDoc($resul->getNumcom(),$fec);
          	}else
          	{
          	   $this->msg="El Documento no se puede Anular por tener el Comprobante Actualizado";
               return sfView::SUCCESS;
          	}
          }else{
            Cuentasxcobrar::anularDocumento($resul->getRefdoc(),$fec,$desanu);
            Cuentasxcobrar::anularComprobanteDoc($resul->getNumcom(),$fec);
          }
      }
      else
      {
        $this->msg="El Documento no se puede Anular con una Fecha Menor a la de Emision";
        return sfView::SUCCESS;
      }
      }else{
      	$this->msg="El Documento no se puede Anular por tener un Abono";
        return sfView::SUCCESS;
      }
    }
   }
    return sfView::SUCCESS;
  }

}
