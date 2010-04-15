<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
<style type="text/css">
<!--
.style1 {color: #0000CC}
-->
</style>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();

$perdes="";
$perhas="";
$titulo="";
global $perdes;
global $perhas;
global $titulo;
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr> 
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date" align="right">
		<? 
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
		$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$me=$mes[date('n')];
		echo $dias[date('w')].strftime(", %d de $me del %Y")."<br>"; 
		?>          
	  </td>
    </tr>
    <tr> 
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="760"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr> 
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes 
        </p>
        <fieldset>
       
        <div align="left">&nbsp; 
          <table width="612" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> 
                  <p><font color="#000066" size="4"><strong>Ejecuci&oacute;n F&iacute;sica 
                    de las Acciones Espec&iacute;ficas del Ente 
                        <input name="titulo" type="hidden" id="titulo">
                  </strong></font></p>
                </div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td width="182" class="form_label_01">&nbsp;</td>
              <td width="170">&nbsp;</td>
              <td width="246"><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"> <div align="left"><strong>Salida del 
                  Reporte:</strong></div>                </td>
              <td> <div align="left"> </div>
                <div align="left"> <strong> 
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong> 
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td height="20" class="form_label_01">&nbsp;</td>
              <td colspan="2" valign="top"><font color="#000066" size="3"><strong><em>Criterios de Selecci&oacute;n</em></strong></font></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="5"></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="25" valign="middle"><strong>Proyecto(s):</strong></td>
              <td colspan="2" valign="middle"><label>
			  <?
			  $pry=$bd->select("select distinct a.codpro, a.nompro from fordefpry a, fordismetperpryaccmet b where trim(a.codpro) like '2%' and trim(b.codpro)= trim(a.codpro) order by codpro");
			  ?>
			  
                <select name="proy" id="proy" class="breadcrumb">
				<?
				if ($pry->EOF)
				{ ?>
                  <option value="" selected>no definido</option>
				<? }
				else
				{ ?>
                  <option value="%" selected>Todos</option>
				  <? while (!$pry->EOF)
				  	{?>
						<option value="<? print $pry->fields["codpro"];?>"><? print $pry->fields["codpro"].' - '.substr($pry->fields["nompro"],0,85);?></option>
					<? $pry->MoveNext();
					}
				}?>
                </select>
              </label></td>
            </tr>
            
            
            
            
            
            <tr bordercolor="#FFFFFF">
              <td height="28" valign="middle"><strong>Accion(es) Centralizada(s):</strong> </td>
              <td colspan="2" rowspan="2" valign="middle"><label>
			  
                <?
			  $acc=$bd->select("select distinct a.codpro, a.nompro from fordefpry a, fordismetperpryaccmet b where trim(a.codpro) like '1%' and trim(b.codpro)= trim(a.codpro) order by codpro");
			  ?>
                <select name="acc" id="acc" class="breadcrumb">
				<?
				if ($acc->EOF)
				{ ?>
                  <option value="" selected>no definida</option>
				<? }
				else
				{ ?>
                  <option value="%" selected>Todos</option>
				  <? while (!$acc->EOF)
				  	{?>
						<option value="<? print $acc->fields["codpro"];?>"><? print $acc->fields["codpro"].' - '.substr($acc->fields["nompro"],0,85);?></option>
					<? $acc->MoveNext();
					}
				}?>
                </select>
              </label></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="5"></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="23" valign="bottom"><strong>Periodos:</strong></td>
              <td></td>
              <td></td>
            </tr>
            
            
            
            
            
            
            
            
            
            <tr bordercolor="#FFFFFF">
              <td height="25" align="right" valign="top" class="form_label_01"><div align="right"><strong>Desde:</strong>&nbsp;</div></td>
              <td colspan="2" valign="top"><select name="perdes" id="perdes" class="breadcrumb">
                <option value="<? echo date('m') ?>" selected>Actual (<? echo date('m').' - '.$me ?>)</option>
                <? for ($i=1;$i<=2;$i++)
				{?>
                <option value="01">01 - Enero</option>
                <? if (date("m")==1){break;}?>
                <option value="02">02 - Febrero</option>
                <? if (date("m")==2){break;}?>
                <option value="03">03 - Marzo</option>
                <? if (date("m")==3){break;}?>
                <option value="04">04 - Abril</option>
                <? if (date("m")==4){break;}?>
                <option value="05">05 - Mayo</option>
                <? if (date("m")==5){break;}?>
                <option value="06">06 - Junio</option>
                <? if (date("m")==6){break;}?>
                <option value="07">07 - Julio</option>
                <? if (date("m")==7){break;}?>
                <option value="08">08 - Agosto</option>
                <? if (date("m")==8){break;}?>
                <option value="09">09 - Septiembre</option>
                <? if (date("m")==9){break;}?>
                <option value="10">10 - Octubre</option>
                <? if (date("m")==10){break;}?>
                <option value="11">11 - Noviembre</option>
                <? if (date("m")==11){break;}?>
                <option value="12">12 - Diciembre</option>
                <? }?>
              </select></td>
            </tr>
            
            
            
            
            
            
            
            
            
            
            
            
            
            <tr bordercolor="#FFFFFF">
              <td height="25" align="right" valign="top" class="form_label_01"><div align="right"><strong>Hasta:</strong>&nbsp;</div></td>
              <td colspan="2" valign="top"><select name="perhas" id="perhas" class="breadcrumb">
                <option value="<? echo date('m') ?>" selected>Actual (<? echo date('m').' - '.$me ?>)</option>
                <? for ($i=1;$i<=2;$i++)
				{?>
                <option value="01">01 - Enero</option>
                <? if (date("m")==1){break;}?>
                <option value="02">02 - Febrero</option>
                <? if (date("m")==2){break;}?>
                <option value="03">03 - Marzo</option>
                <? if (date("m")==3){break;}?>
                <option value="04">04 - Abril</option>
                <? if (date("m")==4){break;}?>
                <option value="05">05 - Mayo</option>
                <? if (date("m")==5){break;}?>
                <option value="06">06 - Junio</option>
                <? if (date("m")==6){break;}?>
                <option value="07">07 - Julio</option>
                <? if (date("m")==7){break;}?>
                <option value="08">08 - Agosto</option>
                <? if (date("m")==8){break;}?>
                <option value="09">09 - Septiembre</option>
                <? if (date("m")==9){break;}?>
                <option value="10">10 - Octubre</option>
                <? if (date("m")==10){break;}?>
                <option value="11">11 - Noviembre</option>
                <? if (date("m")==11){break;}?>
                <option value="12">12 - Diciembre</option>
                <? }?>
              </select></td>
            </tr>
            
            
            
            
            
            <tr>
              <td height="35"></td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
          </table>
        </div>
        <div align="left">&nbsp; </div>
        </fieldset>
        <table width="356"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
          <tr> 
            <td width="38" rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="258"><img src="../../img/box01_tl.gif" width="6" height="6"></td>
            <td width="60" align="right"><img src="../../img/box01_tr.gif" width="6" height="6"></td>
          </tr>
          <tr> 
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar()"> 
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()"> </td>
          </tr>
          <tr> 
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
    </tr>
    <tr> 
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
  f=document.form1;
  f.action="rEjeFisAccEspEnt.php";
  f.titulo.value="EJECUCIÓN FÍSICA DE LOS PROYECTOS DEL ENTE";
  f.submit();
}

</script>
<script language="JavaScript" src="../tesoreria/datepickercontrol.js"></script>
</html>