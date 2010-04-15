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

    $periodo=$_POST["periodo"];
    $fecdes=$_POST["fecdes"];
    $fechas=$_POST["fechas"];
    $var=$_GET["var"];

    if (!empty($periodo))
     {
     if ($var=='C'){ //Cerrar
         $sql = "select * from contabc where feccom>=to_date('".$fecdes."','DD/MM/YYYY') and feccom<=to_date('".$fechas."','DD/MM/YYYY') and stacom='D'";
        if (!$tb=$z->buscar_datos($sql))
           {
             //verificamos que no haya algun otro periodo anterior abierto
             $sqlv="select * from contaba1 where pereje<'".$periodo."' and status='A' ";
             if (!$tbv=$z->buscar_datos($sqlv))
             {
              $sql = "update contaba1 set status='C' where pereje='".$periodo."'";
          $bd->actualizar($sql);
          
            // Guardar en Segbitaco
            $sql = "Select id from contaba1 where pereje='".$periodo."'";

            $tb=$bd->select($sql);
            $bd->Log($tb->fields["id"], 'con', 'Contaba1', 'Confincieper', 'A');
          
          Mensaje('El Periodo se Cerró con Exito.');
          Regresar('ConFinCiePer.php');
             }
             else
             {
               Mensaje('Hay Períodos Anteriores a este que están Abiertos, Ciérrelos Primero.');
            Regresar('ConFinCiePer.php');
             }
      }else
      {
          Mensaje('No se puede cerrar el periodo ya que contiene Comprobante DIFERIDOS.');
        Regresar('ConFinCiePer.php');

      }
    }else if ($var=='A'){ //Abrir

        $sql = "select * from contabc where feccom>=to_date('".$fecdes."','DD/MM/YYYY') and feccom<=to_date('".$fechas."','DD/MM/YYYY') and stacom='D'";
        if (!$tb=$z->buscar_datos($sql))
           {
            $sql = "update contaba1 set status='A' where pereje='".$periodo."'";
        $bd->actualizar($sql);

            // Guardar en Segbitaco
            $sql = "Select id from contaba1 where pereje='".$periodo."'";

            $tb=$bd->select($sql);
            $bd->Log($tb->fields["id"], 'con', 'Contaba1', 'Confincieper', 'A');

          Mensaje('El Periodo se abrio con Exito.');
        Regresar('ConFinCiePer.php');

      }else{
          Mensaje('No se puede abrir el periodo ya que contiene Comprobante DIFERIDOS.');
        Regresar('ConFinCiePer.php');
      }
     }
    }

    Mensaje('Error intente de Nuevo.');
  //	Regresar('ConFinCiePer.php');

?>