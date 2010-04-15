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
?>
<form name="form1" method="post" action="">
  <table width="721" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr> 
      <td width="191" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
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
      <td width="296">&nbsp; </td>
      <td width="234" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="721"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr> 
      <td width="7" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td width="679" rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes 
        </p>
        <fieldset>
       
        <div align="left">&nbsp; 
          <table width="524"  border="1" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Relaci&oacute;n de Conceptos Detallada
                      <input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="194" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="181"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="149">&nbsp;</td>
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
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo Empleado Desde :</strong></div></td>
              <td colspan="2"> <div align="left">
                </div> <div align="left">
				<?
					$tb1=$bd->select("SELECT MIN(CODEMP) as codemp FROM NPNOMCAL");
					if(!$tb1->EOF)
					{
						$codemp1=$tb1->fields["codemp"];
					}
				?>
                <input name="codempdes" type="text" class="breadcrumb" id="codempdes" value="<? print $codemp1;?>" size="30">
</div></td>
            </tr>
            <tr>
              <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo Empleado Hasta :</strong></div></td>
              <td colspan="2">
                <div align="left"> </div>
                <div align="left">
                  <?
					$tb2=$bd->select("SELECT MAX(CODEMP) as codemp FROM NPNOMCAL");
					if(!$tb2->EOF)
					{
						$codemp2=$tb2->fields["codemp"];
					}
				?>
                  <input name="codemphas" type="text" class="breadcrumb" id="codemphas" value="<? print $codemp2;?>" size="30">
</div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>C&oacute;digo del Cargo Desde :</strong></td>
              <td colspan="2"><?
					$tb2=$bd->select("SELECT MIN(CODCAR) as cargo FROM NPNOMCAL");
					if(!$tb2->EOF)
					{
						$cargo1=$tb2->fields["cargo"];
					}
				?> <input name="codcardes" type="text" class="breadcrumb" id="codcardes" value="<? print $cargo1;?>" size="30"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo del Cargo Hasta :</strong></td>
              <td colspan="2"><?
					$tb2=$bd->select("SELECT MAX(CODCAR) as cargo FROM NPNOMCAL");
					if(!$tb2->EOF)
					{
						$cargo2=$tb2->fields["cargo"];
					}
				?> <input name="codcarhas" type="text" class="breadcrumb" id="codemphas3" value="<? print $cargo2;?>" size="30"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo Concepto Desde :</strong></td>
              <td colspan="2"><?
					$tb2=$bd->select("SELECT MIN(CODCON) as concepto FROM NPNOMCAL");
					if(!$tb2->EOF)
					{
						$concepto1=$tb2->fields["concepto"];
					}
				?> <input name="codcondes" type="text" class="breadcrumb" id="codemphas4" value="<? print $concepto1;?>" size="30"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>C&oacute;digo Concepto Hasta :</strong></td>
              <td colspan="2"><?
					$tb2=$bd->select("SELECT MAX(CODCON) as concepto FROM NPNOMCAL");
					if(!$tb2->EOF)
					{
						$concepto2=$tb2->fields["concepto"];
					}
				?> <input name="codconhas" type="text" class="breadcrumb" id="codemphas5" value="<? print $concepto2;?>" size="30"></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Tipo de Nomina  :</strong></td>
              <td colspan="2"><?
					$tb2=$bd->select("SELECT DISTINCT(CODNOM) as codnom FROM NPNOMCAL");
				?>
                  <select name="tipnom" class="breadcrumb" id="tipnom">
                    <?
				  	while(!$tb2->EOF)
					{
				  ?>
                    <option value="<? print $tb2->fields["codnom"];?>" selected><? print $tb2->fields["codnom"];?></option>
                    <?
				  		$tb2->MoveNext();
					}
				  ?>
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
      <td width="10" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="64" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
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
	f.titulo.value="Relación de Conceptos Detallada";
	f.action="rnprelacion_concepto_detalle.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="../../lib/general/catalogoform.php?campo=codesde&sql=select codemp as campo1 from nphojint order by codemp asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="../../lib/general/catalogoform.php?campo=codhasta&sql=select codemp as campo1 from nphojint order by codemp desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
