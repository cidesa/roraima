<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/classcom.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$classcom=new classcom();
$z= new tools();


  /////////////////////////////////////

      $fecini = $_POST["fecini"];
    $dia    = substr($fecini,0,1);
    $ano    = substr($fecini,6,4);
    $feccie = $_POST["feccie"];
    $var    = $_GET["var"];

    if (!empty($fecini))
     {
       //if (Cargar_Cuentas() and (!Verificar_Diferidos()))
       //print 'aaaaaaaaaaaaaaaaa';
       //exit;
       if (!Verificar_Diferidos())
       {
              Generar_Comprobante_Cierre("CIEJ".$ano);
         if (!GraboContabilidad()){
          Mensaje("No se concluyo el cierre");
          return true;
                }
      }
        }


        function GraboContabilidad()
    {

    }

        function Verificar_Diferidos()
    {
       global $z;
       global $feccie;
       global $fecini;

      $sql = "select * from contabc where feccom>=TO_DATE('".fecini."','DD/MM/YYYY') AND feccom<=TO_DATE('".$feccie."','DD/MM/YYYY') AND STACOM='D'";
      if ($tb=$z->buscar_datos($sql))
      {
         Mensaje("Todavia existen comprobantes diferidos en el Ejercicio");
         return true;
      }

      $sql = "select * from contaba1 where status='A'";
      if ($tb=$z->buscar_datos($sql))
      {
         Mensaje("Debe cerrar todos los Periodos antes de hacer el Cierre de Ejercicio");
         return true;
            }
      return false;
    }


    function Cargar_Cuentas()
    {
         global $z;
       global $feccie;
       global $fecini;
       global $activos;
       global $pasivos;
       global $ingresos;
       global $egresos;
       global $capital;
       global $resultado;
       global $resultado_anterior;
       global $desresultado;
       global $ultimoperiodo;

       $sql= "select * from contaba";
      if (!$tb=$z->buscar_datos($sql))
      {
          $feccie    = $tb->fields["feccie"];
          $activos   = $tb->fields["codtesact"];
          $pasivos   = $tb->fields["codtespas"];
          $ingresos  = $tb->fields["codind"];
          $egresos   = $tb->fields["codegd"];
          $capital   = $tb->fields["codcta"];
          $resultado = $tb->fields["codres"];
          $resultado_anterior = $tb->fields["codresant"];

          $sql = "Select descta from contabb where codcta='".$resultado."'";
          if (!$tb=$z->buscar_datos($sql))
          {
             $desresultado = $tb->fields["descta"];
          }

          $sql= "select max(pereje) as ultper from contabb1";
          if (!$tb=$z->buscar_datos($sql))
          {
           $ultimoperiodo = $tb->fields["ultper"];
          }

          if ($activos = "" or
           $pasivos = "" or
           $ingresos = "" or
           $egresos = "" or
           $capital = "" or
           $resultado = "" or
           $resultado_anterior = ""){

           Mensaje("Verifique en Tipos de Cuentas y en Cuentas Contables que los datos esten completos");
           return false;

          }else{
           return true;
          }

        }else{
          return  false;
        }

    }


  /*	 if ($var=='C'){ //Cerrar
         $sql = "select * from contabc where feccom>=to_date('".$fecdes."','DD/MM/YYYY') and feccom<=to_date('".$fechas."','DD/MM/YYYY') and stacom='D'";
        if (!$tb=$z->buscar_datos($sql))
           {
            $sql = "update contaba1 set status='C' where pereje='".$periodo."'";
        $bd->actualizar($sql);
        Mensaje('El Periodo se Cerro con Exito.');
        Regresar('ConFinCiePer.php');

      }else{
          Mensaje('No se puede cerrar el periodo ya que contiene Comprobante DIFERIDOS.');
        Regresar('ConFinCiePer.php');

      }
    }else if ($var=='A'){ //Abrir

        $sql = "select * from contabc where feccom>=to_date('".$fecdes."','DD/MM/YYYY') and feccom<=to_date('".$fechas."','DD/MM/YYYY') and stacom='D'";
        if (!$tb=$z->buscar_datos($sql))
           {
            $sql = "update contaba1 set status='A' where pereje='".$periodo."'";
        $bd->actualizar($sql);
          Mensaje('El Periodo se abrio con Exito.');
        Regresar('ConFinCiePer.php');

      }else{
          Mensaje('No se puede abrir el perodo ya que contiene Comprobante DIFERIDOS.');
        Regresar('ConFinCiePer.php');
      }
     }
    }

    Mensaje('Error intente de Nuevo.');
  //	Regresar('ConFinCiePer.php');*/

?>