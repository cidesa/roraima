<?
session_start();
require_once ($_SESSION["x"] . 'lib/bd/basedatosAdo.php');
require_once ($_SESSION["x"] . 'lib/general/funciones.php');
require_once ($_SESSION["x"] . 'lib/general/tools.php');
//validar(array(8,11,15));            //Seguridad  del Sistema
$codemp = $_SESSION["codemp"];
$bd = new basedatosAdo($codemp);
$z = new tools();

$vacio = "N";
if (!empty ($_GET["nro"])) {
  $nro = intval($_GET["nro"]);
} else {
  $vacio = "S";
}
if (!empty ($_GET["fecha1"])) {
  $fecha = $_GET["fecha1"];
} else {
  $vacio = "S";
}
if (!empty ($_GET["fecha2"])) {
  $fechacie = $_GET["fecha2"];
} else {
  $vacio = "S";
}
$cont = 1;
$incmes = 12 / $nro;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK media=all href="../../lib/css/base.css" type=text/css rel=stylesheet>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<link rel="STYLESHEET" type="text/css"  href="../../lib/general/toolbar/css/dhtmlXToolbar.css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
<script type='text/javascript' src='../../lib/general/js/funciones.js'></script>
<script type="text/JavaScript"  src="../../lib/general/js/prototype.js"></script>
</head>

<body>
<form name="form1" method="post" action="">
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30" class="queryheader" > <div align="center"></div></td>
      <td class="queryheader" ><div align="center">Per&iacute;odo</div></td>
      <td class="queryheader" ><div align="center">Fecha Desde</div></td>
      <td class="queryheader" ><div align="center">Fecha Hasta</div></td>
    </tr>
    <?

if ($vacio == "N") {
  $splitfecha = split('/', $fecha);
  $fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
  $splitfecha = split('/', $fechacie);
  $fechacie_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];


  while ((strtotime($fecha_for) < strtotime($fechacie_for)) && ($cont <= $nro))
  {
      $splitfecha = split('-', $fecha_for);
      $sfecha = $splitfecha[2] . "/" . $splitfecha[1] . "/" . $splitfecha[0];
      $periodo = str_pad((String) $cont, 2, '0', STR_PAD_LEFT);
      $incmes=(int)$incmes;
      $fectem=date("Y-m-d", strtotime("$fecha_for $incmes month"));
      $dia=1;
      $fecfin=date("Y-m-d", strtotime("$fectem -$dia day"));
      $splitfecha = split('-', $fecfin);
      $s2fecha = $splitfecha[2] . "/" . $splitfecha[1] . "/" . $splitfecha[0];
?>
    <tr>
      <td  align="right" class="grid_line01_br">&nbsp;</td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" readonly="true" type="text" class="grid_txt02" size="5" value="<? print $periodo;?>"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" readonly="true" type="text" class="grid_txt02" size="15" value="<? print $sfecha;?>"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" readonly="true" type="text" class="grid_txt02" size="15" value="<? if ($cont ==$nro) print $fechacie; else print $s2fecha;?>"></td>
    </tr>
    <?
    $fecha_for=date("Y-m-d", strtotime("$fecha_for $incmes month"));
    $cont = $cont +1;
  }//end while
}
?>
  </table>
  <table width="27%" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
      <td><div align="center">
          <input type="button" name="Button" value="Salir" onClick="cerrar();">
        </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>
<script>
function cerrar()
{
  close();
}
</script>