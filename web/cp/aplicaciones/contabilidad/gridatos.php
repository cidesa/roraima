<?
session_start();
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
//validar();            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Buscando...</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
Buscando...
<?
$sql=$_GET["sql"];
$cuantos=$_GET["cuantos"];
$cta=$_GET["cta"];
$id=$_GET["id"];
$donde=$_GET["donde"];
$foco=$_GET["foco"];
$tira=$_GET["tira"];

if ($cuantos=='1')
{
gridatos1();
}
else if ($cuantos=='2')
{
validacuenta();
}

  function gridatos1()
  {
    global $bd;
    global $cta;
    global $id;
    global $donde;
    global $foco;
    global $sql;

    $z= new tools();

    $sql=str_replace("¿","'",$sql);
    $sql=str_replace("�","'",$sql);
    if ($tb=$z->buscar_datos($sql))
    {
      $valor=$tb->fields["campo1"];
    ?>

      <script>
        var donde= '<? print $donde;?>';
        var foco= '<? print $foco;?>';
        var valor= '<? print $valor;?>';
        opener.document.getElementById(donde).value=valor;
        opener.document.getElementById(foco).focus();
        close();
      </script>
    <?
    }
    else
    {
    ?>
      <script>
        alert("Esta Cuenta Presupuestaria No Existe...");
        var id= '<?=$id;?>';
        opener.document.getElementById(id).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?
    }
  }


  function validacuenta()
  {
    global $bd;
    global $tira;
    global $foco;
    global $id;

    $z= new tools();
    $sql="select * from contabb where codcta='".$tira."' ";

    if ($tb=$z->buscar_datos($sql))
    {
    ?>
      <script>
        var foco= '<? print $foco;?>';
        opener.document.getElementById(foco).focus();
        close();
      </script>
    <?

    }
    else
    {
    ?>
      <script>
        var id= '<? print $id;?>';
        alert("La Cuenta Contable No existe, Defínala Primero.");
        opener.document.getElementById(id).value="";
        opener.document.getElementById(id).focus();
        close();
      </script>
    <?
    }
  }

?>

</body>
</html>
