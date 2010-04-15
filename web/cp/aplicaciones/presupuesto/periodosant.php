<?
session_start();
require_once ($_SESSION["x"] . 'lib/bd/basedatosAdo.php');
require_once ($_SESSION["x"] . 'lib/general/funciones.php');
require_once ($_SESSION["x"] . 'lib/general/tools.php');
validar(array(8,11,15));            //Seguridad  del Sistema
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
  <table border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="30" class="queryheader" > <div align="center"></div></td>
      <td class="queryheader" ><div align="center">Per&iacute;odo</div></td>
      <td class="queryheader" ><div align="center">Fecha Desde</div></td>
      <td class="queryheader" ><div align="center">Fecha Hasta</div></td>
    </tr>
    <?

if ($vacio == "N") {
  /*$diaf=intval(substr($fecha,0,2));
  $mesf=intval(substr($fecha,3,2));
  $annof=substr($fecha,6,4);*/
  $splitfecha = split('/', $fecha);
  $fechaini_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
  $diaf = $splitfecha[0];
  $mesf = $splitfecha[1];
  $annof = $splitfecha[2];

  $splitfecha = split('/', $fechacie);
  $fechacie_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
  $diaC = $splitfecha[0];
  $mesC = $splitfecha[1];
  $annoC = $splitfecha[2];

  /*$diaC = intval(substr($fechacie, 0, 2));
  $mesC = intval(substr($fechacie, 3, 2));
  $annoC = substr($fechacie, 6, 4);*/

  while ((strtotime($fechaini_for) < strtotime($fechacie_for)) && ($cont <= $nro)) {
    $periodo = str_pad((String) $cont, 2, '0', STR_PAD_LEFT);

    $splitfecha = split('-', $fechaini_for);
    $sfecha = $splitfecha[2] . "/" . $splitfecha[1] . "/" . $splitfecha[0];
    $dia = $splitfecha[2];
    $mes = $splitfecha[1];
    $ano = $splitfecha[0];
    /*$dia = intval(substr($fecha, 0, 2));
    $mes = intval(substr($fecha, 3, 2));
    $ano = substr($fecha, 6, 4);*/

    $daux = str_pad((String) ($dia), 2, '0', STR_PAD_LEFT);

    $m = str_pad((String) $mes, 2, '0', STR_PAD_LEFT);
    if ($m == '01') {
      $real = 31;
    }
    if ($m == '02') {
      $real = 28;
    }
    if ($m == '03') {
      $real = 31;
    }
    if ($m == '04') {
      $real = 30;
    }
    if ($m == '05') {
      $real = 31;
    }
    if ($m == '06') {
      $real = 30;
    }
    if ($m == '07') {
      $real = 31;
    }
    if ($m == '08') {
      $real = 31;
    }
    if ($m == '09') {
      $real = 30;
    }
    if ($m == '10') {
      $real = 31;
    }
    if ($m == '11') {
      $real = 30;
    }
    if ($m == '12') {
      $real = 31;
    }
    $cuanto = str_pad((String) $real, 2, '0', STR_PAD_LEFT);
    $a = $ano;
    if ($m=='12')
    {
      $a=$a+1;
      $mes=0;
    }
      $maux1 = str_pad((String) ($mes + $incmes -1), 2, '0', STR_PAD_LEFT);
      $maux2 = str_pad((String) ($mes + $incmes), 2, '0', STR_PAD_LEFT);
      if ($maux1 == '01') {
        $real = 31;
      }
      if ($maux1 == '02') {
        $real = 28;
      }
      if ($maux1 == '03') {
        $real = 31;
      }
      if ($maux1 == '04') {
        $real = 30;
      }
      if ($maux1 == '05') {
        $real = 31;
      }
      if ($maux1 == '06') {
        $real = 30;
      }
      if ($maux1 == '07') {
        $real = 31;
      }
      if ($maux1 == '08') {
        $real = 31;
      }
      if ($maux1 == '09') {
        $real = 30;
      }
      if ($maux1 == '10') {
        $real = 31;
      }
      if ($maux1 == '11') {
        $real = 30;
      }
      if ($maux1 == '12') {
        $real = 31;
      }
      $cuanto = str_pad((String) $real, 2, '0', STR_PAD_LEFT);
      $s2fecha = $cuanto . "/" . $maux1 . "/" . $a;

?>
    <tr>
      <td  align="right" class="grid_line01_br">&nbsp;</td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>1" id="x<? print $i;?>1" readonly="true" type="text" class="grid_txt02" size="5" value="<? print $periodo;?>"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>2" id="x<? print $i;?>2" readonly="true" type="text" class="grid_txt02" size="15" value="<? print $sfecha;?>"></td>
      <td  align="right" class="grid_line01_br"><input name="x<? print $i;?>3" id="x<? print $i;?>3" readonly="true" type="text" class="grid_txt02" size="15" value="<? print $s2fecha;?>"></td>
    </tr>
    <?

    //$fecha = $daux . "/" . $maux2 . "/" . $a;
    if ($maux2=='13')
    {
      $a=$a+1;
      $maux2='01';
    }
    $fechaini_for= $a."-".$maux2."-".$daux;
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