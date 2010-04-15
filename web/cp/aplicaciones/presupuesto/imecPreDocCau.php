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

    $imec=$_GET["imec"];


    ////////////////
    ////////////////
    ////////////////
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $sql="insert into cpdoccau (tipcau,nomext,nomabr,refier,afeprc,afecom,afecau,afedis)
            values ('".$tipdoc."','".$nomext."','".$nomabr."','".$radio."','".$radio0."','".$radio1."','".$radio3."','".$radio2."')";
            
        $bd->actualizar($sql);
        
        // Guardar en Segbitaco
        $sql = "Select id from cpdoccau where tipcau='".$tipdoc."' ";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpdoccau', 'Predoccau', 'G');
        
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
          $sql="update cpdoccau set nomext='".$nomext."',
                      nomabr='".$nomabr."',
                      refier='".$radio."',
                      afeprc='".$radio0."',
                      afecom='".$radio1."',
                      afecau='".$radio3."',
                      afedis='".$radio2."'
                    where tipcau='".$tipdoc."' ";

        $bd->actualizar($sql);

        // Guardar en Segbitaco
        $sql = "Select id from cpdoccau where tipcau='".$tipdoc."' ";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpdoccau', 'Predoccau', 'A');

        
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
        $sql = "Select id from cpdoccau where tipcau='".$tipdoc."' ";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpdoccau', 'Predoccau', 'E');

          $sql="delete from cpdoccau where tipcau='".$tipdoc."' ";
        $bd->actualizar($sql);
      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
        ?>
        <script>
            alert("No se puede eliminar, el Documento esta siendo usado por uno o m�s movimientos");
          location=("PreDocCau.php");
        </script>
        <?
      }

    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreDocCau.php");
</script>
