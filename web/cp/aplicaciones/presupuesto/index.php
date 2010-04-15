<?
session_start();

//$_SESSION["x"]='C:/AppServ/www/sistemafull/';
$_SESSION["x"]='/home/jlobaton/www/sistemafull/';
$_SESSION["codemp"]='002';   //codigo empresa
$_SESSION["nomemp"]='DEMOSTRACION';
$_SESSION["sesion_usuario"]='ADMINISTRADOR DEL SISTEMA';
$_SESSION["loguse"]='CIDESA';
$_SESSION["sesion_usuario"]=session_id();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Contabilidad Financiera</title>
<script  language="JavaScript" src="../../lib/general/js/fecha.js"></script>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/estilos.css" rel="stylesheet" type="text/css">
<style>
<!--
  .intd
    {color: #000000; font-family: Tahoma, Verdana; font-size: 11px; padding-left: 15px; padding-right: 15px;}
  .ctrl
    {font-family: Tahoma, Verdana, sans-serif; font-size: 12px; width: 100%; }
-->
</style>
</head>
<body>
<script language="JavaScript" src="../../lib/general/js/tree.js"></script>
<script language="JavaScript" src="../../lib/general/js/tree_items.js"></script>
<script language="JavaScript" src="../../lib/general/js/tree_tpl.js"></script>
&nbsp;
<table width="500" height="60"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../../images/home_logo_01.jpg" width="598" height="60"></td>
  </tr>
</table>
<table width="599" align="center">
  <tr>
    <td width="329" class="cell_date"><script type="text/javascript" language="JavaScript">
    <!--
        document.write (displayDate());//-->
    </script></td>
    <td width="258" class="cell_username">Administrador del Sistema </td>
  </tr>
  <tr>
    <td >&nbsp;</td>
    <td width="258" class="cell_logout"><a href="../../login.php?var=<? echo '1';?>">[Cerrar Sesi&oacute;n]</a></td>
  </tr>
</table>
<table width="594"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="6" valign="top"><img src="../../images/box02_tl.gif" width="6" height="6"></td>
    <td width="488" class="box02_tline"><img src="../../images/spacer.gif" width="5" height="5"></td>
    <td width="6" valign="top"><img src="../../images/box02_tr.gif" width="6" height="6"></td>
  </tr>
  <tr>
    <td class="box02_lline"><span class="box02_tline"><img src="../../images/spacer.gif" width="1" height="200"></span></td>
    <td valign="top" bgcolor="#FFFFFF" class="intd">
    <script language="JavaScript">
    <!--
    new tree (TREE_ITEMSPRE, tree_tpl);
    -->
    </script>
  </td>
    <td class="box02_rline">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom"><img src="../../images/box02_bl.gif" width="6" height="6"></td>
    <td class="box02_bline"><img src="../../images/spacer.gif" width="5" height="5"></td>
    <td valign="bottom"><img src="../../images/box02_br.gif" width="6" height="6"></td>
  </tr>
</table>
</body>
</html>
