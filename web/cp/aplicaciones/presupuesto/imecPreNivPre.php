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
$tools= new tools();

  /////////////////////////////////////

    $clacat=intval($_POST["clacat"]);
    $clapar=intval($_POST["clapar"]);
    $nivel=intval($_POST["nivel"]);
    $formato=$_POST["formato"];
    $numper=intval($_POST["numper"]);
    $asigper=$_POST["asigper"];
    $precom=$_POST["precom"];
    $fecha1=$_POST["fecha1"];
    $fecha2=$_POST["fecha2"];
    $fecha3=$_POST["fecha3"];
    $corr=$_POST["corr"];
    //$tiptraprc=$_POST["tiptraprc"];
    $corprc       = $_POST["corprc"];
    $corcom       = $_POST["corcom"];
    $corcau       = $_POST["corcau"];
    $corpag       = $_POST["corpag"];
    $corsoltra    = $_POST["corsoltra"];
    $cortrasla    = $_POST["cortrasla"];
    $corsoladidis = $_POST["corsoladidis"];
    $coradidis    = $_POST["coradidis"];
    $coraju       = $_POST["coraju"];

    $imec=$_GET["imec"];

function crearLog($valor)
{
  global $bd;
  // Guardar en Segbitaco
  $sql = "Select id from cpdefniv where codemp='001' ";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpdefniv', 'Prenivpre', $valor);
  
}


    $i=1;

    while ($i<=20)
      {
        //echo $_POST["x".$i."1"]. "5";
        if (trim($_POST["x".$i."1"])!="")
        {
          $grid1[$i]=$_POST["x".$i."1"];
          $grid2[$i]=intval($_POST["x".$i."2"]);
          $grid3[$i]=$_POST["x".$i."3"];
          $grid4[$i]=$_POST["x".$i."4"];
          $i=$i+1;
        }
        else
        {
          $fin=$i-1;
          $i=21;
        }
      }

    ////////////////
    ////////////////
    // PRIMERO VALIDAMOS QUE NO EXISTA NINGUN CODIGO PRESUPUESTARIO EN:
    // CPDEFTIT, CPASIINI, CPIMPPRC, CPIMPCOM, CPIMPCAU, CPIMPPAG
  function verificar()
  {
    global $tools;
    $msg="";
      //verificar si tiene: precompromiso, compromiso, causado, pagado, ajuste, traslado, adiciones
      $sql="select * from cpasiini";
      if (!$tools->buscar_datos($sql)){
          $sql="select * from cpimpprc";
       if (!$tools->buscar_datos($sql)){
         $sql="select * from cpimpcom";
         if (!$tools->buscar_datos($sql)){
           $sql="select * from cpimpcau";
           if (!$tools->buscar_datos($sql)){
             $sql="select * from cpimppag";
             if (!$tools->buscar_datos($sql)){
               $sql="select * from cpmovaju";
               if (!$tools->buscar_datos($sql)){
                 $sql="select * from cpmovadi";
                 if (!$tools->buscar_datos($sql)){
                     $sql="select * from cpmovtra";
                     if (!$tools->buscar_datos($sql)){
                       $msg="";
                       return $msg;
                    }else{
                      $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios en TRASLADOS";}
                }else{
                  $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios en ADICIONES/DISMINUCIONES";}
              }else{
                $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios en AJUSTES";}
            }else{
              $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios en PAGOS";}
          }else{
            $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios en CAUSADOS";}
        }else{
          $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios en COMPROMISOS";}
      }else{
        $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios en PRECOMPROMISOS";}
    }else{
      $msg="No se pueden hacer cambios, ya que existen Códigos Presupuetarios con ASIGNACION INICIAL";}
  return $msg;
  }

    $msg=verificar();
     if (trim($msg) != '')
     {
       // grabamos correlativo, tiptraprc
       if ($imec=="M")
       {
            $sql="update cpdefniv set
                    coraep='".$corr."', corprc='".$corprc."',
                    asiper='".$asigper."' , corcom='".$corcom."' ,
                    corcau='".$corcau."' , corpag='".$corpag."' ,
                    corsoltra='".$corsoltra."' ,
                    cortrasla='".$cortrasla."',
                    corsoladidis='".$corsoladidis."',
                    coradidis='".$coradidis."', coraju='".$coraju."'
                   where codemp='001'";
		//Se elimino por que creo la pantalla con symfony
          //$bd->actualizar($sql);
       }
       ?>
       <script>
         msg='<? print $msg; ?>';
         alert(msg);
        location=("PrenivPre.php");
    </script>
       <?
       exit;
     }
    ////////////////
    //$bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        $bd->startTransaccion();
        //Grabar Cabecera
/*        $sql="insert into cpdefniv (codemp,loncod,rupcat,ruppar,nivdis,forpre,peract,numper,asiper,
            fecini,feccie,fecper,etadef,staprc,coraep,corprc,corcom, corcau, corpag, corsoltra, cortrasla, corsoladidis, coradidis, coraju)
            values ('001','".strlen($formato)."',".$clacat.",".$clapar.",".$nivel.",'".$formato."','01',".$numper.",'".$asigper."',
            to_date('".$fecha1."','dd/mm/yyyy'),to_date('".$fecha2."','dd/mm/yyyy'),to_date('".$fecha3."','dd/mm/yyyy'),
            'A','N','".$corr."','".$corprc."','".$corcom."','".$corcau."','".$corpag."','".$corsoltra."','".$cortrasla."','".$corsoladidis."','".$coradidis."','".$coraju."')";
*/
        $sql="insert into cpdefniv (codemp,loncod,rupcat,ruppar,nivdis,forpre,peract,numper,asiper,
            fecini,feccie,fecper,etadef,staprc)
            values ('001','".strlen($formato)."',".$clacat.",".$clapar.",".$nivel.",'".$formato."','01',".$numper.",'".$asigper."',
            to_date('".$fecha1."','dd/mm/yyyy'),to_date('".$fecha2."','dd/mm/yyyy'),to_date('".$fecha3."','dd/mm/yyyy'),
            'A','N')";

        crearLog('G');

        $bd->actualizar($sql);
        $bd->completeTransaccion();
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
      }
    }////////////////////
    else if ($imec=="M")
    {
      try
      {
        //Grabar Cabecera
          $sql="update cpdefniv set loncod=".strlen($formato).",
                      rupcat=".$clacat.",
                      ruppar=".$clapar.",
                      nivdis=".$nivel.",
                      forpre='".$formato."',
                      peract='01',
                      numper=".$numper.",
                      asiper='".$asigper."',
                      fecini=to_date('".$fecha1."','dd/mm/yyyy'),
                      feccie=to_date('".$fecha2."','dd/mm/yyyy'),
                      fecper=to_date('".$fecha3."','dd/mm/yyyy'),
                      etadef='A',
                      staprc='N',
                      coraep='".$corr."'
                    where codemp='001'";

        $bd->actualizar($sql);

      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
      }

    }

    //////////////////////////////
    //////////////////////////////
    try
      {
      //Grabar Grid Niveles
        $sql="delete from cpniveles";
        $bd->actualizar($sql);
//echo $fin;
//exit();
        $i=1;
        while ($i<=$fin)
        {
          $sql="insert into cpniveles (consec,catpar,lonniv,nomabr,nomext,staniv)
            values (".$i.",'".$grid1[$i]."',".$grid2[$i].",'".$grid3[$i]."','".$grid4[$i]."','A')";
          $bd->actualizar($sql);
          $i=$i+1;
        }

        //Grabar Grid Periodos

            // Generar Periodos
            $nro=$numper;
            $fecha=$fecha1;
            $fechacie=$fecha2;
            $cont=1;
            $incmes= 12 / $nro;
            $c1= array();
            $c2= array();
            $c3= array();

             $splitfecha = split('/', $fecha);
             $fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
             $splitfecha = split('/', $fechacie);
             $fechacie_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];


             while ((strtotime($fecha_for) < strtotime($fechacie_for)) && ($cont <= $nro))
              {
                  $splitfecha = split('-', $fecha_for);
                  $sfecha = $splitfecha[2] . "/" . $splitfecha[1] . "/" . $splitfecha[0];
                  $periodo = str_pad($cont, 2, '0', STR_PAD_LEFT);
                  $incmes=round($incmes);
                  $fectem=date("Y-m-d", strtotime("$fecha_for $incmes month"));
                  $dia=1;
                  $fecfin=date("Y-m-d", strtotime("$fectem -$dia day"));
                  $splitfecha = split('-', $fecfin);
                  $s2fecha = $splitfecha[2] . "/" . $splitfecha[1] . "/" . $splitfecha[0];
                //***
                  $c1[$cont]=$periodo;
                  $c2[$cont]=$sfecha;
                  $c3[$cont]=$s2fecha;
                //***
                 $fecha_for=date("Y-m-d", strtotime("$fecha_for $incmes month"));
                 $cont = $cont +1;
              }
            ///////////////////
        $sql="delete from cppereje";
        $bd->actualizar($sql);

        $i=1;
        while ($i<=$cont-1)
        {
          $sql="insert into cppereje (fecini,feccie,pereje,fecdes,fechas,cerrado)
            values (to_date('".$fecha1."','dd/mm/yyyy'),to_date('".$fecha2."','dd/mm/yyyy'),
            '".$c1[$i]."',to_date('".$c2[$i]."','dd/mm/yyyy'),to_date('".$c3[$i]."','dd/mm/yyyy'),'N')";
          $bd->actualizar($sql);
          $i=$i+1;
        }
    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
      exit();
    }

    //$bd->completeTransaccion();
?>
<script>
  location=("PrenivPre.php");
</script>
