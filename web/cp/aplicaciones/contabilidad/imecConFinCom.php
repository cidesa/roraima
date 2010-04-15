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

    $debitos  = (float)str_replace(',','',$_POST["debitos"]);
    $creditos = (float)str_replace(',','',$_POST["creditos"]);
    $fecha    = $_POST["fecha"];
    $desc     = $_POST["desc"];
    $numero   = substr($_POST["numero"],0,8);

    $i=1;

    while ($i<=500)
      {
      	if ($_POST["x".$i."1"])
      	{
	        $compara=trim(str_replace("-","",$_POST["x".$i."1"]));

	        if ($compara!="")
	        {
	          $grid1[$i]=$_POST["x".$i."1"];
	          $grid2[$i]=$_POST["x".$i."2"];
	          $grid3[$i]=$_POST["x".$i."3"];
	          $grid4[$i]=(float)str_replace(',','',$_POST["x".$i."4"]);
	          $grid5[$i]=(float)str_replace(',','',$_POST["x".$i."5"]);
	          $i=$i+1;
	        }
	        else
	        {
	          $fin=$i-1;
	          $i=51;
	        }

      	}else{
	          $fin=$i-1;
	          $i=501;
      	}

      }

    $status = $_GET["status"];
    $imec   = $_GET["imec"];

    if ($imec=='I' or $imec=='M'){
      if ($imec=='I') //Salvar
        {
        if ($debitos-$creditos==0)
        {
          $status="D";
        }
        else
        {
          $status="E";
        }
       }
       elseif ($imec=='M')  //Modificado
      {

        //if ($status=="DIFERIDO" || $status=="ACTUALIZADO")
        if ($status=="D" || $status=="E")
        {
          if ($debitos-$creditos==0)
          {
            $status="D";
          }
          else
          {
            $status="E";
          }
        }
      }

      //GRABAR COMPROBANTE
      GrabarComprobante();
      Mensaje("El Comprobante Fue Guardado con el Numero: ".$numero);

    }elseif ($imec=='E'){
             $status=$_GET["status"];
             GrabarComprobante();
       //Mensaje("Codigo Eliminado");
       //Regresar("ConFinCue.php");
    }

  function GrabarComprobante()
  {
    global $z;
    global $imec;
    global $numero;
    global $fecha;
    global $desc;
    global $debitos;
    global $status;
    global $grid1;
    global $grid2;
    global $grid3;
    global $grid4;
    global $grid5;
    global $bd;
    global $fin;

    $bd->startTransaccion();

    if ($imec=="I")
    {
      try
      {
          if ($fin<=1)
      {
        Mensaje("Comprobante NO GUARDADO, Error en los Asientos");
        ?>
        <script language="javascript1.1" type="text/javascript">
              location=("ConFinCom.php")
          </script>
        <?
        exit;
      }
        // Buscar el correlativo
        if ($numero=='########'){
        	$numero = Buscar_Correlativo($bd);
        }

        $sql="insert into contabc (numcom,feccom,descom,moncom,stacom,tipcom)
        values ('".$numero."',to_date('".$fecha."','dd/mm/yyyy'),'".$desc."',".$debitos.",'".$status."','CON')";

        $bd->actualizar($sql);

            // Guardar en Segbitaco
            $sql = "Select id from contabc where numcom='".$numero."' AND feccom=to_date('".$fecha."','dd/mm/yyyy')";

            $tb=$bd->select($sql);
            $bd->Log($tb->fields["id"], 'con', 'Contabc', 'Confincom', 'G');


      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }
    else// imec ="M"
    {
      try
      {
        $sql="update contabc set descom='".$desc."',
                     moncom=".$debitos.",
                     stacom='".$status."',
                     tipcom='CON'
            where numcom = '".$numero."' and feccom = to_date('".$fecha."','dd/mm/yyyy')";

       $bd->actualizar($sql);

            // Guardar en Segbitaco
            $sql = "Select id from contabc where numcom='".$numero."' AND feccom=to_date('".$fecha."','dd/mm/yyyy')";

            $tb=$bd->select($sql);
            $bd->Log($tb->fields["id"], 'con', 'Contabc', 'Confincom', 'A');


      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }

    // GRABAR ASIENTOS

      //Eliminamos primero los asientos para luego insertarlos
      $sql="delete from contabc1 where numcom = '".$numero."' and feccom = to_date('".$fecha."','dd/mm/yyyy')";
      $bd->actualizar($sql);

      //Grabamos en contabc1
      $i=1;
      while ($i<=$fin)
      {
        if ($grid4[$i]!="0.00")
        {
          $sql="insert into contabc1 (numcom,feccom,codcta,numasi,refasi,desasi,debcre,monasi)
            values ('".$numero."',to_date('".$fecha."','dd/mm/yyyy'),'".$grid1[$i]."','".$i."','".$grid3[$i]."','".$grid2[$i]."','D',".$grid4[$i].")";
        }
        else
        {
          $sql="insert into contabc1 (numcom,feccom,codcta,numasi,refasi,desasi,debcre,monasi)
            values ('".$numero."',to_date('".$fecha."','dd/mm/yyyy'),'".$grid1[$i]."','".$i."','".$grid3[$i]."','".$grid2[$i]."','C',".$grid5[$i].")";
        }
        $bd->actualizar($sql);
        $i=$i+1;
      }

    $bd->completeTransaccion();
  }
?>
    <script language="javascript1.1" type="text/javascript">
      location=("ConFinCom.php")
    </script>
