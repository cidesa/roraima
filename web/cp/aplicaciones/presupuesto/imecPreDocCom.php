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

    $tipdoc = $_POST["tipdoc"];
    $nomext = $_POST["nomext"];
    $nomabr = $_POST["nomabr"];
    $radio  = $_POST["radio"];
    $radio0 = $_POST["radio0"];
    $radio1 = $_POST["radio1"];
    $radio2 = $_POST["radio2"];
    $reqaut = $_POST["reqaut"];   //Requiere Autorizacion

    $imec=$_GET["imec"];

function crearLog($valor)
{
  global $bd;
  global $tipdoc;
  // Guardar en Segbitaco
  $sql = "Select id from cpdoccom where tipcom='".$tipdoc."' ";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpdoccom', 'Predoccom', $valor);
  
}

    ////////////////
    ////////////////
    ////////////////
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $sql="insert into cpdoccom (tipcom,nomext,nomabr,refprc,afeprc,afecom,afedis,reqaut)
            values ('".$tipdoc."','".$nomext."','".$nomabr."','".$radio."','".$radio0."','".$radio1."','".$radio2."','".$reqaut."')";
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
          $sql="update cpdoccom set nomext='".$nomext."',
                      nomabr='".$nomabr."',
                      refprc='".$radio."',
                      afeprc='".$radio0."',
                      afecom='".$radio1."',
                      afedis='".$radio2."',
                      reqaut='".$reqaut."'
                    where tipcom='".$tipdoc."' ";
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
          $sql="delete from cpdoccom where tipcom='".$tipdoc."' ";
        $bd->actualizar($sql);
      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
        ?>
        <script>
            alert("No se puede eliminar, el Documento esta siendo usado por uno o más movimientos");
          location=("PreDocCom.php");
        </script>
        <?
      }

    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreDocCom.php");
</script>

