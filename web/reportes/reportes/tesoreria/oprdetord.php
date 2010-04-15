<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/ccs/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
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
          <table width="612"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>ORDEN
                  DE PAGO DETALLADAS
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="186" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="174"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="238">&nbsp;</td>
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
              <td height="23" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>N&uacute;mero de Orden de Pago:</strong></td>
              <td>
                  <div align="left">
                    <input name="nroord1" type="text" value="<?
				$sql="select min(numord) as cod from opordpag where numord <> ' '";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="nroord1" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo('nroord1');">
                </div></td>
                <td>
                  <div align="left">
                    <input name="nroord2" type="text" value="<?
				$sql="select max(numord) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="nroord2" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo('nroord2');">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Beneficiario:</strong></td>
              <td>
                  <div align="left">
                    <input name="ben1" type="text" value="<?
				$sql="select min(cedrif) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="ben1" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo2('ben1');">
                </div></td>
                <td>
                  <div align="left">
                    <input name="ben2" type="text" value="<?
				$sql="select max(cedrif) as cod from opordpag";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="ben2" size="16" maxlength="20">
                    <input type="button" name="Button" value="..." onClick="catalogo2('ben2');">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="23" class="form_label_01"><strong>Fecha:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(fecemi),'DD/MM/YYYY') as fecha FROM opordpag");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(fecemi),'DD/MM/YYYY') as fecha FROM opordpag");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fecreg1" type="text" class="breadcrumb" id="fecreg1" size="15" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td colspan="2"><input name="fecreg2" type="text" class="breadcrumb" id="fecreg2" size="15" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo de Orden:</strong></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT DISTINCT(TIPCAU) as tip FROM opordpag ORDER BY TIPCAU");
			  ?>

                <select name="tipcau1" class="breadcrumb" id="tipcau1">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["tip"];?>"><? print $tb->fields["tip"];?></option>
                  <?
										$tb->MoveNext();
					}

				?>
                </select></td>
              <td>
                <?

			  	$tb=$bd->select("SELECT DISTINCT(TIPCAU) as tip FROM opordpag ORDER BY TIPCAU DESC");
			  ?>
                <select name="tipcau2" class="breadcrumb" id="tipcau2">
                  <?
				  	while(!$tb->EOF)
					{
				  ?>
                  <option value="<? print $tb->fields["tip"];?>"><? print $tb->fields["tip"];?></option>
                  <?
				  	$tb->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td> <select name="status" class="breadcrumb" id="status">
                  <option value="t">Todas</option>
                  <option value="i">Pagadas</option>
                  <option value="n">No Pagadas</option>
                  <option value="a">Anuladas</option>
                </select></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo Presupuestario:</strong></td>
              <td>
                  <div align="left">
                    <input name="codpre1" type="text" value="<?
				$sql="SELECT min(CODPRE) as cod FROM cpimpcau";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codpre1" size="16" maxlength="30">
                    <input type="button" name="Button" value="..." onClick="catalogo3('codpre1');">
                </div></td>
                <td>
                  <div align="left">
                    <input name="codpre2" type="text" value="<?
				$sql="SELECT max(CODPRE) as cod FROM cpimpcau";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codpre2" size="16" maxlength="30">
                    <input type="button" name="Button" value="..." onClick="catalogo3('codpre2');">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Filtrar Por:</strong></td>
              <td> <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%"></td>
              <td>&nbsp; </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp; </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2"><input name="sqls" type="hidden" id="sqls"></td>
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
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="8" height="30"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="ORDEN DE PAGO DETALLADAS";
	f.action="roprdetord.php";
	f.submit();
}
function cerrar()
{
window.close();
}


function catalogo(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT DISTINCT(NUMORD) as Numero FROM OPORDPAG ORDER BY NUMORD";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(cedrif) as Cedula from opordpag";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo3(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT DISTINCT(CODPRE) as Codigo FROM cpimpcau order by Codigo";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

</script>

</html>
<?
$bd->closed();
?>
