<?php

/**
 * cobdocume actions.
 *
 * @package    siga
 * @subpackage cobdocume
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class cobdocumeActions extends autocobdocumeActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
     $this->configGridDto();
  }


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
           $a->add(FarecaudPeer::LIMREC,'S');
           $a->add(FarecaudPeer::CODTIPREC,$cliente->getCodtiprec());
           $a->add(FarecaudPeer::CODREC,$this->sql,Criteria::CUSTOM);
           $regi= FarecaudPeer::doSelectOne($a);
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
            if ($codcli=="")
            {
				$javascript="alert('Primero debe introducir el Cliente...')";
	            $cajmon='cobdocume_mondoc';
	            $output = '[["'.$cajmon.'","0,00",""],,["'.$cajsaldoc.'","0,00",""],["javascript","'.$javascript.'",""]]';
            }
            else
            {
	            $montodoc= $this->getRequestParameter('codigo',0);
	            $output = '[["'.$cajsaldoc.'","'.$montodoc.'",""]]';
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
	                     $deuda =$result[0]['cargos']-$result[0]['abonos'];
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
            $saldodocumento = $this->getRequestParameter('mondoc',0);
	        $montorgotab=CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo');
	        $monrgo=number_format($montorgotab,2,',','.');
	        $tiprgo=CarecargPeer::getDato($codigo,'tiprgo');
	        $reccal=SolicituddeEgresos::CalcularRecargos($tiprgo,$monrgo,$saldodocumento);
	        $reccalformat=number_format($reccal,2,',','.');
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
	         $dtocalformat=number_format($dtocal,2,',','.');
             $output = '[["'.$colmondto.'","'.$dtocalformat.'",""]]';

          break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $this->updateCobdocumeFromRequest();
    $this->configGrid();
    $this->configGridDto();
  }

  public function saving($cobdocume)
  {
    $cobdocume->setOridoc("CXC");
    $cobdocume->setNumcom("aaaa");
    $cobdocume->setFeccom("2009-05-05");
    if ($cobdocume->getId())
  	{
  	  $cobdocume->save();
  	}
  	else
  	{
     $grid=Herramientas::CargarDatosGridv2($this,$this->objrecargos);
     $grid2=Herramientas::CargarDatosGridv2($this,$this->objdescuentos);
     Cuentasxcobrar::salvarDocumentos($cobdocume,$grid,$grid2);
  	}
  	return -1;

  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  public function handleErrorEdit()
  {
    $this->updateError();


    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);

      }
    }
    return sfView::SUCCESS;
  }
}
