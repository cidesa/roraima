<?php

/**
 * fafacturpro actions.
 *
 * @package    siga
 * @subpackage fafacturpro
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class fafacturproActions extends autofafacturproActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->mascaraarticulo = Herramientas :: getMascaraArticulo();
    $this->lonart = strlen($this->mascaraarticulo);
    $this->configGrid($this->fafacturpro->getReffac(), $this->fafacturpro->getTipref());
    $this->configGridRgoArt($this->fafacturpro->getReffac());
    $this->configGridDescFac($this->fafacturpro->getReffac());

  }

  public function configGrid($reffac = '', $tipref='')
  {             $c = new Criteria();
		$c->add(FaartfacproPeer :: REFFAC, $reffac);
                //$c->add(FaartfacproPeer :: ESTATUS, 'P',Criteria::NOT_EQUAL);
		$artfac = FaartfacproPeer :: doSelect($c);

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

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafacturpro/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_faartfacpro');

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
		$this->columnas[1][11]->setHTML(' size="10" readonly=true onKeyPress=montorecargo(event,this.id);');
		#$this->columnas[1][12]->setEsTotal(true, 'fafacturpro_monfac');
         if ($this->cambiolog!="S")
         {
         	/*$this->columnas[1][23]->setOculta(true);
         	$this->columnas[1][24]->setOculta(true);
         	$this->columnas[1][25]->setOculta(true);
         	$this->columnas[1][26]->setOculta(true);*/
         }else $this->columnas[0]->setAncho(1800);

         $this->columnas[1][33]->setCombo(array('L'=>'Largo','C'=>'Corto'));
         $this->columnas[1][54]->setCombo(array('N'=>'En Proceso','A'=>'Administración','P'=>'Facturado'));
         $this->columnas[1][54]->setHTML('onChange=validarEstatus(this.id);');

		$this->obj1 = $this->columnas[0]->getConfig($artfac);

		$this->fafacturpro->setGrid($this->obj1);


  }

	/**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRgoArt($reffac = '') {
        $c = new Criteria();
        $c->add(FargoartproPeer :: REFDOC, $reffac);
        $rgoart = FargoartproPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafacturpro/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fargoartpro');
        $this->columnas[1][0]->setHTML('onBlur="javascript:event.keyCode=13; ajaxrecargos(event,this.id);"');
        $this->columnas[1][3]->setHTML('onKeyPress=CalculoMontoRgo(event,this.id);');
        $this->obj4 = $this->columnas[0]->getConfig($rgoart);

        $this->fafacturpro->setObj4($this->obj4);
    }

	/**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDescFac($reffac = '') {
        $c = new Criteria();
        $c->add(FadescartproPeer :: REFDOC, $reffac);
        $descart = FadescartproPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafacturpro/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fadescartpro');
        $this->columnas[1][0]->setHTML('onBlur="javascript:event.keyCode=13; ajaxdescuentos(event,this.id);"');
        $this->columnas[1][2]->setHTML('onKeyPress=calcularMondesc(event,this.id);');
        $this->obj2 = $this->columnas[0]->getConfig($descart);

        $this->fafacturpro->setObj2($this->obj2);
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
   $sw=true;
    switch ($ajax){
      case '1' :
        $sw=false;
        $this->precios = array ();
        $javascript = "";
        $precioe=$this->getRequestParameter('precio2');
        $desc=$this->getRequestParameter('desc');
        $this->precios = FaartpvpPeer :: getPrecios($codigo);
        if (count($this->precios)==0)
        {
          $javascript=$javascript."$('$precioe').readOnly=false;";
        }
        $dato = CaregartPeer::getDesart($codigo);
        $output = '[["javascript","' . $javascript . '",""],["'.$desc.'","' . $dato . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;
      case '2' :
        $javascript='';
        $this->param = "";
        $this->ajaxs = "";
        $p = "";
        $this->arreglo = array ();
        $ctaprove = $this->getRequestParameter('ctaprove');
        $blancodos = $this->getRequestParameter('blanco2');
        $unim = $this->getRequestParameter('unidad');
        $cant = $this->getRequestParameter('cantidad');
        $existenc = $this->getRequestParameter('existencia');
        #$montrgo = $this->getRequestParameter('montrgo');
        $tota = $this->getRequestParameter('total');
        $blanc = $this->getRequestParameter('blanco');
        $this->filagrid = $this->getRequestParameter('filagrid');
        $desc = $this->getRequestParameter('cajtexmos','');
        $precioe=$this->getRequestParameter('precio2');
        $divprecio=$this->getRequestParameter('precio');
        $docrefiere = $this->getRequestParameter('docref');
        $cajtexcom = $this->getRequestParameter('cajtexcom');
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        $ctaprovee = "";
        $blanco2 = "";
        $desart = "";
        $unimed = "";
        $cantidad = "";
        $existencia = "";
        #$monrgo = "";
        $blanco = "";
        $total = "";
        #$rgofijos="";

        $c = new Criteria();
        $c->add(CaregartPeer :: CODART, $codigo);
        $dato = CaregartPeer :: doSelectOne($c);
        if ($dato) {
                if ($dato->getCtavta() != "") {
                        /*if (Factura :: articulosConsignacion($codigo)) {
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
                        }*/

                        $desart = htmlspecialchars($dato->getDesart());
                        $unimed = $dato->getUnimed();
                        $cantidad = number_format($dato->getDistot(), 2, ',', '.');
                        $cant_entregada = $this->getRequestParameter('canent');
                        $exist = $dato->getDistot() - $cant_entregada;
                        $existencia = number_format($exist, 2, ',', '.');
                        $cantidad = number_format($dato->getDistot(), 2, ',', '.');
                        if ($docrefiere == 'V') {
                                $precio = "0,00";
                                $cantot = "0,00";
                        }
                        #$monrgo = "0,00";
                        $total = "0,00";
                        $blanco = $dato->getTipo();
                        #$javascript = $javascript . " $('descuent').show(); $('recarg').show(); ";
                        #$rgofijos = 'S';

                        if ($docrefiere == 'V') {
                                $precio = "0,00";
                                $cantot = "0,00";
                        }
                        #$javascript=$javascript." datosRecargos(); ";
                } else {
                        $javascript = "alert('El Artículo no posee Cuenta de Venta asociada'); $('$cajtexcom').value=''; ";
                }
        } else {
                $javascript = "alert('El Código del Artículo no Existe'); $('$cajtexcom').value='';";
        }
        #$javascript.="new Ajax.Updater(precio, getUrlModulo()+'ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&id='+$('id').value+'&desc='+".$desc."+'&precio2='+".$precioe."+'&codigo='+".$codigo."});";
        if($docrefiere=='V')
                $javascript.="toAjaxUpdater('$divprecio',1,getUrlModulo()+'ajax','$codigo','','&desc=".$desc."&precio2=".$precioe."');";

        $output = '[["' . $ctaprove . '","' . $ctaprovee . '",""],["' . $blancodos . '","' . $blanco2 . '",""],["' . $cajtexmos . '","' . $desart . '",""],["' . $unim . '","' . $unimed . '",""],["' . $cant . '","' . $cantidad . '",""],["' . $existenc . '","' . $existencia . '",""],["' . $tota . '","' . $total . '",""],["' . $blanc . '","' . $blanco . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        break;
      case '3' :
        $dato1 = "" ;
        $dato2 = "" ;
        $dato3 = "" ;
        $dato4 = "" ;
        $javascript="";
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FaclientePeer :: RIFPRO, $codigo);
                $reg = FaclientePeer :: doSelectOne($c);
                if ($reg) {
                    $dato1 = $reg->getNompro();
                    $dato2 = $reg->getTelpro();
                    $dato3 = $reg->getDirpro();
                    $dato4 = $reg->getTipper()=='J' ? 'JURIDICO' : 'NATURAL';
                }
        }
        $output = '[["fafacturpro_nompro","' . $dato1 . '",""],["fafacturpro_telpro","' . $dato2 . '",""],["fafacturpro_dirpro","' . $dato3 . '",""],["fafacturpro_tipper","' . $dato4 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '4' :
        $javascript="";
        $dato1 = "";
        $dato2 = "";
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FaconpagPeer :: ID, $codigo);
                $result = FaconpagPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getTipconpag();
                    $dato2 = $result->getDesconpag();
                }
        }
        $output = '[["fafactur_tipconpag","' . $dato1 . '",""],["fafactur_desconpag","' . $dato2 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '5' :
        $fecha = $this->getRequestParameter('fecha') ? $this->getRequestParameter('fecha') : date('d/m/Y');
        $c = new Criteria();
        $c->add(TsdesmonPeer :: CODMON, $codigo);
        $c->add(TsdesmonPeer :: FECMON, $fecha);
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

        $output = '[["fafacturpro_valmon","' . $moneda . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '6' :
        $javascript="";
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
      case '7' :
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
                    $javascript="alert('La Unidad no existe'); $('fafacturpro_codubi').value=''; $('fafacturpro_codubi').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '8' :
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
        case '9' :
                $c = new Criteria();
                $c->add(FasinrgoPeer :: CODART, $this->getRequestParameter('articulo'));
                $c->add(FasinrgoPeer :: CODRGO, $this->getRequestParameter('recargo'));
                $resul = FasinrgoPeer :: doSelectOne($c);
                if ($resul) {
                        $javascript = "$('fafacturpro_trajo').value='S'";
                } else
                        $javascript = "$('fafacturpro_trajo').value='N'";

                $output = '[["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                return sfView :: HEADER_ONLY;
                break;
        case '10' :
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
            case '11' :
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
                                            $javascript = $javascript."alert('El Porcentaje del Descuento sobrepasa el lÃ­mite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
                                            $msj = 'z';
                                    }
                            } else {
                                    if (($reg->getMondesc() > $this->getRequestParameter('porcentajedesc')) && ($this->getRequestParameter('aplicaclades') == 'S')) {
                                            $javascript = $javascript."alert('El Porcentaje del Descuento sobrepasa el lÃ­mite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
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
                    $output = '[["fafacturpro_esretencion","' . $dato . '",""],["' . $cajtexmos . '","' . $dato1 . '",""],["' . $cuenta . '","' . $dato2 . '",""],["' . $descuento . '","' . $dato3 . '",""],["' . $tipo . '","' . $dato4 . '",""],["' . $tiporet . '","' . $dato5 . '",""],["' . $montodesc . '","' . $dato6 . '",""],["fafacturpro_totdesc","' . $dato7 . '",""],["javascript","' . $javascript . '",""]]';
                    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                    return sfView :: HEADER_ONLY;
                    break;
default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción

    if($sw)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->fafacturpro = $this->getFafacturproOrCreate();
      $this->updateFafacturproFromRequest();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj1);

      if(count($grid[0])<=0)
      {
          $this->coderr=411;
          return false;
      }
      $sw=false;
      foreach($grid[0] as $reg)
      {
        if($reg->getCheck()==1)
            $sw=true;

        if ($reg->getHorsal()!="")
        {
          if(!H::ValidarHora($reg->getHorsal()))
          {
            $this->coderr='F002';
            return false;
      }
        }
       if ($reg->getHorlleg()!="")
       {
          if(!H::ValidarHora($reg->getHorlleg()))
          {
            $this->coderr='F002';
            return false;
          }
       }
       if ($reg->getHorllca()!="")
       {
          if(!H::ValidarHora($reg->getHorllca()))
          {
            $this->coderr='F002';
            return false;
          }
       }
       if ($reg->getHordesc()!="")
       {
          if(!H::ValidarHora($reg->getHordesc()))
          {
            $this->coderr='F002';
            return false;
          }
       }
      }
      if(!$sw)
      {
          $this->coderr=140;
          return false;
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
    $this->mascaraarticulo = Herramientas :: getMascaraArticulo();
    $this->lonart = strlen($this->mascaraarticulo);
    $this->configGrid();
    $this->configGridDescFac();
    $this->configGridRgoArt();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    if($clasemodelo->getReffac()=='########')
    {
        $c = new Criteria();
        $per = FacorrelatPeer::doSelectOne($c);
        if($per)
        {
            $reffac = str_pad($per->getCodpro()+1,8,'0',STR_PAD_LEFT);
            $clasemodelo->setReffac($reffac);
            $sql="update facorrelat set codpro='".($per->getCodpro()+1)."'";
            H::insertarRegistros($sql);
        }
    }
    $c = new Criteria();
    $c->add(FaartfacproPeer::REFFAC,$clasemodelo->getReffac());
    $per = FaartfacproPeer::doSelect($c);
    foreach($per as $r)
      $r->delete();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj1); // Se graba el detalle
    foreach($grid[0] as $r)
    {
      if($r->getCheck()==1)
      {
        $r->setReffac($clasemodelo->getReffac());
        if ($r->getPrecio()==0)
        {
          $r->setPrecio($r->getPrecioe());
        }
        $r->save();
      }
    }

    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2); //Se graba los descuentos    
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4); //Se graban los recargos
    Factura::grabarDescuentoArticulo($clasemodelo,$grid,$grid2);
    Factura::grabarRecargoArticulo($clasemodelo,$grid,$grid4);
    $clasemodelo->setCodcli($clasemodelo->getCodcli());
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {

    $c = new Criteria();
    $c->add(FafacturPeer::PROFORM,$clasemodelo->getReffac());
    $per = FafacturPeer::doSelect($c);
    if($per)
        return 'F001';
    else
    {
        $c = new Criteria();
        $c->add(FaartfacproPeer::REFFAC,$clasemodelo->getReffac());
        $per = FaartfacproPeer::doSelect($c);
        foreach($per as $r)
          $r->delete();

        Herramientas :: EliminarRegistro('Fargoartpro', 'Refdoc', $fafactur->getReffac());
        Herramientas :: EliminarRegistro('Fadescartpro', 'Refdoc', $fafactur->getReffac());

        return parent::deleting($clasemodelo);
    }
  }


}
