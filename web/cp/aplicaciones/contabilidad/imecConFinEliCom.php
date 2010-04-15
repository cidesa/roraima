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
          SalvarComprobantes();
      /////////////////////////////
    }
  }

  function SalvarComprobantes()
  {
    global $tools;
    global $bd;
    global $col1;
    global $col2;
    global $col3;
    global $cant;

    try{
      $cont=1;
      $bd->startTransaccion();
      while ($cont<=$cant)
        {
         $numcom=$col2[$cont];
         $feccom=$col3[$cont];

          $sql = "Select id from contabc where NUMCOM = '".$numcom."' And TO_CHAR(FECCOM,'dd/mm/yyyy') = '" .$feccom."'";
          
          $tb=$bd->select($sql);
          $id = $tb->fields["id"];


          $sql="delete from contabc1 Where NUMCOM = '".$numcom."' And TO_CHAR(FECCOM,'dd/mm/yyyy') = '" .$feccom."'";
          $bd->actualizar($sql);

          $sql="delete from contabc Where NUMCOM = '".$numcom."' And TO_CHAR(FECCOM,'dd/mm/yyyy') = '" .$feccom."'";
          $bd->actualizar($sql);

          // Guardar en Segbitaco
          $bd->Log($id, 'con', 'Contabc', 'Confinelicom', 'E');

         $cont=$cont+1;
        }

        $bd->completeTransaccion();
        Mensaje("Eliminacion Realizada");
        Regresar("ConFinEliCom.php");
    }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }
?>