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
	$ordcomdes="";
$ordcomdhas="";
$codprodes="";
$codprohas="";
$codartdes="";
$codarthas="";
$desartdes="";
$desarthas="";
$fecorddes="";
$fecordhas="";
$satus="Ambos";



global $ordcomdes;
global $ordcomdhas;
global $codprodes;
global $codprohas;
global $codartdes;
global $codarthas;
global $desartdes;
global $desarthas;
global $fecorddes;
global $fecordhas;
global $satus;
global $despacho;

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
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF">
              <td colspan="4" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>AJUSTES A LA ORDEN
<input name="titulo" type="hidden" id="titulo">
</strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td width="185" class="form_label_01">&nbsp;</td>
              <td width="174">&nbsp;</td>
              <td colspan="2"><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="1">&nbsp;</td>
              <td width="231">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td colspan="2"> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Salida del
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td colspan="2"> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="21" class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td colspan="4" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="21" bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td colspan="2" valign="top"><strong>DESDE</strong></td>
              <td valign="top"><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td height="45" class="form_label_01"><div align="left"><strong>Orden de Compra </strong> </div></td>
              <td colspan="2" valign="top"><div align="left"> </div>                <div align="left">
                  <input name="ordcomdes" type="text"  value="<?
				$sql="Select min(ordcom) as ordcom from caordcom where ordcom like 'OC%'order by ordcom";
                LlenarTextoSql($sql,"ordcom",$bd);
				?>" class="breadcrumb" id="ordcomdes" size="20" maxlength="8">
                  <input type="button" name="Button" value="..." onClick="catalogo1('ordcomdes');">
              </div></td>
              <td valign="top">
			  <input name="ordcomhas" type="text" value="<?
				$sql="Select max(ordcom) as ordcom from caordcom where ordcom like 'OC%' order by ordcom desc";
                LlenarTextoSql($sql,"ordcom",$bd);
				?>" class="breadcrumb" id="ordcomhas" size="20" maxlength="8">
              <input type="button" name="Button2" value="..." onClick="catalogo1('ordcomhas');"></td>
            </tr>
            <tr>
              <td height="26" class="form_label_01"><div align="left"><strong>Proveedor:</strong></div></td>
              <td colspan="2" valign="top"><div align="left">
                <input name="codprodes" type="text" value="<?
				$sql="Select distinct codpro from caprovee order by codpro";
                LlenarTextoSql($sql,"codpro",$bd);
				?>" class="breadcrumb" id="codprodes" size="20">
                <input type="button" name="Button3" value="..." onClick="catalogo2('codprodes');">
              </div></td>
              <td valign="top">
			  <input name="codprohas" type="text" value="<?
				$sql="Select distinct codpro from caprovee order by codpro desc";
                LlenarTextoSql($sql,"codpro",$bd);
				?>" class="breadcrumb" id="codprohas" size="20">
              <input type="button" name="Button4" value="..." onClick="catalogo2('codprohas');">			  </td>
            </tr>
            <tr>
              <td height="45" class="form_label_01"><div align="left"><strong>Art&iacute;culo:</strong></div></td>
              <td colspan="2" valign="top"><div align="left"> </div>                <div align="left">
                  <input name="codartdes" type="text" value="<?
				$sql="Select distinct min(codart) as cod from caregart";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codartdes" size="20">
                  <input type="button" name="Button5" value="..." onClick="catalogo3('codartdes');">
              </div></td>
              <td valign="top"><input name="codarthas" type="text" value="<?
				$sql="Select max(codart) as cod from caregart";
                LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codarthas" size="20">
              <input type="button" name="Button5" value="..." onClick="catalogo3('codarthas');"></td>
            </tr>
            <tr>
              <td height="24" class="form_label_01"><div align="left"><strong>Fecha:</strong></div></td>
              <td colspan="2" valign="top"><div align="left">
                  <input name="fecorddes" type="text" value="<?
				$sql="Select to_char(min(fecord),'dd/mm/yyyy') as fecord from caordcom";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecorddes" size="12" maxlength="10" datepicker="true" class="breadcrumb">
              </div></td>
              <td valign="top"><input name="fecordhas" type="text" value="<?
				$sql="Select to_char(max(fecord),'dd/mm/yyyy') as fecord from caordcom";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" id="fecordhas" size="12" maxlength="10" datepicker="true" class="breadcrumb"></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Status:</strong> </div></td>
              <td colspan="3"><div align="left"> </div>
                  <div align="left">
                    <select name="status" class="breadcrumb" id="status">
                      <option value="Ambos" selected>Ambos</option>
                      <option value="Activas">Activas</option>
                      <option value="Anuladas">Anuladas</option>
                    </select>
                </div></td>
            </tr>


            <tr>
              <td height="45" class="form_label_01"><div align="left"><strong>Unidad Solicitante: </strong> </div></td>
              <td colspan="2" valign="top"><div align="left"> </div>                <div align="left">
                  <input name="unidad" type="text"  value="%" class="breadcrumb" id="unidad" size="20" maxlength="14">
                  <input type="button" name="Button" value="..." onClick="catalogo5('unidad');">
              </div></td>
            </tr>
           <tr bordercolor="#6699CC">
              <td height="32">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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
<?
$bd->closed();
?>
<script language="javascript">
function enviar()
{
  f=document.form1;
	f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";
  f.submit();
}
function cerrar()
{
	window.close();
}

  /* function catalogo(campo)
   {
      mysql='select a.ordcom as Orden,b.nompro as Proveedor,to_char(a.fecord,¿dd?mm?yyyy¿) as Fecha from caordcom a,caprovee b where a.codpro=b.codpro and upper(b.nompro) like upper(¿%¿) order by b.nompro';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }*/

    function catalogo1(campo)
   {
      mysql='select a.ordcom as Orden,b.nompro as Proveedor from caordcom a,caprovee b where a.codpro=b.codpro  order by a.ordcom';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

    function catalogo2(campo)
   {
      mysql='Select distinct codpro as codigo, nompro as nombre from caprovee order by nompro';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

    function catalogo3(campo)
   {
      mysql='Select codart as Codigo , substr(desart,1,45) as desart from caregart order by codart';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

    function catalogo4(campo)
   {
      mysql='select a.ordcom as Orden,b.nompro as Proveedor,to_char(a.fecord,¿dd?mm?yyyy¿) as Fecha from caordcom a,caprovee b where a.codpro=b.codpro and upper(b.nompro) like upper(¿%¿) order by b.nompro';
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
<script language="JavaScript" src="datepickercontrol.js"></script>
<?$bd->closed();?>
	</html>
