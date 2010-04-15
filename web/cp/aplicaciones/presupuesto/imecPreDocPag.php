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
    $radio=$_POST["radio"];
    $radio0=$_POST["radio0"];
    $radio1=$_POST["radio1"];
    $radio2=$_POST["radio2"];
    $radio3=$_POST["radio3"];
    $radio4=$_POST["radio4"];

    $imec=$_GET["imec"];

function crearLog($valor)
{
  global $bd;
  global $tipdoc;
  // Guardar en Segbitaco
  $sql = "Select id from cpdocpag where tippag='".$tipdoc."' ";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpdocpag', 'Predocpag', $valor);
  
}


    ////////////////
    ////////////////
    ////////////////
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $sql="insert into cpdocpag (tippag,nomext,nomabr,refier,afeprc,afecom,afecau,afepag,afedis)
            values ('".$tipdoc."','".$nomext."','".$nomabr."','".$radio."','".$radio0."','".$radio1."','".$radio3."','".$radio4."','".$radio2."')";
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
          $sql="update cpdocpag set nomext='".$nomext."',
                      nomabr='".$nomabr."',
                      refier='".$radio."',
                      afeprc='".$radio0."',
                      afecom='".$radio1."',
                      afecau='".$radio3."',
                      afepag='".$radio4."',
                      afedis='".$radio2."'
                    where tippag='".$tipdoc."' ";
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
          $sql="delete from cpdocpag where tippag='".$tipdoc."' ";
        $bd->actualizar($sql);
      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
        ?>
        <script>
          alert("No se puede eliminar ese Pago por que esta siendo referenciado en CPPAGOS");
          location=("PreDocPag.php");
        </script>
        <?
      }

    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreDocPag.php");
</script>
