<?php


/**
 * fafactur actions.
 *
 * @package    Roraima
 * @subpackage fafactur
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 39065 2010-06-18 14:30:15Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fafacturActions extends autofafacturActions {
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
  public function editing() {
		if ($this->getUser()->getAttribute('clavecaja', null, 'fafactur') != "") {
			if($this->fafactur->getId()=='')
	        {
			$c = new Criteria();
			$c->add(FadefcajPeer :: ID, $this->getUser()->getAttribute('clavecaja', null, 'fafactur'));
			$reg = FadefcajPeer :: doSelectOne($c);
			if ($reg) {
				$r = $reg->getCorcaj();
                                $enc=false;
                                while (!$enc)
                                {
                                    $correl = str_pad($r, 8, '0', STR_PAD_LEFT);
                                    $t= new Criteria();
                                    $t->add(FafacturPeer::REFFAC,$correl);
                                    $res=FafacturPeer::doSelectOne($t);
                                    if ($res)
                                    {
                                      $r=$r+1;
                                    }else $enc=true;
                                }
				$this->fafactur->setReffac($correl);
			}
	        }
		}
		if($this->fafactur->getId())
	    {
    	  if ($this->fafactur->getStatus()=='N')
          {
          	if ($this->fafactur->getFecanu()!='')
           	$eti="ANULADA EL ".date('d/m/Y',strtotime($this->fafactur->getFecanu()));
           	else $eti="ANULADA ";
          	$this->fafactur->setEstatus($eti);
          }

              $t= new Criteria();
              $t->add(FaajustePeer::CODREF,$this->fafactur->getReffac());
              $resultado= FaajustePeer::doSelectOne($t);
              if ($resultado)
              {
                $etinc="N° N/C: ".$resultado->getRefaju().", Fecha: ".date('d/m/Y',strtotime($resultado->getFecaju()));
                $this->fafactur->setNotacredito($etinc);
	    }

	    }
		$c = new Criteria();
		$dato = CadefartPeer :: doSelectOne($c);
		if ($dato) {
			if ($dato->getApliclades() == 'S') {
				$this->fafactur->setApliclades('S');
			} else
				$this->fafactur->setApliclades('N');
		} else
			$this->fafactur->setApliclades('N');
		$this->fafactur->setReapor($this->getUser()->getAttribute('loguse', null));
		$this->setVars();
		$this->fafactur->setLonart($this->lonart);
		$this->fafactur->setDespnotent($this->despnotent);

		$this->configGrid();
	}

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->fafactur = $this->getFafacturOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFafacturFromRequest();

      if($this->saveFafactur($this->fafactur) ==-1){
        {
          if ($this->fafactur->getTipconpag()=='R')
          {
          	$sql="Select coalesce(Sum(MonDoc+RecDoc-DscDoc-AboDoc),0) as monto from CobDocume where CodCli='".$this->fafactur->getCodcli()."' Group by CodCli";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
            	if (count($result)>0)
            	{
                    $cal=H::tofloat($result[0]["monto"]) + $this->fafactur->getMonfac() - $this->fafactur->getMondesc();
                    if ($cal>H::tofloat($this->fafactur->getLimitecredito()))
                    {
                          $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
                    }else $this->setFlash('notice', 'Your modifications have been saved');
            	}else{
            	  $cal=$this->fafactur->getMonfac() - $this->fafactur->getMondesc();
	            	if ($cal>H::tofloat($this->fafactur->getLimitecredito()))
	            	{
	            	   $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
	            	}else $this->setFlash('notice', 'Your modifications have been saved');
            	}
            }
            else
            {
               $cal=$this->fafactur->getMonfac() - $this->fafactur->getMondesc();
            	if ($cal>H::tofloat($this->fafactur->getLimitecredito()))
            	{
            	   $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
            	}else $this->setFlash('notice', 'Your modifications have been saved');
            }
          }else $this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->fafactur->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('fafactur/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('fafactur/list');
        }
        else
        {
            return $this->redirect('fafactur/edit?id='.$this->fafactur->getId());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid() {
		$this->configGridArtFac($this->fafactur->getReffac(), $this->fafactur->getTipref());
		$this->configGridDescFac($this->fafactur->getReffac());
		$this->configGridForPag($this->fafactur->getReffac());
		$this->configGridRgoArt($this->fafactur->getReffac());
		$this->configGridPedDes($this->fafactur->getTipref(), $this->fafactur->getCodcli());
                $this->configGridFaclib($this->fafactur->getReffac());
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridArtFac($reffac = '', $tipref='',$tipo='') {
		$c = new Criteria();
                if($tipo=='PROFORMA')
                {
                    $c->add(FaartfacproPeer :: REFFAC, $reffac);
                    $c->add(FaartfacproPeer :: ESTATUS, 'A');
                    $artfac = FaartfacproPeer :: doSelect($c);
                }else
                {
                    $c->add(FaartfacPeer :: REFFAC, $reffac);
                    $artfac = FaartfacPeer :: doSelect($c);
                }
		$mascara = $this->mascaraarticulo;
		$lonarti = $this->lonart;
		$obj = array (
			'codart' => 3,
			'desart' => 4
		);
		$params = array (
			'param1' => $lonarti,
			'val2'
		);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_faartfacv2');

		if ($tipref!="" && ($tipref=='P'))
		{
		  $this->columnas[0]->setAncho(1400);
		  $this->columnas[1][2]->setHTML('type="text" size="17" readonly=true');
		  $this->columnas[1][6]->setHTML('readonly=true onKeyPress=cansol(event,this.id);');
          $this->columnas[1][6]->setOculta(false);
		  $this->columnas[1][7]->setOculta(false);
          $this->columnas[1][8]->setOculta(true);
          $this->columnas[1][7]->setHTML('size="10" onKeyPress=canentregar(event,this.id);');
		}
        else if ($tipref!="" && ($tipref=='D' || $tipref=='VC'))
		{
		  $this->columnas[1][2]->setHTML('type="text" size="17" readonly=true');
		  $this->columnas[1][6]->setOculta(true);
		  $this->columnas[1][7]->setOculta(true);
          $this->columnas[1][8]->setOculta(false);
          $this->columnas[1][8]->setHTML(' size="10" onKeyPress=candespachar(event,this.id);');
		}
		else
		{
          $this->columnas[1][2]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);" onBlur="javascript:event.keyCode=13; ajaxarticulosfactura(event,this.id);"');
		  $this->columnas[1][2]->setCatalogo('caregart', 'sf_admin_edit_form', $obj, 'Caregart_Fapedido', $params);
		  $this->columnas[1][6]->setHTML('size="10" onKeyPress=cansol(event,this.id);');
		}
		$this->columnas[0]->setEliminar(true,'montoTotal()');
        $this->columnas[1][0]->setHTML('onClick="marcardesc(this.id)"');
		$this->columnas[1][9]->setCombo(FaartpvpPeer :: getPrecios());
		$this->columnas[1][9]->setHTML('onChange=Precio3(this.id);');
		$this->columnas[1][10]->setHTML('size="10" readonly=true onKeyPress=Precio2(event,this.id);');
		$this->columnas[1][11]->setHTML(' size="10" onKeyPress=montorecargo(event,this.id);');
		#$this->columnas[1][11]->setEsTotal(true, 'fafactur_totmonrgo');
		#$this->columnas[1][12]->setEsTotal(true, 'fafactur_tottotart');
         if ($this->cambiolog!="S")
         {
         	/*$this->columnas[1][23]->setOculta(true);
         	$this->columnas[1][24]->setOculta(true);
         	$this->columnas[1][25]->setOculta(true);
         	$this->columnas[1][26]->setOculta(true);*/
         }else $this->columnas[0]->setAncho(1800);

         $this->columnas[1][33]->setCombo(array('L'=>'Largo','C'=>'Corto'));
		$this->obj1 = $this->columnas[0]->getConfig($artfac);

		$this->fafactur->setObj1($this->obj1);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDescFac($reffac = '', $tipo='', $tipcliente = '', $arreglo = array ()) {
		if ($tipcliente != '') {
			$descart = $arreglo;
		} else {
                    $c = new Criteria();
		    if ($tipo=='PROFORMA')
                    {                        
                        $c->add(FadescartproPeer :: REFDOC, $reffac);
                        $dreg = FadescartproPeer :: doSelect($c);
                        foreach ($dreg as $obj)
                        {
                          $fadescart2= new Fadescart();
                          $fadescart2->setCoddesc($obj->getCoddesc());
                          $fadescart2->setDesdesc($obj->getDesdesc());
                          $fadescart2->setMondesc($obj->getMondesc());
                          $fadescart2->setCodcta($obj->getCodcta());
                          $fadescart2->setCantidad(0);
                          $fadescart2->setMontdesc($obj->getMontdesc());
                          $fadescart2->setTipdesc($obj->getTipdesc());
                          $fadescart2->setTipret($obj->getTipret());                          
                          $descart[]=$fadescart2;
                        }
                    }else {                        
                        $c->add(FadescartPeer :: REFDOC, $reffac);
                        $descart = FadescartPeer :: doSelect($c);
                    }
		}

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fadescart');
		$this->columnas[1][0]->setHTML('onBlur="javascript:event.keyCode=13; ajaxdescuentos(event,this.id);"');
		$this->columnas[1][2]->setHTML('onKeyPress=calcularMondesc(event,this.id);');
		$this->obj2 = $this->columnas[0]->getConfig($descart);

		$this->fafactur->setObj2($this->obj2);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridForPag($reffac = '') {
		$c = new Criteria();
		$c->add(FaforpagPeer :: REFFAC, $reffac);
		$forpag = FaforpagPeer :: doSelect($c);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_faforpag');
		$this->columnas[1][5]->setHTML('size=10 onKeyPress=calcularmontopago(event,this.id);');
		$this->obj3 = $this->columnas[0]->getConfig($forpag);

		$this->fafactur->setObj3($this->obj3);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFaclib($reffac = '') {
        $c = new Criteria();
        $c->add(FafaclibPeer :: REFFAC, $reffac);
        $faclib = FafaclibPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fafaclib');
//		$this->columnas[1][5]->setHTML('size=10 onKeyPress=calcularmontopago(event,this.id);');
        $this->obj6 = $this->columnas[0]->getConfig($faclib);

        $this->fafactur->setObj6($this->obj6);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRgoArt($reffac = '', $tipo='') {

       $c = new Criteria();
       if($tipo=='PROFORMA')
        {           
           $c->add(FargoartproPeer :: REFDOC, $reffac);
           $rreg = FargoartproPeer :: doSelect($c);
           foreach ($rreg as $obj)
            {
              $fargoart2= new Fargoart();
              $fargoart2->setCodrgo($obj->getCodrgo());
              $fargoart2->setNomrgo($obj->getNomrgo());
              $fargoart2->setRecfij($obj->getRecfij());
              $fargoart2->setMonrgo($obj->getMonrgo());
              $fargoart2->setCodcta($obj->getCodcta());
              $fargoart2->setTipo($obj->getTipo());
              $fargoart2->setMonrgo2($obj->getMonrgo2());
              $rgoart[]=$fargoart2;
            }
        }else {            
            $c->add(FargoartPeer :: REFDOC, $reffac);
            $rgoart = FargoartPeer :: doSelect($c);
        }

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fargoart');
		$this->columnas[1][0]->setHTML('onBlur="javascript:event.keyCode=13; ajaxrecargos(event,this.id);"');
		$this->columnas[1][3]->setHTML('onKeyPress=CalculoMontoRgo(event,this.id);');
		$this->obj4 = $this->columnas[0]->getConfig($rgoart);

		$this->fafactur->setObj4($this->obj4);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPedDes($referencia = '', $codcli = '') {
		if ($referencia == 'P') {
			$sql = "Select '' as check, NROPED as nroped,DESPED as desped,FECPED as fecped, 9 as id from FAPEDIDO WHERE CodCli='" . $codcli . "' and STATUS='A' and NroPed not in (Select CodRef from Fanotent where CodRef=FaPedido.NroPed and TipRef='P') order by NroPed";
			Herramientas :: BuscarDatos($sql, & $reg);
		} else {
			$sql = "Select '' as check, DPHART as dphart,DESDPH as desdph,FECDPH as fecdph, 9 as id from CADPHART WHERE CodCli='" . $codcli . "' and STADPH='A' and TIPDPH<>'D' and REQART not in (Select NroNot From FaNotEnt where (TipNot='D') or (NroNot=CADPHART.REQART and TipRef='F')) order by DPHART";
			Herramientas :: BuscarDatos($sql, & $reg);
		}
		$this->fil1 = count($reg);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fapeddes');
		if ($referencia != 'P') {
			$this->columnas[0]->setTabla('Cadphart');
			$this->columnas[1][1]->setNombrecampo('dphart');
			$this->columnas[1][2]->setNombrecampo('desdph');
			$this->columnas[1][3]->setNombrecampo('fecdph');
		}

		$this->obj5 = $this->columnas[0]->getConfig($reg);

		$this->fafactur->setObj5($this->obj5);
	}

	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {
		$codigo = $this->getRequestParameter('codigo', '');
		$ajax = $this->getRequestParameter('ajax', '');
		$cajtexmos = $this->getRequestParameter('cajtexmos', '');
		$cajtexcom = $this->getRequestParameter('cajtexcom', '');
		$javascript = "";
		switch ($ajax) {
			case '1' :
				$output = '[["","",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '2' :
				if ($codigo != "") {
					$c = new Criteria();
					$c->add(FaclientePeer :: RIFPRO, $codigo);
					$reg = FaclientePeer :: doSelectOne($c);
					if ($reg) {
						$javascript = "$('fafactur_incluircliente').value='N'; ";
						$this->sql = "carecaud.codrec not in (select Farecpro.codrec from Farecpro where Farecpro.codpro='" . $reg->getCodpro() . "')";
						$c = new Criteria();
						$c->add(CarecaudPeer :: LIMREC, 'S');
						$c->add(CarecaudPeer :: CODTIPREC, $reg->getCodtiprec());
						$c->add(CarecaudPeer :: CODREC, $this->sql, Criteria :: CUSTOM);
						$reg2 = CarecaudPeer :: doSelectOne($c);
						if (!$reg2) {
							$dato1 = $reg->getNompro();
							$dato2 = $reg->getTelpro();
							$dato3 = $reg->getDirpro();
							$dato4 = $reg->getTipper();
							if ($dato4 == 'N') {
								$javascript = $javascript . "$('fafactur_tipper_N').checked=true; ";
							} else {
								$javascript = $javascript . "$('fafactur_tipper_J').checked=true; ";
							}
							$dato5 = $reg->getCodpro();
							$dato6 = $reg->getCodcta();
							$dato7 = $reg->getFatipcteId();
							$dato8 = $reg->getLimcre();
							Factura::mostrarDescuentos($dato7,&$arreglodesc);
							$javascript = $javascript . "actualizargrids('$arreglodesc'); ";
						} else {
							$javascript = $javascript . "alert('El Cliente no ha consignado todos los recaudos limitantes'); $('fafactur_rifpro').value='';";
							$dato1 = "";
							$dato2 = "";
							$dato3 = "";
							$dato4 = "";
							$dato5 = "";
							$dato6 = "";
							$dato7 = "";
							$dato8 = "";
						}
					} else {
						if ($this->getRequestParameter('tipref') == 'V') {
							$javascript = $javascript . " incluirCliente();";
							$dato1 = "";
							$dato2 = "";
							$dato3 = "";
							$dato4 = "";
							$dato5 = "";
							$dato6 = "";
							$dato7 = "";
							$dato8 = "";
						} else {
							$javascript = $javascript . "alert('El Cliente no Existe. No puede incluirlo directamente desde esta pantalla porque la factura no es una Venta Directa'); $('fafactur_rifpro').value='';";
							$javascript = $javascript . " actualizardescuento();";
							$dato1 = "";
							$dato2 = "";
							$dato3 = "";
							$dato4 = "";
							$dato5 = "";
							$dato6 = "";
							$dato7 = "";
							$dato8 = "";
						}
					}
				} else {
					$javascript = $javascript . " actualizardescuento();";
					$dato1 = "";
					$dato2 = "";
					$dato3 = "";
					$dato4 = "";
					$dato5 = "";
					$dato6 = "";
					$dato7 = "";
					$dato8 = "";
				}
				$output = '[["fafactur_nompro","' . $dato1 . '",""],["fafactur_telpro","' . $dato2 . '",""],["fafactur_dirpro","' . $dato3 . '",""],["fafactur_codcli","' . $dato5 . '",""],["fafactur_ctacli","' . $dato6 . '",""],["fafactur_tipocliente","' . $dato7 . '",""],["fafactur_limitecredito","' . $dato8 . '",""],["javascript","' . $javascript . '",""],["bx_0_5","1",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '3' :
				$c = new Criteria();
				$c->add(TsdesmonPeer :: CODMON, $codigo);
				$c->add(TsdesmonPeer :: FECMON, $this->getRequestParameter('fecha'));
				$result = TsdesmonPeer :: doSelectOne($c);
				if ($result) {
					$moneda = $result->getValmon();
					$posneg = $result->getAumdis();
					$codigomoneda = $result->getCodmon();
				} else {
					$sql = "Select MAX(VALMON) as VALMON,MAX(AUMDIS) as AUMDIS,MAX(CODMON) as CODMON from TSDesMon where codmon='" . $codigo . "'";
					if (Herramientas :: BuscarDatos($sql, & $result)) {
						if (!is_null($result[0]["codmon"])) {
							$moneda = $result[0]["valmon"];
							$posneg = $result[0]["aumdis"];
							$codigomoneda = $result[0]["codmon"];
						} else {
							$moneda = 0;
							$posneg = "D";
							$codigomoneda = "";
						}
					} else {
						$moneda = 0;
						$posneg = "D";
						$codigomoneda = "";
					}
				}
				//falta cambio de moneda

				$output = '[["fafactur_valmon","' . $moneda . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '4' :
				if ($codigo != "") {
					$c = new Criteria();
					$c->add(FaconpagPeer :: ID, $codigo);
					$result = FaconpagPeer :: doSelectOne($c);
					if ($result) {
						$dato1 = $result->getTipconpag();
						if ($this->getRequestParameter('incluir') == 'N' || ($this->getRequestParameter('incluir') == 'S' && $result->getTipconpag() != 'R')) {
							$dato2 = $result->getDesconpag();
							if ($this->getRequestParameter('ctacli') == "" && $result->getTipconpag() == 'R') {
								$javascript = "alert('No se puede Facturar debido a que el Cliente no posee Cuenta Contable asociada'); $('despach').hide(); $('pedid').hide(); $('fafactur_codconpag').value='';";
								$dato1 = "";
								$dato2 = "";
							}
						} else {
							$javascript = "alert('La Factura no puede ser a Crédito porque está incluyendo al Cliente'); $('fafactur_codconpag').value='';";
							$dato1 = "";
							$dato2 = "";
						}
					} else {
						$javascript = "alert('La Condición de Pago no Existe'); $('fafactur_codconpag').value=''; ";
						$dato1 = "";
						$dato2 = "";
					}
				}
				$output = '[["fafactur_tipconpag","' . $dato1 . '",""],["fafactur_desconpag","' . $dato2 . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '5' :
				$javascript = "$('CajaPrinc').hide();";
				$c = new Criteria();
				$c->add(FadefcajPeer :: ID, $this->getRequestParameter('codigocaja'));
				$reg = FadefcajPeer :: doSelectOne($c);
				if ($reg) {
					//$tipo=$reg->getTipo();
					$correl = str_pad($reg->getCorcaj(), 8, '0', STR_PAD_LEFT);
					/*if ($tipo=='F')
					{
						$javascript=$javascript."$('fafactur_reffac').readOnly=true;";
					}*/
				} else {
					$tipo = "";
					$correl = "";
				}
				$this->getUser()->setAttribute('clavecaja', $this->getRequestParameter('codigocaja'), 'fafactur');
				$javascript = $javascript . "$('FormaPrinc').show(); $$('.sf_admin_action_list')[0].show(); $$('.sf_admin_action_save')[6].show(); $$('.sf_admin_action_create')[0].show();";
				$output = '[["javascript","' . $javascript . '",""],["fafactur_reffac","' . $correl . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '6' :
				$c = new Criteria();
				$c->add(FasinrgoPeer :: CODART, $this->getRequestParameter('articulo'));
				$c->add(FasinrgoPeer :: CODRGO, $this->getRequestParameter('recargo'));
				$resul = FasinrgoPeer :: doSelectOne($c);
				if ($resul) {
					$javascript = "$('fafactur_trajo').value='S'";
				} else
					$javascript = "$('fafactur_trajo').value='N'";

				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '7' :
				$cajtexmos = $this->getRequestParameter('cajtexmos');
				$recfij = $this->getRequestParameter('recfij');
				$monto = $this->getRequestParameter('monto');
				$cta = $this->getRequestParameter('cta');
				$tipo = $this->getRequestParameter('tipo');
				$monto2 = $this->getRequestParameter('monto2');
				$montota = $this->getRequestParameter('montot');
				$montot1 = $this->getRequestParameter('montot1');
				$valmonto = $this->getRequestParameter('valmonto');

				$c = new Criteria();
				$c->add(FarecargPeer :: CODRGO, $codigo);
				$resul = FarecargPeer :: doSelectOne($c);
				if ($resul) {
					$dato = $resul->getNomrgo();
					$dato1 = $resul->getCodcta();
					if ($resul->getCalcul() == 'S') {
						$dato2 = "Si";
						$montot = $montota;
					} else {
						$dato2 = "No";
						$montot = $montot1;
					}

					if ($resul->getTiprgo() == 'M') {
						if ($valmonto != "") {
							$dato3 = $valmonto;
						} else {
							$dato3 = number_format($resul->getMonrgo(), 2, ',', '.');
						}
					} else {
						if ($resul->getTiprgo() == 'P') {
							$cuenta = (($montot * $resul->getMonrgo()) / 100);
							$dato3 = number_format($cuenta, 2, ',', '.');
						} else {
							$dato3 = "0,00";
						}
					}
					$dato4 = $resul->getTiprgo();
					$dato5 = $resul->getMonrgo();
					$javascript = "calcularTotalRecargos();";
				} else {
					$dato = "";
					$dato1 = "";
					$dato2 = "";
					$dato3 = "";
					$dato4 = "";
					$dato5 = "";
					$javascript = "alert('El Recargo no existe'); $('$codigo').value=''; calcularTotalRecargos();";
				}
				$output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $recfij . '","' . $dato2 . '",""],["' . $monto . '","' . $dato3 . '",""],["' . $cta . '","' . $dato1 . '",""],["' . $tipo . '","' . $dato4 . '",""],["' . $monto2 . '","' . $dato5 . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '8' :
				$c = new Criteria();
				$c->add(FacladtoPeer :: LOGUSE, $this->getRequestParameter('login'));
				$resul = FacladtoPeer :: doSelectOne($c);
				if ($resul) {
					if ($resul->getClave() == $this->getRequestParameter('clave')) {
						$dato = $resul->getDescto();
						$javascript = "$('datosRecarg').hide(); $('datosDesc').show(); $('ClaveDes').hide();";
					} else {
						$dato = 0;
						$javascript = "alert('Clave Invalida'); $('fafactur_password').value=''";

					}
				} else {
					$dato = 0;
					$javascript = "alert('Clave Invalida'); $('fafactur_password').value=''";
				}
				$output = '[["fafactur_porcentajedescto","' . $dato . '",""],["javascript","' . $javascript . '",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '9' :
				$montodesc = $this->getRequestParameter('montodesc');
				$cuenta = $this->getRequestParameter('cuenta');
				$cantidad = $this->getRequestParameter('cantidad');
				$valcant = $this->getRequestParameter('valcant');
				$descuento = $this->getRequestParameter('descuento');
				$tipo = $this->getRequestParameter('tipo');
				$tiporet = $this->getRequestParameter('tiporet');
				$eldescuento = $this->getRequestParameter('eldescuento');
				$valmontodesc = $this->getRequestParameter('valmontodesc');
				$msj = "";
				$dato = "";
				$dato1 = "";
				$dato2 = "";
				$dato3 = "";
				$dato4 = "";
				$dato5 = "";
				$dato6 = "";
				$dato7 = "";
				$javascript="";

				$c = new Criteria();
				$c->add(FadesctoPeer :: CODDESC, $codigo);
				$reg = FadesctoPeer :: doSelectOne($c);
				if ($reg) {
					if ($valcant!="")
					{
                       if ($valcant==0)
                       {
                       	$javascript="$('$cantidad').value='1'; ";
                       }
					}

					if ($reg->getTipret() != 'S') {
						$dato = 'N';
					} else
						$dato = 'S';
					if ($reg->getTipdesc() == 'M') {
						$montota = (($this->getRequestParameter('monto14') * $this->getRequestParameter('porcentajedesc')) / 100);
						if (($reg->getMondesc() > $montota) && ($this->getRequestParameter('aplicaclades') == 'S')) {
							$javascript = $javascript."alert('El Porcentaje del Descuento sobrepasa el límite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
							$msj = 'z';
						}
					} else {
						if (($reg->getMondesc() > $this->getRequestParameter('porcentajedesc')) && ($this->getRequestParameter('aplicaclades') == 'S')) {
							$javascript = $javascript."alert('El Porcentaje del Descuento sobrepasa el límite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
							$msj = 'z';
						}
					}
					if ($msj == "") {
						$dato1 = $reg->getDesdesc();
						$dato2 = $reg->getCodcta();
						$dato3 = $reg->getMondesc();
						$dato4 = $reg->getTipdesc();
						$dato5 = $reg->getTipret();

						if ($reg->getTipdesc() == 'M') {
							if ($valmontodesc <= 0) {
								$cuent = $reg->getMondesc() * $valcant;
								$dato6 = number_format($cuent, 2, ',', '.');
							}
						} else {
							if ($reg->getTipdesc() == 'P') {

								if ($reg->getTipret() != 'S') {
									$descto = $this->getRequestParameter('monfac') - $this->getRequestParameter('totalrgo') + $this->getRequestParameter('totaldesc');
								} else {
									$descto = $this->getRequestParameter('totalrgo');
								}
								$cuent = ($descto * $reg->getMondesc() / 100);
								$dato6 = number_format($cuent, 2, ',', '.');
								$dato6 = number_format($eldescuento, 2, ',', '.');
							} else {
								$dato6 = '0,00';
							}
						}

						if ($dato6 != "") {
							if ($this->getRequestParameter('totaltotarti') != "") {
								if ($dato6 > $this->getRequestParameter('totaltotarti')) {
									$dato6 = '0,00';
									$dato7 = $this->getRequestParameter('totaldesc') - H :: tofloat($dato6);
								} else {
									$javascript = $javascript."calcularTotalDescuento(); montoTotal(); actualizarRecargos(); recalcularRecargos(); montoTotal();";
								}
							}
						}
					}
				} else {
					$javascript = "alert('El Descuento no existe'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
				}
				$output = '[["fafactur_esretencion","' . $dato . '",""],["' . $cajtexmos . '","' . $dato1 . '",""],["' . $cuenta . '","' . $dato2 . '",""],["' . $descuento . '","' . $dato3 . '",""],["' . $tipo . '","' . $dato4 . '",""],["' . $tiporet . '","' . $dato5 . '",""],["' . $montodesc . '","' . $dato6 . '",""],["fafactur_totdesc","' . $dato7 . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '10' :
				$dateFormat = new sfDateFormat('es_VE');
				$fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

				$c = new Criteria();
				$c->add(FafacturPeer :: REFFAC, $this->getRequestParameter('reffac'));
				$data = FafacturPeer :: doSelectOne($c);
				if ($data) {
					if ($fecha < $data->getFecfac()) {
						$msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha de la Factura'); $('fafactur_fecanu').value=''";
					} else {
						$msj = "";
				        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
				        {
				          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('fafactur_fecanu').value=''; $('fafactur_fecanu').focus(); ";
				        }
				        else { $msj=""; }
					}
				} else {
					$msj = "";
				}
				$output = '[["javascript","' . $msj . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '11' :
				$this->param = "";
				$this->ajaxs = "";
				$p = "";
				$this->arreglo = array ();
				$ctaprove = $this->getRequestParameter('ctaprove');
				$blancodos = $this->getRequestParameter('blanco2');
				$unim = $this->getRequestParameter('unidad');
				$cant = $this->getRequestParameter('cantidad');
				$existenc = $this->getRequestParameter('existencia');
				$montrgo = $this->getRequestParameter('montrgo');
				$tota = $this->getRequestParameter('total');
				$blanc = $this->getRequestParameter('blanco');
				$this->filagrid = $this->getRequestParameter('filagrid');
				$ctaprovee = "";
				$blanco2 = "";
				$desart = "";
				$unimed = "";
				$cantidad = "";
				$existencia = "";
				$monrgo = "";
				$blanco = "";
				$total = "";
				$rgofijos="";

				$c = new Criteria();
				$c->add(CaregartPeer :: CODART, $codigo);
				$dato = CaregartPeer :: doSelectOne($c);
				if ($dato) {
					if ($dato->getCtavta() != "") {
						if (Factura :: articulosConsignacion($codigo)) {
							$sql = "Select distinct A.CodPro as codpro,B.NomPro as nompro,A.Comisi as comisi From FaArtPro A,CAProVee B Where CodArt = '" . $codigo . "' and A.CodPro=B.CodPro";
							if (Herramientas :: BuscarDatos($sql, & $result)) {
								if (count($result) > 1) {
									$proveedores = array ();
									$j = 0;
									while ($j < count($result)) {
										$proveedores += array (
											$result[$j]["codpro"] . "/" . $result[$j]["nompro"] . "/" . $result[$j]["comisi"] => $result[$j]["codpro"] . "/" . $result[$j]["nompro"] . "/" . $result[$j]["comisi"]
										);
										$j++;
									}

									$this->arreglo = $proveedores;
									$this->param = '1';
									$ctaprovee = "";
									$blanco2 = "";
									$javascript = "$('label19').innerHTML = '" . $dato->getCodart() . "  " . $dato->getDesart() . "'; $('listArt').show();";
								} else {
									$ctaprovee = $result[0]["codpro"];
									$blanco2 = $result[0]["comisi"];
								}
							} else {
								$ctaprovee = "";
								$blanco2 = "";
							}
						} else {
							$ctaprovee = "";
							$blanco2 = "";
						}

						$desart = htmlspecialchars($dato->getDesart());
						$unimed = $dato->getUnimed();
						$cantidad = number_format($dato->getDistot(), 2, ',', '.');
						$cant_entregada = $this->getRequestParameter('canent');
						$exist = $dato->getDistot() - $cant_entregada;
						$existencia = number_format($exist, 2, ',', '.');
						$cantidad = number_format($dato->getDistot(), 2, ',', '.');
						$docrefiere = $this->getRequestParameter('docref');
						if ($docrefiere == 'V') {
							$precio = "0,00";
							$cantot = "0,00";
						}
						$monrgo = "0,00";
						$total = "0,00";
						$blanco = $dato->getTipo();
						$javascript = $javascript . " $('descuent').show(); $('recarg').show(); ";
						$rgofijos = 'S';

						if ($docrefiere == 'V') {
							$precio = "0,00";
							$cantot = "0,00";
						}
						$javascript=$javascript." datosRecargos(); ";
					} else {
						$javascript = "alert('El Artículo no posee Cuenta de Venta asociada'); $('$cajtexcom').value=''; ";
					}
				} else {
					$javascript = "alert('El Código del Artículo no Existe'); $('$cajtexcom').value='';";
				}

				$output = '[["' . $ctaprove . '","' . $ctaprovee . '",""],["' . $blancodos . '","' . $blanco2 . '",""],["' . $cajtexmos . '","' . $desart . '",""],["' . $unim . '","' . $unimed . '",""],["' . $cant . '","' . $cantidad . '",""],["' . $existenc . '","' . $existencia . '",""],["' . $montrgo . '","' . $monrgo . '",""],["' . $tota . '","' . $total . '",""],["' . $blanc . '","' . $blanco . '",""],["fafactur_rgofijos","' . $rgofijos . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				break;
			case '12' :
				$this->ajaxs = '5';
				$this->precios = array ();
				$javascript = "";
				$precioe=$this->getRequestParameter('precio2');
				$this->precios = FaartpvpPeer :: getPrecios($codigo);
				if (count($this->precios)==0)
				{
				  $javascript=$javascript."$('$precioe').readOnly=false;";
				}
				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				break;
			case '13' :
				$this->ajaxs = '13';
				$this->fafactur = $this->getFafacturOrCreate();
				$this->configGridPedDes($this->getRequestParameter('tipref'), $this->getRequestParameter('cedula'));
				if ($this->fil1!=0)
				{
				$javascript = "$('listaPedidosDespachos').show(); ";
				if ($this->getRequestParameter('tipref') == 'P')
					$javascript = $javascript .
					"$('label2').innerHTML ='Pedidos Emitidos';";
				else
					$javascript = $javascript . "$('label2').innerHTML ='Despachos Emitidos';";
				}else
				{
					if ($this->getRequestParameter('tipref') == 'P')
					$javascript="alert('El Beneficiario no tiene Pedidos asociados')";
					else $javascript="alert('El Beneficiario no tiene Despachos asociados')";
				}
				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				break;
			case '14' :
				$this->ajaxs = '14';
				$sin_cta_aso="S";
				if ($this->getRequestParameter('tipref') == 'P') {
					Factura :: arregloPedidos($this->getRequestParameter('codrefer'), $this->getRequestParameter('tipref'), & $encontro, & $msj, & $arreglodet, & $p,&$sin_cta_aso);
					if ($msj == "") {
						if ($encontro == true) {
							$javascript = "alert('El Pedido ya fue Facturado en su Totalidad'); $('listaPedidosDespachos').hide(); ";
						} else {
							$javascript = "colocarArticulos('$arreglodet'); ";
							if ($p != "") {
								$javascript = $javascript . "recalcularRecargos(); montoTotal();  $('listaPedidosDespachos').hide();   $('descuent').show(); $('recarg').show(); mostrarPromedio();";
							} else {
								$javascript = $javascript . " $('listaPedidosDespachos').hide();  $('descuent').show(); $('recarg').show(); mostrarPromedio();";
							}
						}
					} else {
						$javascript = $msj;
					}
				} else {
					if ($this->getRequestParameter('tipref') == 'D' || $this->getRequestParameter('tipref') == 'VC') {
						Factura :: arregloDespachos($this->getRequestParameter('codrefer'), $this->getRequestParameter('tipref'), & $encontro, & $msj, & $arreglodet, & $p,&$sin_cta_aso);
					}
					if ($msj == "") {
						if ($encontro == true) {
							$javascript = "alert('El Despacho ya fue Facturado en su Totalidad'); $('listaPedidosDespachos').hide(); ";
						} else {
							$javascript = "colocarArticulos('$arreglodet'); ";
							if ($p != "") {
								$javascript = $javascript . "recalcularRecargos(); $('recarg').show(); $('descuent').show(); $('listaPedidosDespachos').hide(); mostrarPromedio();";
							} else {
								$javascript = $javascript . " $('recarg').show(); $('descuent').show(); $('listaPedidosDespachos').hide(); mostrarPromedio();";
							}
						}
					} else {
						$javascript = $msj;
					}
				}
				$output = '[["fafactur_ctasociada","' . $sin_cta_aso . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '15' :
                Factura::datosRecargos($this->getRequestParameter('rgofijos'),$this->getRequestParameter('reffac'),&$arreglorec,&$trajo);
                if ($trajo==false)
                {
                  $javascript="$('fafactur_totrec').value='0,00';";
                }
                else
                {
                  $javascript = "colocarRecargos('$arreglorec'); calcularTotalRecargos();";
                }
				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
			    break;
            case '16' :
                $this->ajaxs = '16';
				$this->fafactur = $this->getFafacturOrCreate();
                $this->configGridArtFac('', $this->getRequestParameter('tipref'));
                $output = '[["","",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
			    break;
            case '17':
                if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
		        {
		          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('fafactur_fecfac').value=''; $('fafactur_fecfac').focus();";
		        }else { $msj=""; }
		        $output = '[["javascript","'.$msj.'",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
             break;
            case '18':
		        $dato=TstipmovPeer::getDestip($codigo);
		        $output = '[["fafactur_destip","'.$dato.'",""]]';
		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		        return sfView::HEADER_ONLY;
             break;
            case '19':
                        $javascript="";
                        $monfac=0;
		        $c = new Criteria();
                        $c->add(FafacturproPeer::REFFAC,$codigo);
                        $per = FafacturproPeer::doSelectOne($c);
                        if($per)
                        {
                            $tipref=$per->getTipref();
                            $tipmon=$per->getTipmon();
                            $rifpro=$per->getRifpro();
                            $nompro=$per->getNompro();
                            $telpro=$per->getTelpro();
                            $dirpro=$per->getDirpro();
                            $tipper=$per->getTipper();
                            $codcli=H::getX('RIFPRO','Facliente','Codpro',$per->getRifpro());
                            $ctacli = H::getX('RIFPRO','Facliente','Codcta',$per->getRifpro());
                            $codconpag=$per->getCodconpag();
                            $desconpag=$per->getDesconpag();
                            $desfac=$per->getDesfac();
                            $c = new Criteria();
                            $c->add(FaartfacproPeer::REFFAC,$codigo);
                            $c->add(FaartfacproPeer::ESTATUS,'A');
                            $per2 = FaartfacproPeer::doSelect($c);
                            foreach($per2 as $r)
                                $monfac+=$r->getTotart();
                            $tipconpag=H::GetX('Id','Faconpag','Tipconpag',$codconpag);
                            if($tipper=='N')
                                $javascript.="$('fafactur_tipper_N').disabled=false;
                                              $('fafactur_tipper_J').disabled=false;
                                              $('fafactur_tipper_N').checked=true;
                                              $('fafactur_tipper_J').checked=false;
                                              $('fafactur_tipper_N').disabled=true;
                                              $('fafactur_tipper_J').disabled=true;";
                             else
                                 $javascript.="$('fafactur_tipper_N').disabled=false;
                                              $('fafactur_tipper_J').disabled=false;
                                              $('fafactur_tipper_N').checked=false;
                                              $('fafactur_tipper_J').checked=true;
                                              $('fafactur_tipper_N').disabled=true;
                                              $('fafactur_tipper_J').disabled=true;";

                        }else
                        {
                            $tipref="";
                            $tipmon="";
                            $rifpro="";
                            $nompro="";
                            $telpro="";
                            $dirpro="";
                            $tipper="";
                            $ctacli="";
                            $codcli="";
                            $codconpag="";
                            $desconpag="";
                            $desfac="";
                            $monfac="";
                            $tipconpag="";
                        }
                        $this->ajaxs = '16';
			$this->fafactur = $this->getFafacturOrCreate();
                        $this->configGridArtFac($codigo, 'V','PROFORMA');
                        $javascript.=" CargarRecDesc(); montoTotal();";

		        $output = '[["fafactur_tipref","'.$tipref.'",""],["fafactur_tipmon","'.$tipmon.'",""],["fafactur_rifpro","'.$rifpro.'",""],["fafactur_nompro","'.$nompro.'",""],
                                    ["fafactur_telpro","'.$telpro.'",""],["fafactur_dirpro","'.$dirpro.'",""],["fafactur_codconpag","'.$codconpag.'",""],["fafactur_desconpag","'.$desconpag.'",""],
                                    ["fafactur_desfac","'.$desfac.'",""],["fafactur_monto","'.H::FormatoMonto($monfac).'",""],["fafactur_monfac","'.H::FormatoMonto($monfac).'",""],["fafactur_tipconpag","'.$tipconpag.'",""],["fafactur_ctacli","'.$ctacli.'",""],["fafactur_codcli","'.$codcli.'",""],["javascript","'.$javascript.'",""]]';
		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		        #return sfView::HEADER_ONLY;
             break;
            case '20':
                $dato="";
                $t= new Criteria();
                $t->add(FaclientePeer::RIFPRO,$codigo);
                $reg= FaclientePeer::doSelectOne($t);
                if ($reg)
                {
                    $dato=$reg->getNompro();
                }
                else
                {
                    $javascript="alert('El Cliente no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                }
                $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                return sfView::HEADER_ONLY;
             break;
      case '21' :
        $dato1 = "";
        $dato2 = "";
        $dato3 = "";
        $dato4 = "";
        $cajtxtmos = $this->getRequestParameter('cajtxtmos');
        $rif = $this->getRequestParameter('rif');
        $nomrif = $this->getRequestParameter('nomrif');
        $placa = $this->getRequestParameter('placa');
        $cajtxtcom = $this->getRequestParameter('cajtxtcom');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FaregotsPeer :: CEDRIF, $codigo);
                $result = FaregotsPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getNomots();
                    $dato2 = $result->getRifpro();
                    $dato3 = H::getX('RIFPRO','Caprovee','Nompro',$result->getRifpro());
                    $dato4 = $result->getPlaca();
                }else{
                    $javascript="alert('El Operador de Transporte no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
                }
        }
        $output = '[["'.$cajtxtmos.'","' . $dato1 . '",""],["'.$rif.'","' . $dato2 . '",""],["'.$nomrif.'","' . $dato3 . '",""],["'.$placa.'","' . $dato4 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
      break;
      case '22' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(BnubicaPeer :: CODUBI, $codigo);
                $result = BnubicaPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getDesubi();
                }else{
                    $javascript="alert('La Unidad no existe'); $('fafactur_codubi').value=''; $('fafactur_codubi').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '23' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtxtmos');
        $cajtexcom = $this->getRequestParameter('cajtxtcom');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FadefproPeer :: CODPROD, $codigo);
                $result = FadefproPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getDesprod();
                }else{
                    $javascript="alert('El Producto no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
        case '24' :
            $this->ajaxs = '17';
            $this->fafactur = $this->getFafacturOrCreate();
            $this->configGridDescFac($codigo,'PROFORMA');
            $output = '[["","",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            break;
        case '25' :
            $this->ajaxs = '18';
            $this->fafactur = $this->getFafacturOrCreate();
            $this->configGridRgoArt($codigo,'PROFORMA');
            $output = '[["","",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            break;
			default :
				$output = '[["","",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
		}
	}




  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {
		$this->coderr = -1;

		if ($this->getRequest()->getMethod() == sfRequest :: POST) {
		$this->fafactur = $this->getFafacturOrCreate();
        try{ $this->updateFafacturFromRequest();}
        catch (Exception $ex){}
        $this->configGrid();

        if ($this->getRequestParameter('fafactur[ctasociada]')=='N')
        {
         $this->coderr=1137;
         return false;
        }
        $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4);
        $grid=Herramientas::CargarDatosGridv2($this,$this->obj1);
        if (Factura::PreciosRepetidos($grid))
        {
      	  $this->coderr=1136;
          return false;
        }        
        $grid2=Herramientas::CargarDatosGridv2($this,$this->obj3);
            
        if (Factura::Verificar_pago($grid2,H::tofloat($this->getRequestParameter('fafactur[monfac]')),$this->getRequestParameter('fafactur[tipconpag]'))==false)
        {
          $this->coderr=1146;
          return false;
        }

          $x=$grid[0];
          $i=0;
	      while ($i<count($x))
	      {
	       if ($this->getRequestParameter('fafactur[tipref]')=='P')
	       {
	       	 if ($x[$i]->getCodref()=="")
	         {
	       	  $this->coderr=1138;
	       	  return false;
	         }
	       }
	       if ($x[$i]->getCodart()=="")
	       {
	         $this->coderr=1139;
	         return false;
	       }
           if ($this->getRequestParameter('fafactur[tipref]')=='V')
	       {
	       	 if ($x[$i]->getCansol()=="0,00")
	         {
	       	  $this->coderr=1140;
	       	  return false;
	         }
	       }
	       if ($this->getRequestParameter('fafactur[tipref]')=='P')
	       {
	       	 if ($x[$i]->getCanent()=="0,00")
	         {
	       	  $this->coderr=1142;
	       	  return false;
	         }
	       }

	       if ($x[$i]->getPrecio()=="0,00" && $x[$i]->getPrecioe()=="0,00")
	       {
	       	  $this->coderr=1141;
	       	  return false;
	       }
               if ($x[$i]->getHorsal()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHorsal()))
                  {
                    $this->coderr='F002';
                    return false;
                  }

	       }
               if ($x[$i]->getHorlleg()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHorlleg()))
                  {
                    $this->coderr='F002';
                    return false;
                  }

	       }
               if ($x[$i]->getHorllca()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHorllca()))
                  {
                    $this->coderr='F002';
                    return false;
                  }
	       }
               if ($x[$i]->getHordesc()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHordesc()))
                  {
                    $this->coderr='F002';
                    return false;
                  }
	       }

	       $i++;
	      }

	      $y=$grid2[0];
          $l=0;
	      while ($l<count($y))
	      {
            if ($y[$l]->getMonpag()=="0,00" && $this->getRequestParameter('fafactur[tipconpag]')=='C')
            {
	       	  $this->coderr=1143;
	       	  return false;
            }
            if ($y[$l]->getTippag()=="" && $this->getRequestParameter('fafactur[tipconpag]')=='C')
            {
	       	  $this->coderr=1144;
	       	  return false;
            }

	      	$l++;
	      }
         /* if ($this->getRequestParameter('fafactur[tipconpag]')=='R')
          {
          	$sql="Select coalesce(Sum(MonDoc+RecDoc-DscDoc-AboDoc),0) as monto from CobDocume where CodCli='".$this->getRequestParameter('fafactur[codcli]')."' Group by CodCli";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
            	if (count($result)>0)
            	{
            	$cal=H::tofloat($result[0]["monto"]) + H::tofloat($this->getRequestParameter('fafactur[monfac]')) - H::tofloat($this->getRequestParameter('fafactur[mondesc]'));
            	if ($cal>H::tofloat($this->getRequestParameter('fafactur[limitecredito]')))
            	{
	       	      $this->coderr=1145;
	       	      return false;
            	}
            	}else{
            	  $cal=H::tofloat($this->getRequestParameter('fafactur[monfac]')) - H::tofloat($this->getRequestParameter('fafactur[mondesc]'));
	            	if ($cal>H::tofloat($this->getRequestParameter('fafactur[limitecredito]')))
	            	{
	            	   $this->coderr=1145;
		       	       return false;
	            	}
            	}
            }
            else
            {
               $cal=H::tofloat($this->getRequestParameter('fafactur[monfac]')) - H::tofloat($this->getRequestParameter('fafactur[mondesc]'));
            	if ($cal>H::tofloat($this->getRequestParameter('fafactur[limitecredito]')))
            	{
            	   $this->coderr=1145;
	       	       return false;
            	}
            }
          }*/

		if ($this->coderr != -1) {
			return false;
		} else
			return true;

		} else
			return true;
	}

	public function executeCerrar() {
		$this->getUser()->getAttributeHolder()->remove('clavecaja', 'fafactur');
		return $this->redirect('fafactur/create');
	}

	protected function saving($fafactur) {
		if ($fafactur->getId()) {
			$fafactur->save();

                        $grid = Herramientas :: CargarDatosGridv2($this, $this->obj1);

                        $x=$grid[0];
                        $j=0;
                        while ($j<count($x))
                        {
                            $y= new Criteria();
                            $y->add(FaartfacPeer::REFFAC,$fafactur->getReffac());
                            $y->add(FaartfacPeer::CODART,$x[$j]->getCodart());
                            $result= FaartfacPeer::doSelectOne($y);
                            if ($result)
                            {
                                $result->setNronot($x[$j]->getNronot());
                                $result->setNotentdig($x[$j]->getNotentdig());
                                $result->setOrddespacho($x[$j]->getOrddespacho());
                                $result->setGuia($x[$j]->getGuia());
                                $result->setContenedores($x[$j]->getContenedores());
                                $result->setBillleading($x[$j]->getBillleading());
                                $result->setCedrif($x[$j]->getCedrif()); //Operador de Transporte
                                $result->setPlaca($x[$j]->getPlaca());
                                $result->setRifpro($x[$j]->getRifpro()); //Contratista
                                $result->setTipov($x[$j]->getTipov());
                                $result->setFecsal($x[$j]->getFecsal());
                                $result->setHorsal($x[$j]->getHorsal());
                                $result->setFecllca($x[$j]->getFecllca());
                                $result->setHorllca($x[$j]->getHorllca());
                                $result->setFecdesc($x[$j]->getFecdesc());
                                $result->setHordesc($x[$j]->getHordesc());
                                $result->setFeclleg($x[$j]->getFeclleg());
                                $result->setHorlleg($x[$j]->getHorlleg());
                                $result->setCodprod($x[$j]->getCodprod());
                                $result->setKg($x[$j]->getKg());
                                $result->setKgent($x[$j]->getKgent());
                                $result->setDifkg($x[$j]->getDifkg());
                                $result->setCajas($x[$j]->getCajas());
                                $result->setCajasent($x[$j]->getCajasent());
                                $result->setDifcaj($x[$j]->getDifcaj());
                                $result->setTm($x[$j]->getTm());
                                $result->setTment($x[$j]->getTment());
                                $result->setDifton($x[$j]->getDifton());
                                $result->setIer($x[$j]->getIer());
                                $result->setObservaciones($x[$j]->getObservaciones());
                                $result->save();
                            }
                          $j++;
                        }

	    return -1;
		} else {
			$tipocaja = $this->getUser()->getAttribute('clavecaja', null, 'fafactur');
			$grid = Herramientas :: CargarDatosGridv2($this, $this->obj1);
			$grid2 = Herramientas :: CargarDatosGridv2($this, $this->obj2);
			$grid3 = Herramientas :: CargarDatosGridv2($this, $this->obj3);
			$grid4 = Herramientas :: CargarDatosGridv2($this, $this->obj4);
                        $grid6 = Herramientas :: CargarDatosGridv2($this, $this->obj6);
			Factura :: salvarFactura($fafactur, $grid, $grid2, $grid3, $grid4, $tipocaja,&$msj,&$msj2,&$msj3,$grid6);

			if ($msj!=-1) return $msj;
			if ($msj3!=-1) return $msj3;

		  return -1;
		}

	}

	public function setVars() {
		$this->mascaraarticulo = Herramientas :: getMascaraArticulo();
		$this->lonart = strlen($this->mascaraarticulo);
		$this->despnotent="";
		$this->cambiolog="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('facturacion',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['facturacion'])){
		     if(array_key_exists('fadesp',$varemp['aplicacion']['facturacion']['modulos'])) {
		       if(array_key_exists('despnotent',$varemp['aplicacion']['facturacion']['modulos']['fadesp']))
		       {
		       	$this->despnotent=$varemp['aplicacion']['facturacion']['modulos']['fadesp']['despnotent'];
		       }
		     }
		     if(array_key_exists('fafactur',$varemp['aplicacion']['facturacion']['modulos'])) {
		       if(array_key_exists('cambiolog',$varemp['aplicacion']['facturacion']['modulos']['fafactur']))
		       {
		       	$this->cambiolog=$varemp['aplicacion']['facturacion']['modulos']['fafactur']['cambiolog'];
		       }
		     }
		   }
	}

	public function executeAnular() {
		$this->referencia = $this->getRequestParameter('referencia');
		$reffac = $this->getRequestParameter('reffac');
		$fecfac = $this->getRequestParameter('fecfac');

		$dateFormat = new sfDateFormat('es_VE');
		$fec = $dateFormat->format($fecfac, 'i', $dateFormat->getInputPattern('d'));

		$c = new Criteria();
		$c->add(FafacturPeer :: REFFAC, $reffac);
		$c->add(FafacturPeer :: FECFAC, $fec);
		$this->fafactur = FafacturPeer :: doSelectOne($c);
		sfView :: SUCCESS;
	}

	public function executeSalvaranu() {
		$reffac = $this->getRequestParameter('reffac');
		$motanu = $this->getRequestParameter('motanu');
		$fecanu = $this->getRequestParameter('fecanu');
		$fecha_aux = split("/", $fecanu);
		$dateFormat = new sfDateFormat('es_VE');
		$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
		$this->msg = "";
		$this->mensaje2="";
	    if (Tesoreria::validaPeriodoCerrado($fecanu)==true)
	   {
	     $coderror=529;
	     $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
	     return sfView::SUCCESS;
	   }else {
		$c = new Criteria();
		$c->add(FafacturPeer :: REFFAC, $reffac);
		$resul = FafacturPeer :: doSelectOne($c);
		if ($resul) {
			if (!is_null($resul->getNumcom())) {
				Factura :: anularComprobante("C", $resul->getNumcom(), $fec, & $msj);
				if ($msj != "") {
					$this->msg = $msj;
					return sfView :: SUCCESS;
				}
				if ($resul->getNumcomord() != "") {
					Factura :: anularComprobante("O", $resul->getNumcomord(), $fec, & $msj);
					if ($msj != "") {
						$this->msg = $msj;
						return sfView :: SUCCESS;
					}
				}
				if ($resul->getNumcominv() != "") {
					Factura :: anularComprobante("I", $resul->getNumcominv(), $fec, & $msj);
					if ($msj != "") {
						$this->msg = $msj;
						return sfView :: SUCCESS;
					}
				}
			} else {
				$this->msg = "El Comprobante no será eliminado, ya que se perdió la asociación con Contabilidad";
				return sfView :: SUCCESS;
			}
			$resul->setFecanu($fec);
			$resul->setMotanu($motanu);
			$resul->setStatus('N');
			$resul->save();

			if ((date(('m'), strtotime($resul->getFecanu())) > date(('m'), strtotime($resul->getFecfac()))) || (date(('Y'), strtotime($resul->getFecanu())) > date(('Y'), strtotime($resul->getFecfac())))) {
				Factura :: generarNotaCredito($resul->getReffac(), $fec, $resul->getMonfac());
			}
			Factura :: anularCxC(str_pad($resul->getReffac(),10,'0',STR_PAD_LEFT), $fec, $motanu);
			Factura :: devolverArticulosExist($resul->getReffac());
		}
	   }
		return sfView :: SUCCESS;
	}

	protected function deleting($fafactur) {
		if ($fafactur->getProform()!='')
                {
                    $t= new Criteria();
                    $t->add(FaartfacPeer::REFFAC,$fafactur->getReffac());
                    $resulta= FaartfacPeer::doSelect($t);
                    if ($resulta)
                    {
                        foreach ($resulta as $objdet)
                        {
                            $c = new Criteria();
                            $c->add(FaartfacproPeer::REFFAC,$fafactur->getProform());
                            $c->add(FaartfacproPeer::CODART,$objdet->getCodart());
                            $per = FaartfacproPeer::doSelectOne($c);
                            if($per)
                            {
                                 $per->setEstatus('A');
                                 $per->setNumfac(null);
                                 $per->save();
                            }        
                        }
                      Herramientas :: EliminarRegistro('Faartfac', 'Reffac', $fafactur->getReffac());
                    }                    
                }else{
                  Herramientas :: EliminarRegistro('Faartfac', 'Reffac', $fafactur->getReffac());
                }
                
		Herramientas :: EliminarRegistro('Fargoart', 'Refdoc', $fafactur->getReffac());
		Herramientas :: EliminarRegistro('Fadescart', 'Refdoc', $fafactur->getReffac());
		Herramientas :: EliminarRegistro('Faforpag', 'Reffac', $fafactur->getReffac());
                $usalib=H::getConfApp('gridfaclib', 'facturacion', 'fafactur');
                if ($usalib=='S') {
                    Herramientas :: EliminarRegistro('Fafaclib', 'Reffac', $fafactur->getReffac());
                }
		Herramientas :: EliminarRegistro('Cobrecdoc', 'Refdoc', str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
		Herramientas :: EliminarRegistro('Cobdesdoc', 'Refdoc', str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
		Herramientas :: EliminarRegistro('Cobdocume', 'Refdoc', str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));

		$c = new Criteria();
		$c->add(CiimpingPeer :: REFING, $fafactur->getReffac());
		$c->add(CiimpingPeer :: FECING, $fafactur->getFecfac());
		CiimpingPeer :: doDelete($c);

		$c = new Criteria();
		$c->add(CiregingPeer :: REFING, $fafactur->getReffac());
		$c->add(CiregingPeer :: FECING, $fafactur->getFecfac());
		CiregingPeer :: doDelete($c);

		Factura :: devolverArticulosExist($fafactur->getReffac());
		Factura :: eliminarComprob($fafactur->getNumcom());
		if ($fafactur->getNumcomord() != "") {
			Factura :: eliminarComprob($fafactur->getNumcomord());
		}

		if ($fafactur->getNumcominv() != "") {
			Factura :: eliminarComprob($fafactur->getNumcominv());
		}
                
    $fafactur->delete();
		return -1;
	}

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid3=Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid2=Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid6=Herramientas::CargarDatosGridv2($this,$this->obj6);
    return true;
  }
}
