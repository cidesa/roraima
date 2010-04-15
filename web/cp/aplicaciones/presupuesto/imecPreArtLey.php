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

  $codart=$_POST["tipdoc"];
  $nomext=$_POST["nomext"];
  $nomabr=$_POST["nomabr"];
  $nivelI=$_POST["nivelI"];
  if (!empty($_POST["nivelI"]))   $stacon="S"; else $stacon="N";
  if (!empty($_POST["nivelII"]))  $stagob="S"; else $stagob="N";
  if (!empty($_POST["nivelIII"])) $stapre="S"; else $stapre="N";
  if (!empty($_POST["nivelIV"]))  $staniv4="S"; else $staniv4="N";
  if (!empty($_POST["nivelV"]))   $staniv5="S"; else $staniv5="N";
  if (!empty($_POST["nivelVI"]))  $staniv6="S"; else $staniv6="N";

    $imec=$_GET["imec"];

    ////////////////
    ////////////////
    ////////////////
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $sql="insert into cpartley (codart,desart,nomabr,stacon,stagob,stapre,staniv4,staniv5,staniv6)
            values ('".$codart."','".$nomext."','".$nomabr."','".$stacon."','".$stagob."','".$stapre."','".$staniv4."','".$staniv5."','".$staniv6."')";
            
        $bd->actualizar($sql);

        // Guardar en Segbitaco
        $sql = "Select id from cpartley where trim(codart) = '".trim($codart)."'";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpartley', 'Preartley', 'G' );

        
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
          $sql="update cpartley set desart='".$nomext."',
                      nomabr='".$nomabr."',
                      stacon='".$stacon."',
                      stagob='".$stagob."',
                      stapre='".$stapre."',
                      staniv4='".$staniv4."',
                      staniv5='".$staniv5."',
                      staniv6='".$staniv6."'
                    where codart='".$codart."' ";

        $bd->actualizar($sql);
        
        // Guardar en Segbitaco
        $sql = "Select id from cpartley where trim(codart) = '".trim($codart)."'";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpartley', 'Preartley', 'A' );
        
        
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
       // exit();
      }
    }
    else if ($imec=="E")
    {
      try
      {
          // Guardar en Segbitaco
          $sql = "Select id from cpartley where trim(codart) = '".trim($codart)."'";
      
          $tb=$bd->select($sql);
          $id = $tb->fields["id"];
          $bd->Log($id, 'pre', 'Cpartley', 'Preartley', 'E' );
        
          $sql="delete from cpartley where codart='".$codart."' ";
          $bd->actualizar($sql);
      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
        ?>
        <script>
          alert("No se puede eliminar, el Documento esta siendo usado por uno o mas movimientos");
          location=("PreArtLey.php");
        </script>
        <?
      }

    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreArtLey.php");
</script>
