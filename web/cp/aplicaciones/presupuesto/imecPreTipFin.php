<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z= new tools();


  /////////////////////////////////////
  $codfin = $_POST["codfin"];
  $nomext = $_POST["nomext"];
  $nomabr = $_POST["nomabr"];
  $imec   = $_GET["imec"];
  /////////////////////////////////////

function crearLog($valor)
{
  global $bd;
  global $codfin;
  // Guardar en Segbitaco
  $sql = "Select id from fortipfin where codfin='".$codfin."'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Fortipfin', 'Pretipfin', $valor);
  
}

    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $sql="insert into fortipfin (codfin,nomext,nomabr)
            values ('".$codfin."','".$nomext."','".$nomabr."')";
        $bd->actualizar($sql);
        crearLog('G');
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }
    else if ($imec=="M")
    {
      try
      {
          $sql="update fortipfin set nomext='".$nomext."',
                      nomabr='".$nomabr."',
                    where codfin='".$codfin."' ";

        $bd->actualizar($sql);
        crearLog('A');
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }
    else if ($imec=="E")
    {
      try
      {
          $sql="delete from fortipfin where codfin='".$codfin."' ";
          $bd->actualizar($sql);
          crearLog('E');
      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
        ?>
        <script>
          alert("No se puede eliminar, este código esta siendo usado por uno o más movimientos");
          location=("PreTipFin.php");
        </script>
        <?
      }

    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreTipFin.php");
</script>
