<?
session_start();
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(15),'presupuesto','precausar.php');            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z=new tools();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?
$ref    = $_GET["ref"];
$status = $_GET["status"];
$fecha  = $_GET["fecha"];
$totpag = (float)str_replace(',','',$_GET["totpag"]);

  if ($status=='N')
  {
    ?>
    <script>
      alert("El Causado ya esta Anulado");
      close();
    </script>
    <?
    exit;
  }

  $sql="select * from cpimpcau where refcau='".$ref."'";
  if ($tb=$z->buscar_datos($sql))
  {
    if ($tb->fields["monaju"]>0)
    {
      ?>
      <script>
        alert("El Causado No Puede ser Eliminado Ni Anulado, Tiene un Ajuste");
        close();
      </script>
      <?
      exit;
    }
  }

  if ($totpag>0)
  {
    ?>
    <script>
      alert("El Causado No Puede ser Eliminado Ni Anulado, Tiene Movimiento");
      close();
    </script>
    <?
    exit;
  }
  else
  {
    ?>
    <script>
    if (confirm("¿Realmente desea Anular/Eliminar...?"))
    {
      ref='<?=$ref;?>';
      fecha='<?=$fecha;?>';
      pagina="anueliPreCausar.php?ref="+ref+"&fecha="+fecha;
      window.open(pagina,"","menubar=no,toolbar=no,scrollbars=no,width=550,height=150,resizable=yes,left=200,top=300");
      window.opener.document.location="PreCausar.php";
    }
    close();
    </script>
    <?
  }

?>
</body>
</html>
