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
    $var=$_GET["var"];

function crearLog($valor)
{
  global $bd;  
  // Guardar en Segbitaco
  $sql = "Select id from cpdefniv where codemp='001' ";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpdefniv', 'Predefniv', $valor);
  
}


     if ($var=='C'){   //Cerrar
         $sql="select * from cpdefniv where etadef='A'";
        if ($tb=$z->buscar_datos($sql))
           {
              $sql = "update cpdefniv set etadef='C'";
              crearLog('A');
          $bd->actualizar($sql);
          Mensaje('La Etapa de Definicion se Cerró con Exito.');
          Regresar('PreEtaDef.php');
           }
           else
           {
               Mensaje('La Etapa de Definicion no Existe o Ya esta Cerrada.');
            Regresar('PreEtaDef.php');
           }
    }else if ($var=='A'){ //Abrir

         $sql="select * from cpdefniv where etadef='C'";
        if ($tb=$z->buscar_datos($sql))
           {
              $sql = "update cpdefniv set etadef='A'";
          $bd->actualizar($sql);
          crearLog('A');
          Mensaje('La Etapa de Definicion se Abrio con Exito.');
          Regresar('PreEtaDef.php');
           }
           else
           {
               Mensaje('La Etapa de Definicion no Existe o Ya esta Abierto.');
            Regresar('PreEtaDef.php');
           }
     }

    Mensaje('Error intente de Nuevo.');
    Regresar('PreEtaDef.php');

?>