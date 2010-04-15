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
$bd->validar();
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
          <table width="647" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"><div align="center"><font color="#000066" size="4"><strong>Listado de Ordenes de Pago  Efectivas por Status</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center">
                <p><font color="#000066" size="4"><strong>
                  con Fecha de Env&iacute;o
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></p>
                </div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="194" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="181"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="258">&nbsp;</td>
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
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>

             <tr>
              <td class="form_label_01"><strong>N&uacute;mero de Orden de Pago:</strong></td>
              <td>
                  <div align="left">
                    <input name="numorddes" type="text" value="<?
				$sql="select min(numord) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="numorddes" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo3('numorddes');">
                </div></td>
                <td>
                  <div align="left">
                    <input name="numordhas" type="text" value="<?
				$sql="select max(numord) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="numordhas" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo3('numordhas');">
                </div></td>
            </tr>

   			<tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C.I/RIF  Beneficiario:</strong></td>
              <td>
                  <div align="left">
                    <input name="bendes" type="text" value="<?
				$sql="select min(cedrif) as cod from OPBENEFI";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="bendes" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo2('bendes');">
                </div></td>
                <td>
                  <div align="left">
                    <input name="benhas" type="text" value="<?
				$sql="select max(cedrif) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="benhas" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo2('benhas');">
                </div></td>
            </tr>




            <tr>
              <td class="form_label_01"><strong>Fecha Emisi&oacute;n O/P:</strong></td>
              <td>
                <?
					$tb2=$bd->select("select distinct to_char(min(fecemi),'dd/mm/yyyy') as fecemi  from opordpag order by fecemi");

				?>
					<input name="fechades" type="text" class="breadcrumb" id="fechades" value="<? print $tb2->fields["fecemi"]; ?>" size="12" datepicker="true"></td>
              <td><?
					$tb2=$bd->select("select distinct to_char(max(fecemi),'dd/mm/yyyy') as fecemi  from opordpag order by fecemi");
					?>
                <input name="fechahas" type="text" class="breadcrumb" id="fechahas" value="<? print $tb2->fields["fecemi"]; ?>" size="12" datepicker="true"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Tipo de Orden:</strong></td>
              <td><select name="tipcaudes" class="breadcrumb" id="select">
                <?
					$tb2=$bd->select("SELECT  distinct tipcau FROM opordpag ORDER BY tipcau asc");
				  	while(!$tb2->EOF)
					{
				  ?>
                <option value="<? print $tb2->fields["tipcau"];?>"><? print $tb2->fields["tipcau"];?></option>
                <?
				  		$tb2->MoveNext();
					}
				  ?>
              </select></td>
              <td><select name="tipcauhas" class="breadcrumb" id="select3">
                <?
					$tb2=$bd->select("SELECT  distinct tipcau FROM opordpag ORDER BY tipcau desc");
				  	while(!$tb2->EOF)
					{
				  ?>
                <option value="<? print $tb2->fields["tipcau"];?>"><? print $tb2->fields["tipcau"];?></option>
                <?
				  		$tb2->MoveNext();
					}
				  ?>
              </select></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Status:</strong></td>
              <td colspan="2"><select name="estatus" class="breadcrumb" id="estatus">
			    <option value="PEC">Para Enviar Contraloria</option>
				<option value="C">Contraloria</option>
				<option value="D">Despacho</option>
				<option value="F">Finanzas</option>
				<option value="CC">Custodia</option>
				<option value="P">Pagadas</option>
				<option value="A">Anuladas</option>
              </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">&nbsp;</td>
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
	f.titulo.value="   Listado de Ordenes de Pago Efectivas por Status con Fecha de Envío";
	f.action="roprordpagefec_sta_fec.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo2(campo)
   {
      mysql='select distinct(cedrif) as CODIGO from OPBENEFI order by cedrif';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


function catalogo3(campo)
   {
      mysql='SELECT DISTINCT(NUMORD) as Numero FROM OPORDPAG ORDER BY NUMORD';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
</script>
</html>
