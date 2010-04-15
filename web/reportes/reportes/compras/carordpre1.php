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
$bd=new basedatosAdo();

 function LlenarComboSql($sql,$campo1,$campo2,$seleccionado,$con)
  {
     $tb=$con->select($sql);
	 while (!($tb->EOF))
	 {
	   if ($tb->fields[$campo1]==$seleccionado)
	      {
	   ?>
	      <option value="<? print $tb->fields[$campo1];?>" selected><? print $tb->fields[$campo2];?></option>
	   <?
	      }
	   else
	      {
	   ?>
	      <option value="<? print $tb->fields[$campo1];?>"><? print $tb->fields[$campo2];?></option>
	   <?
		  }
	   $tb->MoveNext();
	 }
  }

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
          <table width="612" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF">
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>Orden
                  de Compras y/o Servicios
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

            <tr>
              <td class="form_label_01"><div align="left"><strong>Orden de Compra y/o Servicio </strong></div></td>
              <td>
                  <div align="left">
                    <input name="ordcomdes" type="text"  value="<?
				$sql="Select min(ordcom) as ordcom from caordcom ";
                LlenarTextoSql($sql,"ordcom",$bd);
				?>" class="breadcrumb" id="ordcomdes" size="20" maxlength="8">
                    <input type="button" name="Button" value="..." onClick="catalogo1('ordcomdes');">
                </div></td>
              <td><input name="ordcomhas" type="text" value="<?
				$sql="Select max(ordcom) as ordcom from caordcom ";
                LlenarTextoSql($sql,"ordcom",$bd);
				?>" class="breadcrumb" id="ordcomhas" size="20" maxlength="8">
                  <input type="button" name="Button2" value="..." onClick="catalogo1('ordcomhas');"></td>
            </tr>

            <tr>
              <td class="form_label_01"><div align="left"><strong>Proveedor:</strong></div></td>
              <td>
                <div align="left">
                <input name="codprodes" type="text"  value="<?
				  $sql="Select min(codpro) as cod from caprovee";
                  LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codprodes" size="20" maxlength="18">
                <input type="button" name="Button" value="..." onClick="catalogo2('codprodes');">
                </div></td>
              <td><input name="codprohas" type="text" value="<?
				  $sql="Select max(codpro) as cod from caprovee";
                  LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codprohas" size="20" maxlength="18">
                <input type="button" name="Button2" value="..." onClick="catalogo2('codprohas');"></td>
            </tr>

            <tr>
              <td class="form_label_01"><div align="left"><strong>Art&iacute;culo:</strong></div></td>
              <td>
                <div align="left">
                <input name="codartdes" type="text"  value="<?
				  $sql="Select min(codart) as cod from caregart";
                  LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codartdes" size="20" maxlength="18">
                <input type="button" name="Button" value="..." onClick="catalogo3('codartdes');">
                </div></td>
              <td><input name="codarthas" type="text" value="<?
				  $sql="Select max(codart) as cod from caregart";
                  LlenarTextoSql($sql,"cod",$bd);
				?>" class="breadcrumb" id="codarthas" size="20" maxlength="18">
                <input type="button" name="Button2" value="..." onClick="catalogo3('codarthas');"></td>
            </tr>

            <tr>
              <td class="form_label_01"><div align="left"><strong>Fecha:</strong></div></td>
              <td><div align="left">
                  <input name="fecorddes" type="text" value="<?
				$sql="Select to_char(min(fecord),'dd/mm/yyyy') as fecord from caordcom";
                LlenarTextoSql($sql,"fecord",$bd);
				?>" class="breadcrumb"  id="fecorddes" size="12" maxlength="10" datepicker="true">
              </div></td>
              <td><input name="fecordhas" type="text" value="<?
				$sql="Select to_char(max(fecord),'dd/mm/yyyy') as fecord from caordcom";
                LlenarTextoSql($sql,"fecord",$bd);
				?>"class="breadcrumb"  id="fecordhas" size="12" maxlength="10" datepicker="true"></td>
            </tr>
            <tr>
              <td class="form_label_01"><div align="left"><strong>Status:</strong></div></td>
              <td colspan="2"><div align="left"> </div>
                  <div align="left">
                    <select name="status" class="breadcrumb" id="status">
                      <option value="Ambos" selected>Ambos</option>
                      <option value="Activas">Activas</option>
                      <option value="Anuladas">Anuladas</option>
                    </select>
                </div></td>
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
  f.action="rcarordpre1.php";
  f.submit();
}


function catalogo1(campo)
   {
   	   mysql='Select distinct(rtrim(a.ordcom)) as ORDEN, b.nompro as PROVEEDOR from caordcom a, caprovee b where  a.codpro=b.codpro order by rtrim(a.ordcom)';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

   function catalogo2(campo)
   {
      mysql='Select distinct codpro as Codigo, nompro as Nombre from caprovee order by codpro';
	  pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }

function catalogo3(campo)
   {
   	   mysql='Select distinct codart as Codigo, desart as Descripcion from caregart order by codart';
	   pagina="../../lib/general/catalogoobj.php?sql="+mysql+"&campo="+campo;
	  window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,height=400,resizable=yes,left=50,top=50");
   }
</script>
<script language="JavaScript" src="datepickercontrol.js"></script>
</html>
<?php
$bd->closed();
?>