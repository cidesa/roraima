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

    $tipdoc=$_POST["tipdoc"];
    $nomext=$_POST["nomext"];
    $nomabr=$_POST["nomabr"];

    $imec=$_GET["imec"];


function crearLog($valor)
{
  global $bd;
  global $tipdoc;
  // Guardar en Segbitaco
  $sql = "Select id from cpdocprc where tipprc='".$tipdoc."' ";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpdocprc', 'Predocprc', $valor);
  
}

    ////////////////
    ////////////////
    ////////////////
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $sql="insert into cpdocprc (tipprc,nomext,nomabr)
            values ('".$tipdoc."','".$nomext."','".$nomabr."')";
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
          $sql="update cpdocprc set nomext='".$nomext."',
                      nomabr='".$nomabr."'
                    where tipprc='".$tipdoc."' ";
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
        crearLog('E');
          $sql="delete from cpdocprc where tipprc='".$tipdoc."' ";
        $bd->actualizar($sql);
      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
        ?>
        <script>
            alert("No se puede eliminar, el Documento esta siendo usado por uno o m�s movimientos");
          location=("PreDocPre.php");
        </script>
        <?
      }

    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreDocPre.php");
</script>
