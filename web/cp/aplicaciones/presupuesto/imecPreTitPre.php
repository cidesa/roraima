<?
session_start();
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z=new tools();

    ////////  Recibimos las Variables por el POST  /////////

  if (!empty($_POST["codigopre"]))
    {
    $codigopre=trim($_POST["codigopre"]);
    $nompre=trim(($_POST["nompre"]));
    $codcta=trim($_POST["codcta"]);
    $descta=trim($_POST["descta"]);
    $LongitudCuenta=trim($_POST["LongitudCuenta"]);
    $IncMod=trim($_GET["IncMod"]);

function crearLog($valor)
{
  global $bd;
  global $codigopre;
  // Guardar en Segbitaco
  $sql = "Select id from cpdeftit where codpre='".$codigopre."'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpdeftit', 'Pretitpre', $valor);
  
}

  if (!empty($_GET["imec"]))
  {
    $imec=$_GET["imec"];
    if ($imec=='I' || $imec=='M' ) //Salvar
    {
      //////////// Grabar_Cuenta ////////////
      //validamos que la cta contable exista
      $sqlv="select * from contabb where codcta='".$codcta."'";
      if ($tbv=$z->buscar_datos($sqlv))
      {
        $bd->startTransaccion();
          Grabar_CodigoPre();
          ModificarNombreEnAsignacionInicial();
        $bd->completeTransaccion();
      }
      else
      {

        ////////// Definicion Presupuestaria ///////////
        $sql="select forpre from cpdefniv";
        if ($tb=$z->buscar_datos($sql))
        {
          $MascaraPresupuesto=trim($tb->fields["forpre"]);
          if (empty($MascaraPresupuesto))
          {
            Mensaje("La Definición Presupuestaria no ha sido grabada");
            Regresar("PreTitPre.php");
          }else{
            //print $MascaraPresupuesto.'--'.$codcta;exit();
                    if(strlen($MascaraPresupuesto)==strlen($codcta)){
              Mensaje("La Cuenta Contable que ud asoció NO EXISTE.");
              Regresar("PreTitPre.php");
            }else{
              $bd->startTransaccion();
                $codcta='';
                Grabar_CodigoPre();
                ModificarNombreEnAsignacionInicial();
              $bd->completeTransaccion();
            }
          }
        }else{
              Mensaje("No Esta Definido El Formato Presupuestario.");
              Regresar("PreTitPre.php");
        }


      }
      ///////////////////////////////////////

         Mensaje("Código Guardado");
         Regresar("PreTitPre.php?var=9&mcodigo=$codigopre");
      }


    elseif ($imec=='E')    //Eliminar
    {	 //EliminarRegistroDetalle
      $bd->startTransaccion();
      crearLog('E');
      $sql1="delete from cpdeftit where trim(codpre)=trim('$codigopre')";
      $bd->actualizar($sql1);
      $bd->completeTransaccion();

      Mensaje("Código Presupuestario Eliminado");
      Regresar("PreTitPre.php");

    }
    }
  }


  function ModificarNombreEnAsignacionInicial()
  {
    global $bd;
    global $codigopre;
    global $nompre;
    global $codcta;
    global $descta;
    global $IncMod;
    global $LongitudCuenta;

	$configemp =  $_SESSION["configemp"]["aplicacion"]["presupuesto"]["modulos"]["precongen"]["codpremay"];
	$nombre =  ($configemp=='S') ? strtoupper($nompre) : $nompre;
    $sql="update cpasiini set nompre='$nombre' where codpre='$codigopre'";
     $bd->actualizar($sql);
  }


  function Grabar_CodigoPre()
  {
    global $bd;
    global $codigopre;
    global $nompre;
    global $codcta;
    global $descta;
    global $IncMod;
    global $LongitudCuenta;

	$configemp =  $_SESSION["configemp"]["aplicacion"]["presupuesto"]["modulos"]["precongen"]["codpremay"];
	$nombre =  ($configemp=='S') ? strtoupper($nompre) : $nompre;


     if ($IncMod == "M"){
       $sql="update cpdeftit set nompre='$nombre', codcta='$codcta', stacod='A' where codpre='$codigopre'";
       $bd->actualizar($sql);
       crearLog('A');

     }else{    //Incluir
       $sql = "insert into cpdeftit (codpre,nompre,codcta,stacod) values ('$codigopre','$nombre','$codcta','A')";
       $bd->actualizar($sql);
       crearLog('G');
     }
      
  }
?>

