<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>LISTADO DE APARTADO DE FONDOS EN
                AVANCE (DETALLADOS)
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
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Referencia:</strong></td>
              <td>
                <?

			  	$tb=$bd->select("select min(refapa) as refapa from cpapafon");
               ?>
                <input name="refapa1" type="text" value="<?print $tb->fields["refapa"];

			  ?>"class="breadcrumb" id="refapa1" size="16" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo1('refapa1');">
         		</td>
            <td>
                <?

			  	$tb=$bd->select("select max(refapa) as refapa from cpapafon");
               ?>
                <input name="refapa2" type="text" value="<?print $tb->fields["refapa"];

			  ?>"class="breadcrumb" id="refapa2" size="16" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo1('refapa2');">
		</td>
            </tr>

            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Fecha Disposici&oacute;n:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(fecapa),'DD/MM/YYYY') as fecha FROM cpapafon");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(fecapa),'DD/MM/YYYY') as fecha FROM cpapafon");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fecdis1" type="text" class="breadcrumb" id="fecdis1" datepicker="true" value="<? print $fecini;?>">
                </div></td>
              <td><input name="fecdis2" type="text" class="breadcrumb" id="fecdis2" datepicker="true" value="<? print $fecdes;?>"></td>
            </tr>


              <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Nombre del Beneficiario:</strong></td>
              <td
                <?

			  	$tb=$bd->select("select min(nomben) as nomben from opbenefi a,cpapafon b where a.cedrif=b.cedrif");
               ?>
                <input name="nomben1" type="text" value="<?print $tb->fields["nomben"];

			  ?>"class="breadcrumb" id="nomben1" size="16" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo2('nomben1');">
         		</td>
            <td>
                <?

			  	$tb=$bd->select("select max(nomben) as nomben from opbenefi a,cpapafon b where a.cedrif=b.cedrif");
               ?>
                <input name="nomben2" type="text" value="<?print $tb->fields["nomben"];

			  ?>"class="breadcrumb" id="nomben2" size="16" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo2('nomben2');">
</td>
            </tr>

             <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo Documento:</strong></td>
              <td
                <?

			  	$tb=$bd->select("select min(tipapa) as tipapa from cpapafon");
               ?>
                <input name="tipapa1" type="text" value="<?print $tb->fields["tipapa"];

			  ?>"class="breadcrumb" id="tipapa1" size="16" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo3('tipapa1');">
         		</td>
            <td>
                <?

			  	$tb=$bd->select("select max(tipapa) as tipapa  from cpapafon");
               ?>
                <input name="tipapa2" type="text" value="<?print $tb->fields["tipapa"];

			  ?>"class="breadcrumb" id="tipapa2" size="16" maxlength="100">

         				<input type="button" name="Button" value="..." onClick="catalogo2('tipapa2');">
</td>
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
	f.titulo.value="RELACION DE ORDENES DE PAGO OTORGADAS EN AVANCE";
	f.action="rtsrapafonava.php";
	f.submit();
}
function cerrar()
{
//	 f= document.form1;
//	 alert(f.codubi.value);
window.close();
}
function catalogo1(campo)

{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(refapa) as refapa from cpapafon order by refapa";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(nomben) as nomben from opbenefi a,cpapafon b where a.cedrif=b.cedrif order by nomben";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo3(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(tipapa) as tipapa  from cpapafon order by tipapa";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
<?$bd->closed()?>
</html>
