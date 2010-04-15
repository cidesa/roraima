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

	require_once("../../lib/general/funciones.php");
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
          <table width="612" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Nota de Recepci&oacute;n
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
              <td class="form_label_01"><strong>Nota de Recepci&oacute;n : </strong></td>
              <td>
        <?
          $tb=$bd->select("SELECT min(RCPART) as cod FROM CARCPART");
          ?>
                  <input type="text" name="codrcpdes" class="breadcrumb" id="codrcpdes" value="<? print $tb->fields["cod"];?>">
                   <input type="button" name="Button" value="..." onclick="catalogo1('codrcpdes')"/>
              </td>
              <td>
        <?
          $tb=$bd->select("SELECT max(RCPART) as cod FROM CARCPART");
          ?>
                  <input type="text" name="codrcphas" class="breadcrumb" id="codrcphas" value="<? print $tb->fields["cod"];?>">
                   <input type="button" name="Button" value="..." onclick="catalogo1('codrcphas')"/>
        </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Proveedor:</strong></td>
              <td>
        <?
          $tb=$bd->select("SELECT min(CODPRO) as cod FROM CARCPART");
          ?>
                  <input type="text" name="codprodes" class="breadcrumb" id="codprodes" value="<? print $tb->fields["cod"];?>">
                   <input type="button" name="Button" value="..." onclick="catalogo2('codprodes')"/>

                </td>
              <td>
          <?
          $tb=$bd->select("SELECT max(CODPRO) as cod FROM CARCPART");
          ?>
                  <input type="text" name="codprohas" class="breadcrumb" id="codprohas" value="<? print $tb->fields["cod"];?>">
                   <input type="button" name="Button" value="..." onclick="catalogo2('codprohas')"/>
        </td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo de Art&iacute;culo:</strong></div></td>
              <td> <div align="left">
        <?
          $tb=$bd->select("SELECT min(CODART) as cod FROM CAARTRCP");
          ?>
                  <input type="text" name="codesde" class="breadcrumb" id="codesde" value="<? print $tb->fields["cod"];?>">
                   <input type="button" name="Button" value="..." onclick="catalogo3('codesde')"/>

                </div></td>
              <td> <div align="left">
        <?
          $tb=$bd->select("SELECT max(CODART) as cod FROM CAARTRCP");
          ?>
                  <input type="text" name="codhasta" class="breadcrumb" id="codhasta" value="<? print $tb->fields["cod"];?>">
                   <input type="button" name="Button" value="..." onclick="catalogo3('codhasta')"/>

                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Fecha:</strong></td>
        <?
          $ts=$bd->select("SELECT DISTINCT to_char(MIN(FECRCP),'dd/mm/yyyy') as fecha FROM CARCPART");
          if(!$ts->EOF)
        {
          $fecdesde=$ts->fields["fecha"];
        }
        ?>
              <td><input name="fechadesde" type="text" class="breadcrumb" id="fechadesde" value="<? print $fecdesde;?>" datepicker="true"></td>
        <?
          $tr=$bd->select("SELECT DISTINCT to_char(MAX(FECRCP),'dd/mm/yyyy') as fecha FROM CARCPART");
        if(!$tr->EOF)
        {
          $fechasta=$tr->fields["fecha"];
        }
        ?>
              <td><input name="fechahasta" type="text" class="breadcrumb" id="fechahasta" value="<? print $fechasta;?>" datepicker="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td><select name="estado" class="breadcrumb" id="estado">
                <option selected>Ambos</option>
                <option>Activas</option>
                <option>Anuladas</option>
              </select></td>
              <td>&nbsp;</td>
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
  f.titulo.value="Nota de Recepción";
	f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";
  f.submit();
}
function cerrar()
{
  window.close();
}
function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(RCPART) as cod FROM CARCPART ORDER BY RCPART asc";
  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT DISTINCT(A.CODPRO) as CODIGO, B.NOMPRO AS NOMBRE FROM CARCPART A , CAPROVEE B  WHERE A.CODPRO=B.CODPRO ORDER BY A.CODPRO asc";
  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo3(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT DISTINCT(CODART) as cod FROM CAARTRCP ORDER BY CODART asc";
  window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

</script>
<?$bd->closed();?>
	</html>

