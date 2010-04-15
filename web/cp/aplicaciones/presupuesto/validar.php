<?
session_start();
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/tools.php');
//validar();            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tool= new tools();

if (!empty($_GET["fecha"]))
{
  $fecha=$_GET["fecha"];
  if ($tool->validarFechaPresup($fecha))
  {
    if (empty($_GET["varfec"]))
    {
      ?>
      <script>
        if (opener.document.getElementById('desc'))
        {
          opener.document.getElementById('desc').focus();
        }
      </script>
      <?
    }
    else
    {
      if ($_GET["varfec"]=='1')
      {
        ?>
        <script>
          opener.document.getElementById('descom').focus();
        </script>
        <?
      }
      elseif ($_GET["varfec"]=='2')
      {
        ?>
        <script>
          opener.document.getElementById('desanu').focus();
        </script>
        <?

      }
      elseif ($_GET["varfec"]=='3')
      {
        ?>
        <script>
          opener.document.getElementById('despag').focus();
        </script>
        <?

      }

    }

  }
  else
  {
    if (empty($_GET["varfec"]))
    {
      ?>
      <script>
        opener.document.getElementById('fecha').value="";
        opener.document.getElementById('fecha').focus();
      </script>
      <?
    }
    else
    {
      if ($_GET["varfec"]=='1')
      {
        ?>
        <script>
          opener.document.getElementById('feccom').value="";
          opener.document.getElementById('feccom').focus();
        </script>
        <?
      }
      elseif ($_GET["varfec"]=='2')
      {
        ?>
        <script>
          opener.document.getElementById('fecha').value="";
          opener.document.getElementById('fecha').focus();
        </script>
        <?
      }
      elseif ($_GET["varfec"]=='3')
      {
        ?>
        <script>
          opener.document.getElementById('fecpag').value="";
          opener.document.getElementById('fecpag').focus();
        </script>
        <?
      }
    }
  }
}

?>
<script>
close();
</script>