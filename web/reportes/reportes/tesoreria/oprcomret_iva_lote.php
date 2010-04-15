<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>

</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
function LlenarTextoSql($sql,$campo1,$con)
  {
     $tb=$con->select($sql);
	 if (!$tb->EOF)
	 {
	   print $tb->fields[$campo1];
	 }
	 else
	 {
	   print "";
	 }
  }
function LlenarTextoSqlM($sql,$campo1,$con)
  {
     $tb=$con->select($sql);
	 if (!$tb->EOF)
	 {$correl=$tb->fields[$campo1]+1;
	 	$correl=str_pad(rtrim($correl), 8, '0', STR_PAD_LEFT);
	   print $correl;
	 }
	 else
	 {
	   print "";
	 }
  }

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
          <table width="678"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>COMPROBANTE
                  DE RETENCION del IVA
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="203" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="230"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="231">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Agente </strong> <strong>de Retenci&oacute;n:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="ag" type="text" class="breadcrumb" id="ag" value="FONDO DE DESARROLLO NACIONAL, S.A" size="89">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>RIF Agente
                  </strong> <strong>de Retenci&oacute;n</strong><strong>:</strong></div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="rif" type="text" class="breadcrumb" id="rif" value="G-20005357-7" size="40">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Direcci&oacute;n
                  Agente </strong> <strong>de Retenci&oacute;n</strong><strong>
                  :</strong></div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="dire" type="text" class="breadcrumb" id="dire" value="AV. URDANETA, ESQUINA CARMELITAS, EDIFICIO FINANZAS, PISO 1, PARROQUIA ALTAGRACIA, CARACAS, TEL. 8021184" size="89">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Ente Ejecutor</strong></div></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <input name="ejecutor" type="text" value="" class="breadcrumb" id="ejecutor" size="20" maxlength="15">
                    <input type="button" name="Button" value="..." onClick="catalogo3('ejecutor');">
                </div></td>
             </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Beneficiario</strong></div></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <input name="ben" type="text" value="" class="breadcrumb" id="ben" size="20" maxlength="15">
                    <input type="button" name="Button" value="..." onClick="catalogo('ben');">
                </div></td>
             </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Correlativo:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <p><strong>
                    <input name="corre" type="text" class="breadcrumb" id="corre" value="<?
				$sql="select to_number(max(comret),'00000000') as cod from opordpag";
                LlenarTextoSqlM($sql,"cod",$bd);
				?>" size="25">
                    <font color="#FF0000" size="-5">
                    </font></strong></p>
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
             <tr>
              <td height="23" class="form_label_01"><strong>Per&iacute;odo :</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                    <input name="fecdes" type="text" class="breadcrumb" id="fecnomdes" datepicker="true" value="">
                </div></td>
              <td><input name="fechas" type="text" class="breadcrumb" id="fecnomhas" datepicker="true" value=""></td>
            </tr>

            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls">
              </td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table>
        </div>
        <div align="left">&nbsp; </div>
        </fieldset>        </fieldset>
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
	f.titulo.value="COMPROBANTE DE RETENCION DEL IVA";
	f.action="roprcompret_iva_lote.php";
	f.submit();
}

function catalogo(campo)
   {
      mysql='select distinct(cedrif) as RIF, nomben as Nombre from opbenefi order by RIF';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo3(campo)
   {
      mysql='SELECT DISTINCT(a.cedrifres) as Codigo, b.nomben as descripcion FROM opordpag a, opbenefi b where a.cedrifres=b.cedrif ORDER BY Codigo';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

</script>
</html>
<?
$bd->closed();
?>
