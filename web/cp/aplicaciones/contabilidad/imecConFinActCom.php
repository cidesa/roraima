<?
session_start();
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools=new tools();

    ////////  Recibimos las Variables por el POST  /////////

  if (!empty($_POST["i"]))
    {
    //$col1[]
    //// Guardamos los datos del Grig //////
    $i=$_POST["i"]-1;
    $cont=1;
    while ($cont<=$i)
      {
      $aux=$_POST["x".$cont."1"];
      if ($aux=='x'){
        $cant=$cant+1;
        $col1[$cant]=$_POST["x".$cont."1"];
        $col2[$cant]=$_POST["x".$cont."2"];
        $col3[$cant]=$_POST["x".$cont."3"];
        $col4[$cant]=$_POST["x".$cont."4"];
        }
        $cont=$cont+1;
      }
    }


  if (!empty($_GET["imec"]))
  {
    $imec=$_GET["imec"];
    if ($imec=='S') //Salvar
    {
      ////   SalvarComprobantes ////
        $bd->startTransaccion();
          SalvarComprobantes();
        $bd->completeTransaccion();
      /////////////////////////////
    }
  }


  function prueba()
  {
    global $bd;
    global $tools;
    global $codigo;
    global $fecini;
    global $feccie;
    global $etadef;
    global $col1;
    global $col2;
    global $col3;
    global $col5;
    global $saldo_anterior;
    global $codemp;


    if ($tb=$tools->buscar_datos("select * from contabb")){ echo "SI"; } else { echo "NO";} exit;

  }

  function SalvarComprobantes()
  {
    try
    {
      global $tools;
      global $bd;
      global $col1;
      global $col2;
      global $col3;
      global $cant;

        $cont=1;
        while ($cont<=$cant)
          {
            $numcom=$col2[$cont];
            $feccom=$col3[$cont];
            $sql="update contabc set stacom = 'A' where numcom = '$numcom' and to_char(feccom,'dd/mm/yyyy') = '$feccom'";
            $bd->actualizar($sql);
           
            // Guardar en Segbitaco
            $sql = "Select id from contabc where numcom = '$numcom' and to_char(feccom,'dd/mm/yyyy') = '$feccom'";

            $tb=$bd->select($sql);
            $bd->Log($tb->fields["id"], 'con', 'Contabc', 'Confinactcom', 'A');
            
          $cont=$cont+1;
          }
          Mensaje("Actualización Realizada");
          Regresar("ConFinActCom.php");
    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
    }
  }

?>