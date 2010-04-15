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
    $tiptraprc=$_POST["tiptraprc"];

    $imec=$_GET["imec"];

function crearLog($valor)
{
  global $bd;
  // Guardar en Segbitaco
  $sql = "Select id from fordefniv where codemp='001'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Fordefniv', 'Prenivprefor', $valor);
  
}

    $i=1;
    while ($i<=20)
      {
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
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        //Grabar Cabecera
        $sql="insert into fordefniv (codemp,loncod,rupcat,ruppar,nivdis,forpre,peract,numper,asiper,
            fecini,feccie,fecper,etadef,staprc,coraep)
            values ('001','".strlen($formato)."',".$clacat.",".$clapar.",".$nivel.",'".$formato."','01',".$numper.",'".$asigper."',
            to_date('".$fecha1."','dd/mm/yyyy'),to_date('".$fecha2."','dd/mm/yyyy'),to_date('".$fecha3."','dd/mm/yyyy'),
            'A','N','".$corr."')";
        $bd->actualizar($sql);
        crearLog('G');
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }////////////////////
    else if ($imec=="M")
    {
      try
      {
        //Grabar Cabecera
          $sql="update fordefniv set loncod=50,
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
        crearLog('A');
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }

    }

    //////////////////////////////
    //////////////////////////////
    try
      {
      //Grabar Grid Niveles
        $sql="delete from forniveles";
        $bd->actualizar($sql);

        $i=1;
        while ($i<=$fin)
        {
          $sql="insert into forniveles (consec,catpar,lonniv,nomabr,nomext,staniv)
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
        $sql="delete from forpereje";
        $bd->actualizar($sql);

        $i=1;
        while ($i<=$cont-1)
        {
          $sql="insert into forpereje (fecini,feccie,pereje,fecdes,fechas,cerrado)
            values (to_date('".$fecha1."','dd/mm/yyyy'),to_date('".$fecha2."','dd/mm/yyyy'),
            '".$c1[$i]."',to_date('".$c2[$i]."','dd/mm/yyyy'),to_date('".$c3[$i]."','dd/mm/yyyy'),'N')";
          $bd->actualizar($sql);
          $i=$i+1;
        }
    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
    }

    $bd->completeTransaccion();
?>
<script>
  location=("PreNivPreFor.php");
</script>
