<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");

	require_once("../../lib/general/funciones.php");
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
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>ORDEN
                  DE SERVICIO
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
            <tr>
              <td class="form_label_01"><strong>Proveedor Desde:</strong></td>
              <td colspan="2">
                <?
			  	$tb=$bd->select("select min(codpro) as valor from caprovee");
				?>

				<input size="60"  type="text" name="codpro1" class="breadcrumb" id="codpro1" value="<? print $tb->fields["valor"];?>" />
				<input type="button" name="btncatalogo1" value="..." onclick="catalogo1('codpro1');"/></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Proveedor Hasta:</strong></td>
              <td colspan="2">
                 <?
			  	$tb=$bd->select("select max(codpro) as valor from caprovee");
				?>

				<input size="60"  type="text" name="codpro2" class="breadcrumb" id="codpro2" value="<? print $tb->fields["valor"];?>" />
				<input type="button" name="btncatalogo1" value="..." onclick="catalogo1('codpro2');"/></td>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Orden de Servicio:</strong></td>
              <td>
                <?

			  	$tb=$bd->select("select min(ordcom) as valor from caordcom where ordcom like 'OS%'");
			  ?>
			  <input  type="text" name="nrord1" class="breadcrumb" id="nrord1" value="<? print $tb->fields["valor"];?>" />
				<input type="button" name="btncatalogo1" value="..." onclick="catalogo2('nrord1');"/></td>
                </td>
              <td>
<?

			  	$tb=$bd->select("select max(ordcom) as valor from caordcom where ordcom like 'OS%'");
			  ?>
			  <input  type="text" name="nrord2" class="breadcrumb" id="nrord2" value="<? print $tb->fields["valor"];?>" />
				<input type="button" name="btncatalogo1" value="..." onclick="catalogo2('nrord2');"/></td>
</td>
            </tr>
            <tr>
              <td class="form_label_01"><strong>Art&iacute;culo:</strong></td>
              <td>

              <?

			  	$tb=$bd->select("select min(codart) as valor from caartord");
			  ?>
			  <input  type="text" name="codart1" class="breadcrumb" id="codart1" value="<? print $tb->fields["valor"];?>" />
				<input type="button" name="btncatalogo1" value="..." onclick="catalogo3('codart1');"/></td>
</td>
              <td>
              <?

			  	$tb=$bd->select("select max(codart) as valor from caartord");
			  ?>
			  <input type="text" name="codart2" class="breadcrumb" id="codart2" value="<? print $tb->fields["valor"];?>" />
				<input type="button" name="btncatalogo1" value="..." onclick="catalogo3('codart2');"/></td>
</td>
            </tr>
            <tr>
              <td height="23" class="form_label_01"><strong>Fecha:</strong></td>
              <td> <div align="left"> </div>
                <div align="left">
                  <?

			  	$tb=$bd->select("SELECT to_char(MIN(FECORD),'DD/MM/YYYY') as fecha FROM CAORDCOM");
				if(!$tb->EOF)
				{
					$fecini=$tb->fields["fecha"];
				}

			  	$tb2=$bd->select("SELECT to_char(MAX(FECORD),'DD/MM/YYYY') as fecha FROM CAORDCOM");
				if(!$tb2->EOF)
				{
					$fecdes=$tb2->fields["fecha"];
				}

				?>
                  <input name="fecreg1" type="text" class="breadcrumb" id="fecreg1" value="<? print $fecini;?>"  datepicker="true">
                </div></td>
              <td><input name="fecreg2" type="text" class="breadcrumb" id="fecreg2" value="<? print $fecdes;?>" datepicker="true"></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><strong>Status:</strong></td>
              <td> <select name="status" class="breadcrumb" id="status">
                  <option value="t">Ambos</option>
                  <option value="A">Activas</option>
                  <option value="N">Anuladas</option>
                </select></td>
              <td>&nbsp;</td>
            </tr>


            <tr>
              <td height="45" class="form_label_01"><div align="left"><strong>Unidad Solicitante: </strong> </div></td>
              <td colspan="2" valign="top"><div align="left"> </div>                <div align="left">
                  <input name="unidad" type="text"  value="%" class="breadcrumb" id="unidad" size="20" maxlength="14">
                  <input type="button" name="Button" value="..." onClick="catalogo5('unidad');">
              </div></td>
            </tr>




            <tr>
              <td height="45" class="form_label_01"><div align="left"><strong>Partida: </strong> </div></td>
              <td colspan="2" valign="top"><div align="left"> </div>                <div align="left">
                  <input name="partida" type="text"  value="%" class="breadcrumb" id="partida" size="20" maxlength="14">
                  <input type="button" name="Button" value="..." onClick="catalogo6('partida');">
              </div></td>
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
	f.titulo.value="ORDEN";
	f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";
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
      mysql='Select distinct codpro as codigo, nompro as nombre from caprovee order by nompro';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

    function catalogo2(campo)
   {
      mysql='select a.ordcom as Orden,b.nompro as Proveedor from caordcom a,caprovee b where a.codpro=b.codpro and upper(b.nompro) like upper(¿%¿) and a.ordcom like ¿OS%¿ order by a.ordcom';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }


 function catalogo3(campo)
   {
      mysql='Select codart as Codigo , substr(desart,1,45) as desart from caregart order by codart';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
    function catalogo5(campo)
   {
      mysql='SELECT DISTINCT(CODCAT) AS COD, NOMCAT AS NOMBRE FROM NPCATPRE ORDER BY CODCAT';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
    function catalogo6(campo)
   {
      mysql='SELECT DISTINCT(TRIM(CODPAR)) AS CODIGO, NOMPAR AS NOMBRE FROM NPPARTIDAS ORDER BY TRIM(CODPAR)';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }



</script>
<? $bd->closed(); ?>
<?$bd->closed();?>
	</html>

