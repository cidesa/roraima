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

    $imec=$_GET["imec"];


    ////////////////
    ////////////////
    ////////////////
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $sql="insert into cpdocaju (tipaju,nomext,nomabr,refier)
            values ('".$tipdoc."','".$nomext."','".$nomabr."','".$radio."')";
            
        $bd->actualizar($sql);
        
        // Guardar en Segbitaco
        $sql = "Select id from cpdocaju where tipaju='".$tipdoc."' ";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpdocaju', 'Predocaju', $imec=='I' ? 'G' : 'A');
        
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
          $sql="update cpdocaju set nomext='".$nomext."',
                      nomabr='".$nomabr."',
                      refier='".$radio."'
                    where tipaju='".$tipdoc."' ";

        $bd->actualizar($sql);
        
        // Guardar en Segbitaco
        $sql = "Select id from cpdocaju where tipaju='".$tipdoc."' ";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpdocaju', 'Predocaju', $imec=='I' ? 'G' : 'A');

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

        // Guardar en Segbitaco
        $sql = "Select id from cpdocaju where tipaju='".$tipdoc."' ";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpdocaju', 'Predocaju', 'E');

        $sql="delete from cpdocaju where tipaju='".$tipdoc."' ";
        $bd->actualizar($sql);
      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
        ?>
        <script>
          alert("No se puede eliminar ese Ajuste por que esta siendo referenciado en CPMOVAJU");
          location=("PreDocAju.php");
        </script>
        <?
      }

    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreDocAju.php");
</script>
