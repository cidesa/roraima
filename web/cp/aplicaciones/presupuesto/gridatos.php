<?
session_start();
require_once ($_SESSION["x"] . 'lib/bd/basedatosAdo.php');
require_once ($_SESSION["x"] . 'lib/general/funciones.php');
require_once ($_SESSION["x"] . 'lib/general/tools.php');
//validar();            //Seguridad  del Sistema
$codemp = $_SESSION["codemp"];
$bd = new basedatosAdo($codemp);
$z = new tools();
?>
<script language="JavaScript"  src="../../lib/general/js/funciones.js"></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>
<script>
function TrimString(sInString)
  {
    sInString = sInString.replace( /^\s+/g, "" );// strip leading
    return sInString.replace( /\s+$/g, "" );// strip trailing
  }
</script>
<?

$id = $_GET["id"];
$cuantos = $_GET["cuantos"];
$donde = $_GET["donde"];
$donde2 = $_GET["donde2"];
$foco = $_GET["foco"];
$sql = $_GET["sql"];
$sql2 = $_GET["sql2"];
$mon = $_GET["mon"];
$fecha = $_GET["fecha"];
$anocierre = $_GET["anocierre"];
$prenivdis = $_GET["prenivdis"];
$codigo = $_GET["codigo"];
$cta = $_GET["cta"];
$otro = $_GET["otro"];
$tipo = $_GET["tipo"];
$refmov = $_GET["refmov"];
$mensaje = $_GET["mensaje"];
$monacu = $_GET["monacu"];
$codigo = $_GET["codigo"];
$referencia = $_GET["referencia"];
$aumdis = $_GET["aumdis"];
$monmov = $_GET["monmov"];
$fecmov = $_GET["fecmov"];

if ($cuantos == '1') {
	gridatos1();
} else
	if ($cuantos == 'ctacontable') {
		ctacontable();
	} else
		if ($cuantos == '2') {
			gridatos2();
		} else
			if ($cuantos == 'dossql') {
				gridatosDosSql();
			} else
				if ($cuantos == "Busqueda3") {
					gridatos3(); //Busqueda que devuelve 3 valores
				} else
					if ($cuantos == 'disp') {
						disp();
					} else
						if ($cuantos == 'disp2') {
							disp2();
						} else
							if ($cuantos == 'det') {
								gridatosDet();
							} else
								if ($cuantos == 'disptrasla') {
									dispTrasla();
								} else
									if ($cuantos == 'dispotraslado') {
										dispotraslado();
									} else
										if ($cuantos == "validarFechaPresup") {
											validarFechaPresup($sql); //Busqueda que devuelve 3 valores
										} else
											if ($cuantos == "PreCompro-Grip") {
												PreCompro_gridatos1();
											} else
												if ($cuantos == "PreCompro-Asignacion") {
													$coldispo = $_GET["coldispo"];
													$colmonto = $_GET["colmonto"];
													if (Hay_Asignacion()) {
														if ($Hay_Disponibilidad) {
															//ActualizarTotalCompro();
?><script>
        opener.actualizar_saldos();
        close();
      </script><?

														} else {
?>
        <script>
           f=opener.document.form1;
           f.<?print $coldispo; ?>.value='0.00';
           f.<?print $colmonto; ?>.value='0.00';
           f.<?print $colmonto; ?>.select;
           close();
        </script>
        <?

															Mensaje("El Monto a Precomprometer es mayor al Disponible.");
														}

													} else {
?>
      <script>
         f=opener.document.form1;
         f.<?print $coldispo; ?>.value='0.00';
         f.<?print $colmonto; ?>.value='0.00';
         f.<?print $colmonto; ?>.select;
         close();
      </script>
      <?

														Mensaje("El Monto debe ser Mayor que 0.");
													}

												} else
													if ($cuantos == 'hayasig') {
														hayasig();
													} else
														if ($cuantos == 'detmov') {
															MostrarDetalleMovimiento();
														} else
															if ($cuantos == 'valfecaju') {
																ValidarFechaAjuste();
															}

//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

function dispotraslado() {
	global $bd;
	global $sql;
	global $refmov;
	global $codigo;
	global $tipo;
	global $otro;
	global $anocierre;
	global $prenivdis;
	global $monmov;
	global $id;

	$z = new tools();

	$referencia = split('/', $otro);

	//Para obtener el tipo de movimiento
	if ($tipo == 'P') {
		//$sql="select tipprc as tipdoc from cpprecom";
		$sql = "select tipprc as tipdoc from cpprecom where refprc='$refmov' and staprc='A'";
	}
	elseif ($tipo == 'C') {
		//$sql="select tipcom as tipdoc from cpcompro";
		$sql = "select tipcom as tipdoc from cpcompro where refcom='$refmov' and stacom='A'";
	}
	elseif ($tipo == 'A') {
		//$sql="select tipcau as tipdoc from cpcausad";
		$sql = "select tipcau as tipdoc from cpcausad where refcau='$refmov' and stacau='A'";
	}
	elseif ($tipo == 'G') {
		//$sql="select tippag as tipdoc from cppagos";
		$sql = "select tippag as tipdoc from cppagos where refpag='$refmov' and stapag='A'";
	}

	if ($tb = $z->buscar_datos($sql)) {
		$tipdoc = $tb->fields["tipdoc"];
	}

	if ($tipo == 'P') {
		$AfeDis = "S";

	}
	elseif ($tipo == 'C') {
		$sql = "Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as Afedis,
		        (case when RefPrc='S' then 'P' else 'N' end) as refier from CPDocCom where TipCom='" . $tipdoc . "' ";

		if ($tb = $z->buscar_datos($sql)) {
			$AfeDis = $tb->fields["afedis"];
			$Refiere = $tb->fields["refier"];

			if ($Refiere == 'P') {
				$sql = "select MonImp-MonCom MontoDis from CpImpPrc where CodPre='" . $codigo . "' and RefPrc='" . $referencia[0] . "'";
			}

		}

	}
	elseif ($tipo == 'A') {
		$sql = "Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as Afedis,refier from CPDocCau where TipCau='" . $tipdoc . "'";
		if ($tb = $z->buscar_datos($sql)) {
			$AfeDis = $tb->fields["afedis"];
			$Refiere = $tb->fields["refier"];

			if ($Refiere == 'P') {
				$sql = "select MonImp-MonCom as MontoDis from CpImpPrc where CodPre='" . $codigo . "' and RefPrc='" . $referencia[0] . "'";

			}
			elseif ($Refiere == 'C') {
				$sql = "select MonImp-MonCau as MontoDis from CpImpCom where CodPre='" . $codigo . "' and RefCom='" . $referencia[1] . "'";
			}
		}

	}
	elseif ($tipo == 'G') {
		$sql = "Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as Afedis,refier from CPDocPag where TipPag='" . $tipdoc . "'";

		if ($tb = $z->buscar_datos($sql)) {
			$AfeDis = $tb->fields["afedis"];
			$Refiere = $tb->fields["refier"];

			//if ($Refiere=='P'){
			//  $sql = "select MonImp-MonCom as MontoDis from CpImpPrc where CodPre='".$codigo."' and RefPrc='".$referencia[0]."'";

			//}elseif ($Refiere=='C'){
			//  $sql = "select MonImp-MonCau as MontoDis from CpImpCom where CodPre='".$codigo."' and RefCom='".$referencia[1]."'";

			//}elseif ($Refiere=='A'){
			$sql = "select MonImp-MonAju as MontoDis from CpImpPag where CodPre='" . $codigo . "' and RefPag='" . $refmov . "'";
			//}
		}

	}

	if ($AfeDis == "S") {
		//SE DEBE CHEQUEAR POR NIVEL DE DISPONIBILIDAD
		$codigobuscar = $z->formar_nivelDisponibilidad($codigo, $prenivdis);
		$sql = "select sum(mondis) as montodis from cpasiini
		          where codpre like trim('" . $codigobuscar . "%') and anopre='" . $anocierre . "' and perpre='00'";
	}
	//echo $sql;
	if ($tb = $z->buscar_datos($sql)) {
		$ChequearDisponibilidad = $tb->fields["montodis"];
	} else {
		$ChequearDisponibilidad = 0;
	}

	//echo  $monmov. " p ";
	//echo  $ChequearDisponibilidad;
	//exit();

	if ($monmov > $ChequearDisponibilidad) {
?>
    <script>
      var id = '<? print $id; ?>';
      opener.$(id).value=0;
      //opener.$(id).focus();
    </script>
    <?

		cerrar();
		Mensaje('El Monto a Ajustar es mayor al Monto Permitido.');
	}
	cerrar();
}

function gridatos1() {
	global $bd;
	global $id;
	global $donde;
	global $foco;
	global $sql;
	$z = new tools();

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);

	if ($tb = $z->buscar_datos($sql)) {
		$valor = $tb->fields["campo1"];
?>

      <script>
        var donde= '<? print $donde;?>';
        var foco= '<? print $foco;?>';
        var valor= '<? print $valor;?>';
        opener.document.getElementById(donde).value=valor;
        opener.document.getElementById(foco).focus();
        close();
      </script>
    <?

	} else {
?>
      <script>
        alert("Codigo Presupuestario No Existe o No tiene Asignación Inicial");
        var id= '<?=$id;?>';
        var donde= '<? print $donde;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(donde).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?

	}
}

function ctacontable() {
	global $bd;
	global $id;
	global $donde;
	global $foco;
	global $sql;
	$z = new tools();

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);

	if ($tb = $z->buscar_datos($sql)) {
		$valor = $tb->fields["campo1"];
?>

      <script>
        var donde= '<? print $donde;?>';
        var foco= '<? print $foco;?>';
        var valor= '<? print $valor;?>';
        opener.document.getElementById(donde).value=valor;
        opener.document.getElementById(foco).focus();
        close();
      </script>
    <?

	} else {
?>
      <script>
        alert("Código Contable No Existe");
        var id= '<?=$id;?>';
        var donde= '<? print $donde;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(donde).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?

	}
}

function gridatos2() //devuleve dos valores
{
	global $bd;
	global $id;
	global $donde;
	global $donde2;
	global $foco;
	global $sql;
	$z = new tools();

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);

	if ($tb = $z->buscar_datos($sql)) {
		$valor = $tb->fields["campo1"];
		$valor2 = $tb->fields["campo2"];
?>

      <script>
        var donde= '<? print $donde;?>';
        var donde2= '<? print $donde2;?>';
        var foco= '<? print $foco;?>';
        var valor= '<? print $valor;?>';
        var valor2= '<? print $valor2;?>';
        opener.document.getElementById(donde).value=valor;
        opener.document.getElementById(donde2).value=valor2;
        opener.document.getElementById(foco).focus();
        close();
      </script>
    <?

	} else {
?>
      <script>
        alert("No se ha encontrado ningun dato");
        var id= '<?=$id;?>';
        var donde= '<? print $donde;?>';
        var donde2= '<? print $donde2;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(donde).value="";
        opener.document.getElementById(donde2).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?

	}
}

function gridatos3() //Busqueda que devuelve 3 valores
{
	global $bd;
	global $foco;
	global $sql;
	$z = new tools();

	$campo = $_GET["campo"];
	$campo2 = $_GET["campo2"];
	$campo3 = $_GET["campo3"];
	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);

	if ($tb = $z->buscar_datos($sql)) {
		$valor1 = $tb->fields["codigo"];
		$valor2 = $tb->fields["nombre_extendido"];
		$valor3 = $tb->fields["refiere"];
?>
      <script>
        //var donde= '<? print $donde;?>';
        var foco= '<? print $foco;?>';
        var campo= '<? print $campo;?>';
        var campo2= '<? print $campo2;?>';
        var campo3= '<? print $campo3;?>';

        var valor1= '<? print $valor1;?>';
        var valor2= '<? print $valor2;?>';
        var valor3= '<? print $valor3;?>';
        opener.document.getElementById(campo).value=valor1;
        opener.document.getElementById(campo2).value=valor2;
        opener.document.getElementById(campo3).value=valor3;
        opener.document.getElementById(foco).focus();

        //Desactivar el boton de Ref. Precompromiso
        if (valor3=='A'){ opener.document.form1.busq_refpre.disabled=false; } else { opener.document.form1.busq_refpre.disabled=true;  }

        close();
      </script>
    <?

	} else {
?>
      <script>
        alert("No se ha encontrado ningun dato");
        var id= '<?=$campo;?>';
        var donde= '<? print $campo2;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(donde).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?

	}
}

function gridatosDosSql() {
	global $bd;
	global $id;
	global $donde;
	global $foco;
	global $sql;
	global $sql2;
	global $mensaje;
	global $anocierre;

	$MonDis = 1;   //Para que no validara el monto disponible
	$z = new tools();

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);
	$sql2 = str_replace("¿", "'", $sql2);
	$sql2 = str_replace("�", "'", $sql2);

	if ($tb = $z->buscar_datos($sql)) {
		//$valor = $tb->fields["campo1"];
		///////////////

		//if ($tb2 = $z->buscar_datos($sql2)) {
		//Para que no validara el monto disponible
		if ($anocierre)	 $MonDis = $valor = Monto_disponible_ejecucion($anocierre, $sql2 . '%', '00');

		if ($MonDis >= 0){
?>
          <script>
          var id= '<? print $foco;?>';
          if (parseInt(id.length)==3)
            {
              j=parseInt(id.substring(1,2));
            }
            else
            {
              j=parseInt(id.substring(1,3));
            }

            var y="x"+j+"4"  //Posicion del Monto onible

            var mondis= '<? print $MonDis; ?>';
            var donde = '<? print $donde;?>';
            var foco  = '<? print $foco;?>';
            var valor = '<? print $valor;?>';

      //Monto Disponible
            mondis=parseFloat(mondis);
            mondis=format(mondis.toFixed(2),'.','.',',');
            opener.document.getElementById(y).value=mondis;

            opener.document.getElementById(donde).value=valor;
            opener.document.getElementById(foco).focus();
            opener.document.getElementById(foco).select();
            close();
          </script>
        <?


		} else {
			Mensaje($mensaje);
?>
          <script>
            var id= '<?=$id;?>';
            var donde= '<? print $donde;?>';
            opener.document.getElementById(id).value="";
            opener.document.getElementById(donde).value="";
            opener.document.getElementById(id).focus();
            close();
          </script>
        <?

		}
	} else {
?>
      <script>
        alert("No se ha encontrado ningun dato");
        var id= '<?=$id;?>';
        var donde= '<? print $donde;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(donde).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?

	}
}

function disp() {
	global $bd;
	global $z;
	global $id;
	global $donde;
	global $foco;
	global $sql;
	global $mon;
	global $fecha;
	global $anocierre;
	global $prenivdis;
	global $codigo;

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);

	if ($tb = $z->buscar_datos($sql)) {

		$valor = $tb->fields["campo1"];

		$codigobuscar = $z->formar_nivelDisponibilidad($codigo, $prenivdis);
		//Hay asignacion
		/*$sql2 = "select sum(mondis) as mondis from cpasiini
		          where codpre like trim('" . $codigobuscar . "%') and anopre='" . $anocierre . "' and perpre='00'";
		*/
		//if ($tb2 = $z->buscar_datos($sql2))
		$mondis = Monto_disponible_ejecucion($anocierre,$codigobuscar,'00');
		if ($mondis > 0)
		{
			$hay_asig = true;
			//Obtener Modificado
			$sql3 = "select pereje from cppereje where to_date('" . $fecha . "','dd/mm/yyyy') between fecdes and fechas";
			if ($tb3 = $z->buscar_datos($sql3)) {
				$periodomodif = $tb3->fields["pereje"];
			}

			//echo $montomodif = Monto_disponible_ejecucion($anocierre,$codigobuscar,'00');

/*			$sql3 = "select coalesce(sum(montra),0) as montra,coalesce(sum(monadi),0) as monadi,coalesce(sum(moncom),0) as moneje
			           from cpasiini where codpre like trim('" . $codigobuscar . "') and
			           anopre='" . $anocierre . "' and perpre>='" . $periodomodif . "' and perpre<>'00' ";

			print $sql3;exit;
			if ($tb3 = $z->buscar_datos($sql3)) {
				echo $montomodif = $tb3->fields["montra"] + $tb3->fields["monadi"] - $tb3->fields["moneje"];
			} else {
				$montomodif = 0;
			}
*/
			////
			//print $mon . 'xxxxxx ' . (($tb2->fields["mondis"]) - ($montomodif));

			//if ($mon <= ( $mondis  - $montomodif)) {
			if ($mon <= ( $mondis)) {
				if ((float) $mon <= $mondis) {
					$hay_disp = true;
				} else {
					$hay_disp = false;

				}
			} else {
				$hay_disp = false;

			}
		} else {
			$hay_asig = false;

		}

		/////////
?>

      <script>
        var donde= '<? print $donde;?>';
        var foco= '<? print $foco;?>';
        var valor= '<? print $valor;?>';
        var mon= '<? print $mon;?>';
        var id= '<? print $id;?>';
        var hay_asig='<? print $hay_asig;?>';
        var hay_disp='<? print $hay_disp;?>';

          if (hay_asig)
          {
              if (hay_disp)
              {
                opener.document.getElementById('getf').value='N';
                mon=TrimString(mon);
                if ((mon!='') && (mon!='0.00'))
                {
                  dif=parseFloat(valor-mon);
                  dif=format(dif.toFixed(2),'.','.',',');
                  opener.document.getElementById(donde).value=dif;
                }
                else
                {
                  valor=parseFloat(valor);
                  valor=format(valor.toFixed(2),'.','.',',');
                  opener.document.getElementById(donde).value=valor;
                }
                opener.document.getElementById(foco).focus();
                opener.document.getElementById(foco).select();
                close();
              }
              else//no hay disponibilidad
              {
                var donde= '<? print $donde;?>';
                alert("El Monto a Precomprometer es mayor al Disponible");
                opener.document.getElementById('getf').value='N';
                opener.document.getElementById(id).value="0.00";
                opener.actualizarsaldos2();
                opener.document.getElementById(donde).value="0.00";
                close();
              }
          }
          else//no hay asignacion
          {
            var donde= '<? print $donde;?>';
            alert("Este Título no tiene Asignación Inicial");
            opener.document.getElementById('getf').value='N';
            opener.document.getElementById(id).value="0.00";
            //opener.document.getElementById(donde).value="0.00";
            close();
          }
      </script>
    <?

	} else {
?>
      <script>
        var id= '<? print $id;?>';
        var donde= '<? print $donde;?>';
        opener.document.getElementById('getf').value='N';
        opener.document.getElementById(id).value="0.00";
        //opener.document.getElementById(donde).value="0.00";
        close();
      </script>
    <?

	}
}

function disp2() {
	global $bd;
	global $z;
	global $id;
	global $foco;
	global $sql;
	global $mon;
	global $fecha;
	global $anocierre;
	global $prenivdis;
	global $codigo;
	global $otro;

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);

	$PeriodoAsignacion = "00";

	if ($tb = $z->buscar_datos($sql)) {
		//$valor = $tb->fields["campo1"];

		$codigobuscar = $z->formar_nivelDisponibilidad($codigo, $prenivdis);

		//Hay asignacion
		$sql2 = "select sum(mondis) as mondis from cpasiini
		          where codpre like trim('" . $codigobuscar . "%') and anopre='" . $anocierre . "' and perpre='00'";

		if ($tb2 = $z->buscar_datos($sql2)) {
			//$valor = $tb2->fields["mondis"];
			$valor = Monto_disponible_ejecucion($anocierre, $codigobuscar . '%', $PeriodoAsignacion);
			$hay_asig = true;
			//Obtener Modificado
			$sql3 = "select pereje from cppereje where to_date('" . $fecha . "','dd/mm/yyyy') between fecdes and fechas";
			if ($tb3 = $z->buscar_datos($sql3)) {
				$periodomodif = $tb3->fields["pereje"];
			}
			$sql3 = "select coalesce(sum(montra),0) as montra,coalesce(sum(monadi),0) as monadi,coalesce(sum(moncom),0) as moneje
			           from cpasiini where codpre like trim('" . $codigobuscar . "') and
			           anopre='" . $anocierre . "' and perpre>'" . $periodomodif . "' and perpre<>'00' ";
			if ($tb3 = $z->buscar_datos($sql3)) {
				$montomodif = $tb3->fields["montra"] + $tb3->fields["monadi"] - $tb3->fields["moneje"];
			} else {
				$montomodif = 0;
			}

			if ($mon <= $valor) {
				if ((float) $mon <= $valor - ($montomodif)) {
					$hay_disp = true;
					$montoDisponible = $valor - ($montomodif);
				} else {
					$hay_disp = false;
					$montoDisponible = 0;

				}
			} else {
				$hay_disp = false;
				$montoDisponible = 0;

			}
		} else {
			$hay_asig = false;
			$montoDisponible = 0;

		}
		/////////
?>
      <script>
        var foco              = '<? print $foco; ?>';
        var valor             = '<? print $valor;?>';
        var mon               = '<? print $mon;  ?>';
        var id                = '<? print $id;   ?>';
        var hay_asig          = '<? print $hay_asig;?>';
        var hay_disp          = '<? print $hay_disp;?>';
        var idmontodisponible = '<? print $otro; ?>';
        var montoDisponible   = '<? print $montoDisponible;?>';

	      if (parseInt(id.length)==3)
	      {
	        j=parseInt(id.substring(1,2));
	      }
	      else
	      {
	        j=parseInt(id.substring(1,3));
	      }

	    var id10="x"+j+"10";

          if (hay_asig)
          {
              if (hay_disp)
              {
                opener.document.getElementById('getf').value = 'N';
                mon = TrimString(mon);
                opener.$(id10).value = format(valor - mon,'.','.',',');;
                opener.$(idmontodisponible).value = montoDisponible;
                opener.document.getElementById(foco).focus();
                opener.document.getElementById(foco).select();
                close();
              }
              else  //no hay disponibilidad
              {
                var donde= '<? print $donde;?>';
                alert("El Monto a Causar es mayor al Disponible");
                opener.document.getElementById('getf').value='N';
                opener.$(idmontodisponible).value = 0;
                opener.document.getElementById(id).value="0.00";
                opener.actualizarsaldos2();
                close();
              }
          }
          else//no hay asignacion
          {
            var donde= '<? print $donde;?>';
            alert("Este Título no tiene Asignación Inicial");
            opener.document.getElementById('getf').value='N';
            opener.$(idmontodisponible).value = 0;
            opener.document.getElementById(id).value="0.00";
            close();
          }
      </script>
    <?

	} else {
?>
      <script>
        var id= '<? print $id;?>';
        var donde= '<? print $donde;?>';
        opener.document.getElementById('getf').value='N';
        opener.document.getElementById(id).value="0.00";
        opener.$(idmontodisponible).value = 0;
        close();
      </script>
    <?

	}
	return "jesus";
}

function validarFechaPresup($fecha) {
	$x = new tools();
	global $bd;
	global $foco;

	if (strlen($fecha) == 10) {
		//chekea periodo cerrado
		$sql = "select * from CPDEFNIV where to_date('" . $fecha . "','DD/MM/YYYY') between FecIni and FecCie";
		if (!$tb = $x->buscar_datos($sql)) {
			Mensaje("La Fecha esta fuera del Período");
			cerrar();
			return false;

		}
	} else
		if ($fecha != '') {
			Mensaje("Formato de Fecha Inválido...");
			cerrar();
			return false;
		}
	cerrar();
?>
    <script>
         var elem='<? echo $foco; ?>';
      //opener.document.form1.despag.focus();
      opener.document.getElementById(elem).focus();

    </script>
    <?

}

function Hay_Asignacion() {
	global $bd;
	global $Hay_Disponibilidad;
	$z = new tools();

	$anocierre = $_GET["anocierre"];
	$feccom = $_GET["feccom"];
	$NivelDisponibilidad = $_GET["NivelDisponibilidad"];
	$codigobuscar = $_GET["codigobuscar"];
	$montocom = $_GET["montocom"];
	$coldispo = $_GET["coldispo"];

	$PeriodoAsignacion = "00";
	if (!instr($codigobuscar, '%', 0, 1)) {
		$codigobuscar = $codigobuscar . '%';
	}

	$sql = "select Sum(MonDis) as  MonDis From CPAsiIni where CodPre Like '$codigobuscar' and AnoPre='$anocierre' and PerPre='$PeriodoAsignacion'";
	//exit();
	if ($tb = $z->buscar_datos($sql)) {
		//$mondis=$tb->fields["mondis"];
		$mondis = Monto_disponible_ejecucion($anocierre, $codigobuscar . '%', $PeriodoAsignacion);
		$Hay_Asignacion = true;
		// 'primero Validamos Disponibilidad Anual
		$MontoModif = Obtener_Modificado($codigobuscar, $feccom, $anocierre);
		///
		if ($montocom <= $mondis) {
			if ($montocom <= ($mondis - $MontoModif)) {
				$Hay_Disponibilidad = true;
				if ($coldispo <> '0') {
					if ($aumdis == 'A') {
?>
              <script>
                 f=opener.document.form1;
                 var num1=parseFloat('<? echo $mondis; ?>');
                 var num2=parseFloat('<? echo $montocom; ?>');
                 //valor='<? echo $mondis; ?>' + '<? echo $montocom; ?>';
                 valor = num1 + num2;
                 f.<?print $coldispo; ?>.value=format(valor.toFixed(2),'.','.',',');
                 //opener.document.getElementById(<?print $coldispo; ?>).value=format(valor.toFixed(2),'.','.',',');
              </script>
              <?

					} else {
?>
              <script>
                 f=opener.document.form1;
                 var num1=parseFloat('<? echo $mondis; ?>');
                 var num2=parseFloat('<? echo $montocom; ?>');
                 // valor='<? echo $mondis; ?>' - '<? echo $montocom; ?>';
                 valor = num1 - num2;
                 f.<?print $coldispo; ?>.value=format(valor.toFixed(2),'.','.',',');
                 //opener.document.getElementById(<?print $coldispo; ?>).value=format(valor.toFixed(2),'.','.',',');
                // f.x21.focus;
              </script>
              <?

					}
				}
			} else {
				$Hay_Disponibilidad = false;
				//Mensaje($Hay_Disponibilidad);
				if ($coldispo <> '0') {
					if ($aumdis == 'D') {
?>
              <script>
                 f=opener.document.form1;
                 var num1=parseFloat('<? echo $mondis; ?>');
                 var num2=parseFloat('<? echo $MontoModif; ?>');
                 valor = num1 - num2;

                 // valor='<? echo $mondis; ?>' - '<? echo $MontoModif; ?>';
                 f.<?print $coldispo; ?>.value=format(valor.toFixed(2),'.','.',',');
                //  opener.document.getElementById('<?print $coldispo; ?>').value=format(valor.toFixed(2),'.','.',',');
              </script>
              <?

					} else {
?>
              <script>
                 f=opener.document.form1;
                 var num1=parseFloat('<? echo $mondis; ?>');
                 var num2=parseFloat('<? echo $MontoModif; ?>');
                 valor = num1 + num2;

                 // valor='<? echo $mondis; ?>' - '<? echo $MontoModif; ?>';
                 f.<?print $coldispo; ?>.value=format(valor.toFixed(2),'.','.',',');
                 //opener.document.getElementById('<?print $coldispo; ?>').value=format(valor.toFixed(2),'.','.',',');
              </script>
              <?

					}
				}

			}

		} else //No consigue datos
			{
			$Hay_Disponibilidad = false;
			if ($coldispo <> '0') {
				if ($aumdis == 'D') {
?>
              <script>
                 f=opener.document.form1;
                 var num1=parseFloat('<? echo $mondis; ?>');
                 var num2=parseFloat('<? echo $MontoModif; ?>');
                 valor = num1 + num2;

                 // valor='<? echo $mondis; ?>' - '<? echo $MontoModif; ?>';
                 f.<?print $coldispo; ?>.value=format(valor.toFixed(2),'.','.',',');
              </script>
              <?

				} else {
?>
              <script>
                 f=opener.document.form1;
                 var num1=parseFloat('<? echo $mondis; ?>');
                 var num2=parseFloat('<? echo $MontoModif; ?>');
                 valor = num1 + num2;

                 // valor='<? echo $mondis; ?>' - '<? echo $MontoModif; ?>';
                 f.<?print $coldispo; ?>.value=format(valor.toFixed(2),'.','.',',');
              </script>
              <?

				}
			}
		}
	} else {
		$Hay_Asignacion = false;
	}

	return $Hay_Asignacion;
}

function Obtener_Modificado($codigobuscar, $feccom, $anocierre) {
	global $bd;
	$z = new tools();

	$sql = "select Pereje from CpPerEje where To_Date('$feccom','DD/MM/YYYY') Between FecDes and FecHas";
	if ($tb = $z->buscar_datos($sql)) {
		$PeriodoModif = $tb->fields["pereje"];
	}

	$sql = "Select coalesce(Sum(MonTra),0) as MonTra, coalesce(Sum(MonAdi),0) as MonAdi, coalesce(Sum(MonCom),0) as MonEje From CPAsiIni where CodPre Like '$codigobuscar' and AnoPre='$anocierre' and PerPre > '$PeriodoModif' And PerPre<>'00'";
	if ($tb = $z->buscar_datos($sql)) {
		$Obtener_Modificado = $tb->fields["montra"] + $tb->fields["monadi"] - $tb->fields["moneje"];

	} else {
		$Obtener_Modificado = 0;
	}

	return $Obtener_Modificado;
}

function PreCompro_gridatos1() {
	global $bd;
	global $cta;
	global $id;
	global $donde;
	global $foco;
	global $sql;
	global $sql2;
	global $anocierre;
	$z = new tools();

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);

	$sql2 = str_replace("¿", "'", $sql2);
	$sql2 = str_replace("�", "'", $sql2);

	$disponibilidad = 0;
	if ($tb = $z->buscar_datos($sql)) {
		$valor = $tb->fields["campo1"];

		//if ($tb = $z->buscar_datos($sql2)) {
		//	$disponibilidad = $tb->fields["mondis"];
		//}
		$disponibilidad = Monto_disponible_ejecucion($anocierre, $sql2 . '%', '00');

?>
      <script>
        var id             = '<? print $id;?>';

        if (parseInt(id.length)==3)
        {
          j=parseInt(id.substring(1,2));
        }
        else
        {
          j=parseInt(id.substring(1,3));
        }
        var campo7="x"+j+"5" //Columna de Disponibilidad
        //var campo7         = id.substring(0,2)+"5"; // x?7
	    var id10="x"+j+"10";  //Saldo para Pagar


        var disponibilidad = '<? print $disponibilidad;?>';
        var donde          = '<? print $donde;?>';
        var foco           = '<? print $foco;?>';
        var valor          = '<? print $valor;?>';

        opener.document.getElementById(campo7).value = format(disponibilidad,'.','.',',');
        opener.document.getElementById(donde).value  = '0.00';
        opener.document.getElementById(foco).select();
        close();
      </script>
    <?

	} else {
?>
      <script>
        alert("Codigo Presupuestario No Existe o No tiene Asignación Inicial");
        var id= '<?=$id;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?

	}
}

function gridatosDet() {
	global $bd;
	global $id;
	global $donde;
	global $foco;
	global $sql;
	global $otro;
	global $tipo;
	global $refmov;
	global $fecha;
	global $fecmov;

	$sql = str_replace("¿", "'", $sql);
	$sql = str_replace("�", "'", $sql);
	$tb = $bd->select($sql);
	if (!$tb->EOF) {
		$valor = $tb->fields["campo1"];
		$valor2 = rtrim($tb->fields["campo2"]);
		$valor3 = rtrim($tb->fields["campo3"]);
?>
      <script>
        var donde  = '<? print $donde;?>';
        var foco   = '<? print $foco;?>';
        var valor  = '<? print $valor;?>';
        var otro   = '<? print $otro;?>';
        var valor2 = '<? print $valor2;?>';
        var valor3 = '<? print $valor3;?>';
        opener.document.getElementById(donde).value  = valor;
        opener.document.getElementById(otro).value   = valor2;
        if (opener.$('tipdoc')){  opener.$('tipdoc').value  = valor3; }
        opener.document.getElementById(foco).focus();
        opener.document.getElementById(foco).select();
      </script>
    <?

		if ($tipo == "MOV") //para  el caso especifico de movimientos (causados, pagados, etc) mostrar el detalle
			{
			$fecmov = $valor;
			MostrarDetalleMovimiento();
		} //if ($tipo=="MOV")

	} //if ($tb=$z->buscar_datos($sql))
	else {
?>
      <script>
        alert("Esta Referencia no se puede ajustar...");
        var id= '<?=$id;?>';
        var donde= '<? print $donde;?>';
        var otro= '<? print $otro;?>';
        var tipo= '<? print $tipo;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(donde).value="";
        opener.document.getElementById(otro).value="";
        if (tipo=='MOV') //para  el caso especifico de movimientos (causados, pagados, etc) mostrar el detalle
          {
          //limpiar grid
          for (fila=1;fila<=20;fila++)
          {
            var x1="x"+fila+"1";
            var x2="x"+fila+"2";
            var x3="x"+fila+"3";
            var x4="x"+fila+"4";
            var x5="x"+fila+"5";
            var x6="x"+fila+"6";
            opener.document.getElementById(x1).value="";
            opener.document.getElementById(x2).value="0.00";
            opener.document.getElementById(x3).value="0.00";
            opener.document.getElementById(x4).value="";
            opener.document.getElementById(x5).value="";
            opener.document.getElementById(x6).value="";
          }//for
        } //if ($tipo=="MOV")
        opener.document.getElementById(id).focus();
      </script>
    <?

	}
?>
    <script>
    close();
    </script>
    <?

}

function MostrarDetalleMovimiento() {
	global $bd;
	global $sql2;
	global $refmov;
	global $fecha;
	global $fecmov;
	global $cuantos;

	$refmov = trim($refmov);
	$sql2 = str_replace("¿", "'", $sql2);
	$sql2 = str_replace("�", "'", $sql2);
	$tbDet = $bd->select($sql2);
	$pos = 1;

	while (!$tbDet->EOF) {
		$Mostrar = 'N';
		$montoimp = 0;
		if ($refmov == "C") //Compromiso
			{
			if (($tbDet->fields["monimp"] - $tbDet->fields["monaju"] - $tbDet->fields["moncau"]) > 0) {
				$montoimp = $tbDet->fields["monimp"] - $tbDet->fields["monaju"] - $tbDet->fields["moncau"];
				$Mostrar = 'S';
				$refere = $tbDet->fields["refere"];
?>
        <script>
          var refere= '<? print $refere;?>';
          var i= '<? print $pos;?>';
          var x4="x"+i+"4";
          opener.document.getElementById(x4).value=refere;

        </script>
        <?

			}
		} //if ($refmov=="C")

		if ($refmov == "A") //Causados
			{
			if (($tbDet->fields["monimp"] - $tbDet->fields["monaju"] - $tbDet->fields["monpag"]) > 0) {
				$montoimp = $tbDet->fields["monimp"] - $tbDet->fields["monaju"] - $tbDet->fields["monpag"];
				$Mostrar = 'S';
				$refprc = $tbDet->fields["refprc"];
				$refere = $tbDet->fields["refere"];
?>
        <script>
          var refere= '<? print $refere;?>';
          var refprc= '<? print $refprc;?>';
          var i= '<? print $pos;?>';
          var x4="x"+i+"4";
          var x5="x"+i+"5";
          opener.document.getElementById(x4).value=refprc;
          opener.document.getElementById(x5).value=refere;

        </script>
        <?

			}
		} //if ($refmov=="A")

		if ($refmov == "G") //Pagados
			{
			if (($tbDet->fields["monimp"] - $tbDet->fields["monaju"]) > 0) {
				$montoimp = $tbDet->fields["monimp"] - $tbDet->fields["monaju"];
				$Mostrar = 'S';
				$refprc = $tbDet->fields["refprc"];
				$refcom = $tbDet->fields["refcom"];
				$refere = $tbDet->fields["refere"];
?>
        <script>
          var refere= '<? print $refere;?>';
          var refcom= '<? print $refcom;?>';
          var refprc= '<? print $refprc;?>';
          var i= '<? print $pos;?>';
          var x4="x"+i+"4";
          var x5="x"+i+"5";
          var x6="x"+i+"6";
          opener.document.getElementById(x4).value=refprc;
          opener.document.getElementById(x5).value=refcom;
          opener.document.getElementById(x6).value=refere;

        </script>
        <?

			}
		} //if ($refmov=="G")

		if ($refmov == "P") //Precompromisos
			{
			if (($tbDet->fields["monimp"] - $tbDet->fields["monaju"]) > 0) {
				$montoimp = $tbDet->fields["monimp"] - $tbDet->fields["monaju"];
				$Mostrar = 'S';

			}
		} //if ($refmov=="P")

		if ($Mostrar == "S") //Mostrar los datos en el grid
			{
			$codpre = $tbDet->fields["codpre"];
			$monaju = number_format(0, 2, '.', ',');
			$montoimp = number_format($montoimp, 2, '.', ',');
?>
         <script>
          var codpre= '<? print $codpre;?>';
          var monaju= '<? print $monaju;?>';
          var montoimp= '<? print $montoimp;?>';
          var i= '<? print $pos;?>';
          var x1="x"+i+"1";
          var x2="x"+i+"2";
          var x3="x"+i+"3";
          opener.document.getElementById(x1).value=codpre;
          opener.document.getElementById(x2).value=monaju;
          opener.document.getElementById(x3).value=montoimp;

        </script>
         <?

			$pos = $pos +1;
		} //  if ($Mostrar=="S")
		$tbDet->MoveNext();
	} //while

	if ($pos == 1) //el movimiento no puede ser ajustado
		{
		Mensaje("Este Movimiento no puede ser Ajustado");
?>
       <script>
      opener.document.getElementById('refmov').value="";
      opener.document.getElementById('desmov').value="";
      opener.document.getElementById('fecmov').value="";
      opener.document.getElementById('refmov').focus();
      opener.document.getElementById('refmov').select();
      for (fila=1;fila<=20;fila++)
      {
        var x1="x"+fila+"1";
        var x2="x"+fila+"2";
        var x3="x"+fila+"3";
        var x4="x"+fila+"4";
        var x5="x"+fila+"5";
        var x6="x"+fila+"6";
        opener.document.getElementById(x1).value="";
        opener.document.getElementById(x2).value="0.00";
        opener.document.getElementById(x3).value="0.00";
        opener.document.getElementById(x4).value="";
        opener.document.getElementById(x5).value="";
        opener.document.getElementById(x6).value="";
      }//for
      </script>
      <?

	} //  if  ($pos==1) //el movimiento no puede ser ajustado
	else {
		//validar fecha  del movimiento comparada con la fecha  del ajuste
		ValidarFechaAjuste();
	}

	if ($cuantos == 'detmov') {
?>
       <script>
        close();
       </script>
       <?

	} // if ($cuantos=='detmov')
}

function ValidarFechaAjuste() {
	global $cuantos;
	global $fecha;
	global $fecmov;

	$tool = new tools();

	if ($tool->Validar_Periodo($fecha, "CPDefNiv")) {
		if ($tool->validarFechaPresup($fecha)) {
			$splitfecha = split('/', $fecha); //Fecha Ajuste
			$splitfecotr = split('/', $fecmov); //Fecha Movimiento
			$fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
			$fecotr_for = $splitfecotr[2] . "-" . $splitfecotr[1] . "-" . $splitfecotr[0];

			if ((!empty ($fecmov)) and (strtotime($fecha_for) < strtotime($fecotr_for))) {
				Mensaje("La Fecha del Ajuste no puede ser menor a la Fecha del Movimiento");
?>
          <script>
            opener.document.getElementById('fecha').value="";
            opener.document.getElementById('fecha').focus();
          </script>
          <?

			}
		} //  if  ((!empty($fecmov))  and (strtotime($fecha_for) < strtotime($fecotr_for)))
		else {
			if ($cuantos == 'valfecaju') {
?>
          <script>
            opener.document.getElementById('desc').focus();
          </script>
          <?

			} //if ($cuantos=='valfecaju')
		}
	} else {
?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?

	}

	if ($cuantos == 'valfecaju') {
?>
       <script>
        close();
       </script>
       <?

	} // if ($cuantos=='detmov')
}

function dispTrasla() {
	global $bd;
	global $z;
	global $id;
	global $sql;
	global $monacu;
	global $anocierre;
	global $prenivdis;
	global $codigo;
	global $referencia;

	$codigobuscar = $z->formar_nivelDisponibilidad($codigo, $prenivdis);

	//Hay asignacion
	$sql2 = "select sum(mondis) as mondis from cpasiini
	          where codpre like trim('" . $codigobuscar . "%') and anopre='" . $anocierre . "' and perpre='00'";

	if ($tb2 = $z->buscar_datos($sql2)) {
		$hay_asig = true;
		//$MonDis=$tb2->fields["mondis"];
		$MonDis = Monto_disponible_ejecucion($anocierre, $codigobuscar . '%', '00');
		//Verifico que tenga Precompromiso para s umarselo al monto disponible y asi poder modificar la Solicitud
		$aux = substr($referencia, 2);
		$aux = "TR" . $aux;
		$sql3 = "Select Sum(monimp) as monimp from CPImpPrc where trim(RefPrc) = '" . trim($aux) . "'  and CodPre like trim('" . $codigobuscar . "%') ";
		if ($tb3 = $z->buscar_datos($sql3)) {
			$Disponibilidad = $MonDis + $tb3->fields["monimp"];
		} else {
			$Disponibilidad = $MonDis;
		}

		////
		if ($monacu <= $Disponibilidad) {
			$hay_disp = true;
		} else {
			$hay_disp = false;
		}
	} else {
		$hay_asig = false;
	}
	/////////
?>

      <script>
        var id= '<? print $id;?>';
        var hay_asig='<? print $hay_asig;?>';
        var hay_disp='<? print $hay_disp;?>';

          if (hay_asig)
          {
              if (hay_disp)
              {
                opener.document.getElementById('getf').value='N';
                close();
              }
              else//no hay disponibilidad
              {
                alert("El Monto del Traslado es mayor al Disponible");
                opener.document.getElementById('getf').value='N';
                opener.document.getElementById(id).value="0.00";
                opener.actualizarsaldos2();
                opener.document.getElementById(id).focus();
                opener.document.getElementById(id).select();
                close();
              }
          }
          else//no hay asignacion
          {
            alert("Este Título no tiene Asignación Inicial");
            opener.document.getElementById('getf').value='N';
            opener.document.getElementById(id).value="0.00";
            opener.actualizarsaldos2();
            opener.document.getElementById(id).focus();
            opener.document.getElementById(id).select();
            close();
          }
      </script>
    <?


}

function hayasig() {
	global $bd;
	global $z;
	global $id;

	global $sql;
	global $monmov;
	global $anocierre;
	global $prenivdis;
	global $codigo;
	global $fecha;
	global $foco;
	global $aumdis;

	$TotMonDis = 0;
	//$codigobuscar= $z->formar_nivelDisponibilidad($codigo,$prenivdis);
	$codigobuscar = $codigo;

	//Hay asignacion
	$sql = "select sum(mondis) as mondis from cpasiini
	          where codpre like trim('" . $codigobuscar . "%') and anopre='" . $anocierre . "' and perpre='00'";

	if ($tb = $z->buscar_datos($sql)) {
		$hay_asig = true;
		//$MonDis=$tb->fields["mondis"];
		$MonDis = Monto_disponible_ejecucion($anocierre, $codigobuscar . '%', '00');
		//Primero Validamos Disponibilidad Anual
		//HACER FUNCION MONTO MODIFICADO
		$sql2 = "select pereje from CpPerEje where to_date('" . $fecha . "','DD/MM/YYYY') between fecdes and fechas";
		if ($tb2 = $z->buscar_datos($sql2)) {
			$PeriodoModif = $tb2->fields["pereje"];
		}

		//////
		$sql3 = "Select coalesce(Sum(montra), 0) as montra,coalesce(Sum(monadi),0) as monadi,coalesce(Sum(moncom),0) as moneje from cpasiini
		          where codpre like trim('" . $codigobuscar . "%') and anopre='" . $anocierre . "' and perpre>'" . $PeriodoModif . "' and perpre<>'00'";
		if ($tb3 = $z->buscar_datos($sql3)) {
			//se modifico para que reste lo ejecutado en periodos posteriores
			$ObtenerModificado = (($tb3->fields["montra"] + $tb3->fields["monadi"]) - $tb3->fields["moneje"]);
			// Mensaje($tb3->fields["montra"]." ".$tb3->fields["monadi"] ." ".$tb3->fields["moneje"]);
		} // if ($tb3=$z->buscar_datos($sql3))
		else {
			$ObtenerModificado = 0;
		}


		$MonModifi = $ObtenerModificado;

		if ($monmov <= $MonDis) {
			//verificar disponibilidad para el periodo
			if ($monmov <= ($MonDis - $MonModifi)) {
				$hay_disp = true;
				if ($aumdis == "A") {
					$TotMonDis = $MonDis + $monmov;
				} //if $aumdis="A"
				else {
					$TotMonDis = $MonDis - $monmov;
				} //else if $aumdis="A"
			} //if ($monmov <= ($MonDis - $MonModifi))
			else {
				$hay_disp = false;
				if ($aumdis == "D") {
					$TotMonDis = $MonDis - $MonModifi;
				} //if $aumdis="DS
				else {
					$TotMonDis = $MonDis + $MonModifi;
				} //else if $aumdis="A"
			} //else if ($monmov <= ($MonDis - $MonModifi))
		} //if ($monmov <= $MonDis)
		else {
			//Mensaje($MonModifi);
			 $hay_disp = false;
			if ($aumdis == "D") {
				$TotMonDis = $MonDis - $MonModifi;
			} //if $aumdis="D"
			else {
				$TotMonDis = $MonDis + $MonModifi;
			} //else if $aumdis="A"
			/////
		} //else if ($monmov <= $MonDis)
	} else //if ($tb2=$z->buscar_datos($sql2))
		{
		$hay_asig = false;
	}
	/////////
	 $TotMonDis = number_format($TotMonDis, 2, '.', ',');

?>

      <script>
        var id= '<? print $id;?>';
        var hay_asig='<? print $hay_asig;?>';
        var hay_disp='<? print $hay_disp;?>';
        var aumdis='<? print $aumdis;?>';
        var foco='<? print $foco;?>';

        opener.$(foco).value='<? print $TotMonDis;?>';

          if (hay_asig)
          {
              if (aumdis=='A'){  hay_disp=true  };
              if (hay_disp)
              {
                opener.$('getf').value='N';
                opener.$(id).value='<? print number_format($monmov, 2, '.', ','); ?>';
                opener.$(foco).value='<? print $TotMonDis; ?>';
                close();
              }
              else//no hay disponibilidad
              {

                opener.$('getf').value='N';
                opener.$(id).value="0.00";
                opener.actualizarsaldos2();
                opener.$(id).focus();
                opener.$(id).select();
                close();
                alert("El Monto a Disminuir es mayor al Disponible");
              }
          }
          else//no hay asignacion
          {

            opener.$('getf').value='N';
            opener.$(id).value="0.00";
            opener.actualizarsaldos2();
            opener.$(id).focus();
            opener.$(id).select();
            close();
            alert("Este Título no tiene Asignación Inicial");
          }
      </script>
    <?
}
?>

