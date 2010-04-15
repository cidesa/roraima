<?
session_start();
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z=new tools();
$btn = $z->ConfBotones();

if (!empty($_GET["ref"]))
{
  $ref=$_GET["ref"];
  $fecha=$_GET["fecha"];
}

if (!empty($_POST["operacion"]))
{
   $ope=$_POST["operacion"];
  $ref=$_POST["ref"];
  $fecha=$_POST["fecha"];

  if ($ope=='E')
  {
    if ($z->validarFechaPresup($fecha))
    {
      if ($z->eliminarRegistroDetalle("cpimpprc","refprc",$ref))
      {
        if ($z->eliminarRegistroDetalle("cpprecom","refprc",$ref,true,'pre','preprecom'))
        {
            $sql="delete from cpmovfuefin where refmov='$ref' and tipmov='PRECOMPROMISO'";
            $bd->actualizar($sql);
                ?>
                <script>
                  alert('El registro ha sido eliminado con éxito');
                  close();
                </script>
                <?
        }
      }
    }
    else
    {
      cerrar();//Regresar("PreCompro.php?operacion=A&refcom=".$refcom."&feccom=".$feccom);
    }
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Operaciones</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style1 {
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
  font-weight: bold;
  color: #000099;
}
body {
  background-color: #FFFFCC;
}
-->
</style>
</head>
<body>
<form name="form1" method="post" action="">
 <fieldset>
  <table width="100%"  border="0" align="center">
    <tr bgcolor="#FFFFCC">
      <td colspan="4"><div align="center" class="style1">Operaci&oacute;n a Realizar... ? </div></td>
    </tr>
    <tr bgcolor="#FFFFCC">
    <? if ($btn["anular"]=='t'){ ?>
      <td width="37%">
        <div align="right">
          <input type="button" name="Button1" value="Anular" onClick="anular()">
        </div></td>
    <? } ?>
    <? if ($btn["eliminar"]=='t'){ ?>
      <td colspan="2"><div align="center">
        <input type="button" name="Button2" value="Eliminar" onClick="eliminar()">
      </div></td>
	<? } ?>
      <td width="38%">
        <div align="left">
          <input type="button" name="Button3" value="Cancelar" onClick="cancelar()">
          <input name="operacion" type="hidden" id="operacion">
          <input name="ref" type="hidden" id="ref" value="<? print $ref;?>">
          <input name="fecha" type="hidden" id="fecha" value="<? print $fecha;?>">
        </div></td>
    </tr>
  </table>
 </fieldset>
 </form>
</body>
<script language="javascript1.2">
function anular()
{
  ref='<?=$ref;?>';
  pagina="anularPagadoPrePrecom.php?ref="+ref+"&fecha="+document.getElementById('fecha').value;
  window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=650,height=170,resizable=yes,left=200,top=300");
}
function eliminar()
{
  f=document.form1;
  f.action="anueliPrePrecom.php";
  f.operacion.value="E";
  f.submit();
}
function cancelar()
{
  close();
}
</script>
</html>
