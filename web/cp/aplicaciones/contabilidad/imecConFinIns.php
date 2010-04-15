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

    $formato=$_POST["formato"];

    $codigo=$_POST["codigo"];
    $fecini=$_POST["fecini"];
    $feccie=$_POST["feccie"];
        $total=$_POST["cont"];

    $i=1;
    $cont=1;
      while ($i<=$total-1)
      {
          $grid1[$i]=$_POST["x".$i."1"];
          $grid2[$i]=$_POST["x".$i."2"];
          $grid3[$i]=$_POST["x".$i."3"];
          $i++;
      }


  // GRABAR INSTITUCION
  $numrup=split("-",$formato);

  $sql1="select * from contaba";
  $tb=$bd->select($sql1);
    if (!$tb->EOF)
    {
    $sql="update contaba set
              forcta='".$formato."',
              numrup=".count($numrup).",
              loncta=".strlen(trim($formato)).",
              fecini=to_date('".$fecini."','dd/mm/yyyy'),
              feccie=to_date('".$feccie."','dd/mm/yyyy'),
              etadef='A'
              where codemp='001' ";
    }
    else
    {
      $sql="insert into contaba (codemp,loncta,numrup,forcta,fecini,feccie,etadef)
    values ('001',".strlen(trim($formato)).",".count($numrup).",'".$formato."',to_date('".$fecini."','dd/mm/yyyy'),to_date('".$feccie."','dd/mm/yyyy'),'A')";
    }
    
      $sql = "Select id from contaba where codemp='001'";
      
      $tb=$bd->select($sql);
      $id = $tb->fields["id"];
      $bd->Log($id, 'con', 'Contabb', 'Confinins', !$tb->EOF ? 'A' : 'G');

    
  $bd->actualizar($sql);
  ///////////////

  // GRABAR PERIODOS
     $sql="delete from contaba1";
       $bd->actualizar($sql);
     $i=1;
     while ($i<$total)
     {

       $bd->startTransaccion();

       $sql="insert into contaba1 (fecini,feccie,pereje,fecdes,fechas,status)
      values (to_date('".$fecini."','dd/mm/yyyy'),to_date('".$feccie."','dd/mm/yyyy'),'".$grid1[$i]."',to_date('".$grid2[$i]."','dd/mm/yyyy'),to_date('".$grid3[$i]."','dd/mm/yyyy'),'A')".';';

      $bd->actualizar($sql);

      $bd->completeTransaccion();
      $i++;
     }
    //////////////////
?>
<script>
  location=("ConFinIns.php");
</script>
