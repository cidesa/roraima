<?
session_name('cidesa');
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

    $periodo=$_POST["periodo"];
    $fecdes=$_POST["fecdes"];
    $fechas=$_POST["fechas"];
    $var=$_GET["var"];

    if (!empty($periodo))
     {
     if ($var=='C'){ //Cerra
         $sql="select * from cppereje where pereje='".$periodo."' AND cerrado='N'";
        if ($tb=$z->buscar_datos($sql))
           {
            if ($periodo!='01'){
           	$sql2="select * from cppereje where pereje<'".$periodo."' order by pereje desc limit 1";
           	if ($tb1=$z->buscar_datos($sql2))
            {
              if ($tb1->fields["cerrado"]!='N'){
	              $sql = "update cppereje set cerrado='C' where pereje='".$periodo."'";
	              $bd->actualizar($sql);
	              Mensaje('El Periodo se Cerró con Exito.');
	              Regresar('PreCiePer.php');
              }else{
              	Mensaje('El Periodo anterior a este, no esta Cerrado. Debe cerrarlo primero');
                Regresar('PreCiePer.php');
              }
            }
            }else{
            	$sql = "update cppereje set cerrado='C' where pereje='".$periodo."'";
                $bd->actualizar($sql);
                Mensaje('El Periodo se Cerró con Exito.');
                Regresar('PreCiePer.php');
            }
           }
           else
           {
               Mensaje('El Periodo no Existe o Ya esta Cerrado.');
               Regresar('PreCiePer.php');
           }
    }else if ($var=='N'){ //Abrir

        $sql="select * from cppereje where pereje='".$periodo."' AND cerrado='C'";
        if ($tb=$z->buscar_datos($sql))
           {
              $sql = "update cppereje set cerrado='N' where pereje='".$periodo."'";
          $bd->actualizar($sql);
          Mensaje('El Periodo se Abrio con Exito.');
          Regresar('PreCiePer.php');
           }
           else
           {
               Mensaje('El Periodo no Existe o Ya esta Abierto.');
            Regresar('PreCiePer.php');
           }
     }
    // Guardar en Segbitaco
    $sql = "Select id from cppereje where pereje='".$periodo."'";

    $tb=$bd->select($sql);
    $id = $tb->fields["id"];
    $bd->Log($id, 'pre', 'Cppereje', 'Precieper', 'A');

    }

    Mensaje('Error intente de Nuevo.');
    Regresar('PreCiePer.php');

?>