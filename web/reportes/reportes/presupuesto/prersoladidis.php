<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/fecha.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
$bd->validar();
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
              <td colspan="3" class="form_label_01"><div align="center"><font color="#000066" size="4"><strong>ADICIONES/DISMINUCIONES
                <input name="titulo" type="hidden" id="titulo">
              </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong> (SEG&Uacute;N SOLICITUD)

                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td width="226" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="174"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="204">&nbsp;</td>
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
              <td class="form_label_01"> <div align="left"><strong>Nro. de Adici&oacute;n/Disminuci&oacute;n:</strong></div></td>
              <td>
                <?

			  	$tb=$bd->select("select min(a.refadi) as valor from cpsoladidis a, cpsolmovadi b where a.refadi=b.refadi");
               ?>

                <input type="text" name="adi1" class="breadcrumb" id="adi1" value="<? print $tb->fields["valor"];?>" />
  				<input type="button" name="Button" value="..." onclick="catalogo1('adi1')"/>
              </td>
              <td>
                <?

			  	$tb=$bd->select("select max(a.refadi) as valor from cpsoladidis a, cpsolmovadi b where a.refadi=b.refadi");
               ?>

                <input type="text" name="adi2" class="breadcrumb" id="adi2" value="<? print $tb->fields["valor"];?>" />
  				<input type="button" name="Button" value="..." onclick="catalogo1('adi2')"/>
			</td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>Fecha de Adici&oacute;n/Disminuci&oacute;n:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("select to_char(MIN(fecadi),'DD/MM/YYYY') as fecha1 from CPSOLADIDIS");
				if(!$tb->EOF)
				{
					$fecha1=$tb->fields["fecha1"];
				}

			  	$tb2=$bd->select("select to_char(MAX(fecadi),'DD/MM/YYYY') as fecha2 from CPSOLADIDIS");
				if(!$tb2->EOF)
				{
					$fecha2=$tb2->fields["fecha2"];
				}

				?>
                  <input name="fecha1" type="text" class="breadcrumb" id="fecha1" value="<? print $fecha1;?>" maxlength="12" datepicker="true">
                </div></td>
              <td><input name="fecha2" type="text" class="breadcrumb" id="fecha2" value="<? print $fecha2;?>" maxlength="12" datepicker="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Tipo deAdici&oacute;n/Disminuci&oacute;n:</strong></td>
              <td colspan="2"><select name="tipo" class="breadcrumb" id="tipo">
                  <option value="A">Adiciones</option>
                  <option value="D">Disminuciones</option>
                  <option value="T">Todos</option>
                </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td colspan="2"><select name="status" class="breadcrumb" id="status">
                  <option value="T">Todos</option>
                  <option value="A">Activo</option>
                  <option value="D">Anulado</option>
                </select></td>
            </tr>
            <tr>
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo
                  Presupuestario Desde:</strong></div></td>
              <td colspan="2"> <div align="left">
                  <?

			  	$tb=$bd->select("select min(codpre) as valor from cpmovadi");
			  ?>
                  <input size="55" type="text" name="codpre1" class="breadcrumb" id="codpre1" value="<? print $tb->fields["valor"];?>" />
                  <input type="button" name="Button" value="..." onclick="catalogo1('codpre1')"/>

                </div></td>
              </tr>
              <tr>
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo
                  Presupuestario Hasta:</strong></div></td>
              <td colspan="2">
                <div align="left">
                  <?

			  	$tb=$bd->select("select max(codpre) as valor from cpmovadi");
			  ?>
                  <input size="55" type="text" name="codpre2" class="breadcrumb" id="codpre2" value="<? print $tb->fields["valor"];?>" />
                  <input type="button" name="Button" value="..." onclick="catalogo1('codpre2')"/>
                  </td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Filtrar Por :</strong></td>
              <td colspan="2"><input name="filtro" type="text" class="breadcrumb" id="filtro" value="%" size="62"></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
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
	f.titulo.value="ADICIONES/DISMINICIONES (SEGÚN SOLICITUD)";
	f.action="rprersoladidis.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(a.refadi) as mrefadi from cpsoladidis a, cpsolmovadi b where a.refadi=b.refadi  order by a.refadi";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(codpre) as codpre from cpmovadi order by codpre asc";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
<? $bd->closed(); ?>
</html>
