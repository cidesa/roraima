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
          <table width="678"  border="0" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>COMPROBANTE
                  DE RETENCIONES
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
            <tr bordercolor="#6699CC">
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Apellidos y Nombre del Agente </strong> <strong>de
                    Retenci&oacute;n:</strong></p>
                </div></td>
              <td> <div align="left"><strong>
                  <input name="apenom" type="text" class="breadcrumb" id="apenom" size="45">
                  </strong> </div></td>
              <td> <strong>Rif. o Nit.
                <input name="rif1" type="text" class="breadcrumb" id="rif1" size="25">
                </strong></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Nombre o Raz&oacute;n
                  Social:</strong></div></td>
              <td> <div align="left"><strong>
                  <input name="nomraz" type="text" class="breadcrumb" id="nomraz" size="45">
                  </strong> </div></td>
              <td> <strong>Rif. o Nit.
                <input name="rif2" type="text" class="breadcrumb" id="rif2" size="25">
                </strong></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Nombre del
                  Organismo :</strong></div></td>
              <td> <div align="left"><strong>
                  <input name="nomorg" type="text" class="breadcrumb" id="nomorg" value="INSTITUTO DE VIVIENDA Y EQUIPAMIENTO DE BARRIOS" size="45">
                  </strong> </div></td>
              <td> <strong>Rif. o Nit.
                <input name="rif3" type="text" class="breadcrumb" id="rif3" value="G-20000164-0" size="25">
                </strong></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Funcionario Autorizado para hacer la r</strong><strong>etenci&oacute;n:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="fun" type="text" class="breadcrumb" id="fun" value="ABEL DANIEL LARA C.I: V-7.910.674" size="89">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left">
                  <p><strong>Direcci&oacute;n y Tel&eacute;fono (s)</strong><strong>:</strong></p>
                </div></td>
              <td colspan="2"> <div align="left"><strong>
                  <input name="dire" type="text" class="breadcrumb" id="dire" value="Av. 7 - Esquina Calle 7, San Felipe-Estado Yaracuy, Telefono (0254)2325443" size="89">
                  </strong> </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Cedula de Identidad o Rif. del
                beneficiario </strong></td>
			<td><div align="left"> </div>
                  <div align="left">
                    <input name="ced1" type="text" value="<?
				$sql="select min(cedrif) as cod from opbenefi";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="ced1" size="20" maxlength="100">
                    <input type="button" name="Button" value="..." onClick="catalogo('ced1');">
                </div></td>
                <td><div align="left"> </div>
                  <div align="left">
                    <input name="ced2" type="text" value="<?
				$sql="select max(cedrif) as cod from opbenefi";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="ced2" size="20" maxlength="100">
                    <input type="button" name="Button" value="..." onClick="catalogo('ced2');">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Numero de Orden:</strong></div></td>
              <td><div align="left"> </div>
                  <div align="left">
                    <input name="ord1" type="text" value="<?
				$sql="SELECT min(numord) as cod FROM opordpag WHERE status<>'A' AND  monret<>0";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="ord1" size="20" maxlength="100">
                    <input type="button" name="Button" value="..." onClick="catalogo2('ord1');">
                </div></td>
                <td><div align="left"> </div>
                  <div align="left">
                    <input name="ord2" type="text" value="<?
				$sql="SELECT max(numord) as cod FROM opordpag WHERE status<>'A' AND  monret<>0";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="ord2" size="20" maxlength="100">
                    <input type="button" name="Button" value="..." onClick="catalogo2('ord2');">
                </div></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Referencia - Contrato</strong></td>
              <td colspan="2"><strong>
                <input name="ref" type="text" class="breadcrumb" id="ref" size="89">
                </strong> </td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Tipo de Enriquecimiento</strong></td>
              <td colspan="2"><strong>
                <input name="tip" type="text" class="breadcrumb" id="tip" size="89">
                </strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
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
	f.titulo.value="COMPROBANTE DE RETENCIONES";
	f.action="roprcomret.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select (cedrif) as Cedula,nomben as Nombre from opbenefi order by nomben asc";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT numord as Numero FROM opordpag WHERE status<>¿A¿ AND  monret<>0 order by numord";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
</html>
<?
$bd->closed();
?>