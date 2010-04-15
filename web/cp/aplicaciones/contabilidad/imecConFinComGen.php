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
    $debitos=(float)str_replace(',','',$_POST["debitos"]);
    $creditos=(float)str_replace(',','',$_POST["creditos"]);
    $numero=$_POST["numero"];
    $fecha=$_POST["fecha"];
    $desc=$_POST["desc"];
    $numero=$_POST["numero"];
    $tipcom=$_POST["tipcom"];
    $fecini=$_POST["fecini"];
    $feccie=$_POST["feccie"];
    $comprobante=$_GET["var"];


	if ($comprobante=='1'){
		TrasladarSaldos();
		Mensaje('Traslado Realizado con Exito');
        Regresar("ConFinCie.php");

	}else{
	  if (Verificar_Comprobante())
	  {
	    $i=1;
	    while ($i<=1000)
	      {
	      if (trim($_POST["xx".$i."1"])!="")
	      {
	        $grid1[$i]=$_POST["xx".$i."1"];
	        $grid2[$i]=$_POST["xx".$i."2"];
	        $grid3[$i]=$_POST["xx".$i."3"];
	        $grid4[$i]=(float)str_replace(',','',$_POST["xx".$i."4"]);
	        $grid5[$i]=(float)str_replace(',','',$_POST["xx".$i."5"]);
	        $i=$i+1;
	      }
	      else
	      {
	        $fin=$i-1;
	        $i=1001;
	      }
	      }
		  Respaldar();
	      Procesar();
	      Comprobante_de_Cierre();
	      //TrasladarSaldos();

	  }else{
	    Regresar('ConFinCie.php');
	  }
	}


 function TrasladarSaldos()
 {
 	global $bd;
 	global $z;

 	$CodOrigen="SIMA".$_SESSION["esquemaorigen"];
  	$CodDestino="SIMA".$_SESSION["esquemadestino"];

     $sql = "select * From CONTABA";
     if ($tb=$z->buscar_datos($sql)){
     	$CodIngreso = $tb->fields["codind"];
     	$CodEgreso = $tb->fields["codegd"];
     }else{
     	$CodIngreso = '5';
     	$CodEgreso  = '6';
    }

     $sql = "update ".chr(34)."$CodDestino".chr(34).".contabb
     		 set SalAnt=(Select SalAct from ".chr(34)."$CodOrigen".chr(34).".contabb1
     		 where
     		 ".chr(34)."$CodOrigen".chr(34).".contabb1.codcta=".chr(34)."$CodDestino".chr(34).".contabb.codcta and
     		 ".chr(34)."$CodOrigen".chr(34).".contabb1.PerEje='12')";

	  $bd->actualizar($sql);

///echo $sql."<br>";

		//"Saldos Iniciales de las Cuentas Contables Actualizadas ", vbInformation
       $sql = "update ".chr(34)."$CodDestino".chr(34).".contabb set salant=0,salprgper=0,salacuper=0 where ".chr(34)."$CodDestino".chr(34).".contabb.codcta like '$CodIngreso%' " ;
       $bd->actualizar($sql);
///echo $sql."<br>";
	   $sql = "update ".chr(34)."$CodDestino".chr(34).".contabb set salant=0,salprgper=0,salacuper=0 where ".chr(34)."$CodDestino".chr(34).".contabb.codcta like '$CodEgreso%' " ;
	   $bd->actualizar($sql);
///echo $sql."<br>";
	   //$sql = "update ".chr(34)."$CodDestino".chr(34).".contabb1 set salact=0,totdeb=0,totcre=0 where ".chr(34)."$CodDestino".chr(34).".contabb1.codcta like '$CodIngreso%' " ;
	   //$bd->actualizar($sql);
//echo $sql."<br>";
	   //$sql = "update ".chr(34)."$CodDestino".chr(34).".contabb1 set salact=0,totdeb=0,totcre=0 Where ".chr(34)."$CodDestino".chr(34).".contabb1.codcta like '$CodEgreso%' " ;
	   //$bd->actualizar($sql);
//echo $sql."<br>";

/*
      		$sql ="Select * From ".chr(34)."$CodDestino".chr(34).".CONTABA WHERE CODEMP = '001'";

         	if ($tb=$z->buscar_datos($sql))
          	{
	         	$sql ="Update ".chr(34)."$CodDestino".chr(34).".CONTABB SET
	                   SALANT=SALANT + (SELECT ".chr(34)."$CodOrigen".chr(34).".CONTABB1.SALACT FROM ".chr(34)."$CodOrigen".chr(34).".CONTABB1 WHERE ".chr(34)."$CodOrigen".chr(34).".CONTABB1.CODCTA='".$tb->fields["codres"]."'
	                   AND ".chr(34)."$CodOrigen".chr(34).".CONTABB1.PEREJE='12') WHERE ".chr(34)."$CodDestino".chr(34).".CONTABB.CODCTA= '".$tb->fields["codresant"]."'";
				$bd->actualizar($sql);
				echo $sql."<br>";
          	}*/

//exit();
 }

 function Comprobante_de_Cierre(){
  global $bd;
  global $z;
  global $debitos;
  global $creditos;
  global $desc;
  global $tipcom;
  global $numero;
  global $fecha;

      $sql= "UPDATE CONTABC SET STACOM='A' WHERE NUMCOM='CIERREEG'";
      $bd->actualizar($sql);

      $sql= "UPDATE CONTABC SET STACOM='A' WHERE NUMCOM='CIERREIN'";
      $bd->actualizar($sql);

      $sql= "UPDATE CONTABC SET STACOM='A' WHERE NUMCOM='CIERRERE'";
      $bd->actualizar($sql);


 }


 function Verificar_Comprobante()
 {
  global $bd;
  global $z;
  global $debitos;
  global $creditos;
  global $desc;
  global $tipcom;
  global $numero;
  global $fecha;

     /*$sql = "Select * From CONTABC Where NumCom='CIERREEG'";
     if ($tb=$z->buscar_datos($sql)){
     	Mensaje('');
     	    	return false
     }*/
	return true;
 }

function Procesar(){

  global $bd;
  global $z;
  global $debitos;
  global $creditos;
  global $desc;
  global $tipcom;
  global $numero;
  global $fecha;


         $sql = "Select * From CONTABC Where NumCom='".$numero."' and to_char(feccom,'DD/MM/YYYY')='".$fecha."'";
         if ($debitos == $creditos){
             $stacom = "D";
         }else{
             $stacom = "E";
         }

         if ($tb2=$z->buscar_datos($sql))
          {  //Modificacion

             $sql="update contabc set descom='".$desc."', stacom='".$stacom."', tipcom='".$tipcom."', moncom='".$debitos."'  where numcom='".$numero."' and to_char(feccom,'DD/MM/YYYY')='".$fecha."'";

      }else{ //Inclusion
             $sql="insert into contabc (descom,stacom,tipcom,moncom,numcom,feccom) values ('".$desc."','".$stacom."','".$tipcom."','".$debitos."', '".$numero."',to_date('".$fecha."','dd/mm/yyyy'))";

      }

  //    exit();
       //$bd->startTransaccion();
          $bd->actualizar($sql);
//       $bd->completeTransaccion();

       SalvarAsiento();
}

  function SalvarAsiento()
  {
    global $bd;
    global $z;
    global $numero;
    global $fecha;
    global $grid1;
    global $grid2;
    global $grid3;
    global $grid4;
    global $grid5;
    global $fin;
    global $fecini;
    global $feccie;
///
    //$bd->startTransaccion();

    $sql="delete from CONTABC1 Where NumCom='".$numero."' AND TO_CHAR(FECCOM,'DD/MM/YYYY')='".$fecha."'";
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
        elseif ($grid5[$i]!="0.00")
        {
          $sql="insert into contabc1 (numcom,feccom,codcta,numasi,refasi,desasi,debcre,monasi)
            values ('".$numero."',to_date('".$fecha."','dd/mm/yyyy'),'".$grid1[$i]."','".$i."','".$grid3[$i]."','".$grid2[$i]."','C',".$grid5[$i].")";
        }
        $bd->actualizar($sql);
        $i=$i+1;
      }
   //   $bd->completeTransaccion();
  }


  function Respaldar()
  {
      global $bd;
    global $z;
    global $fecini;
    global $feccie;

 //// $bd->startTransaccion();

/*		$sql="delete from hisconc1";
    $bd->actualizar($sql);

    $sql="delete from hisconc";
    $bd->actualizar($sql);

    $sql="delete from hisconb";
    $bd->actualizar($sql);

    $sql="delete from hisconb1";
    $bd->actualizar($sql);

    //Se respalda CONTABB
    $sql="insert into hisconb (codcta, descta, fecini, feccie, salant, debcre, cargab, salprgper, salacuper, salprgperfor) (select codcta, descta, fecini, feccie, salant, debcre, cargab, salprgper, salacuper, salprgperfor from contabb where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";

    $bd->actualizar($sql);

    //Se respalda CONTABB1
     $sql="insert into hisconb1 (codcta, fecini, feccie, pereje, totdeb, totcre, salact, salprgper, salprgperfor) (select codcta, fecini, feccie, pereje, totdeb, totcre, salact, salprgper, salprgperfor from contabb1 where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";

      $bd->actualizar($sql);



    //Se respalda CONTABC
    $sql="insert into hisconc (numcom, feccom, descom, moncom, stacom, tipcom) (select numcom, feccom, descom, moncom, stacom, tipcom from contabc where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";
      $bd->actualizar($sql);


    //Se respalda CONTABC1
     $sql="insert into hisconc1 (numcom,feccom, debcre, codcta, numasi, refasi, desasi, monasi) (select numcom,feccom, debcre, codcta, numasi, refasi, desasi, monasi from contabc1 where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";
      $bd->actualizar($sql);
  */

    $sql="drop table hisconc1 cascade";
    $bd->actualizar($sql);

    $sql="drop table hisconc cascade";
    $bd->actualizar($sql);

    $sql="drop table hisconb cascade";
    $bd->actualizar($sql);

    $sql="drop table hisconb1 cascade";
    $bd->actualizar($sql);

    //Se respalda CONTABB
/*		$sql="insert into hisconb (codcta, descta, fecini, feccie, salant, debcre, cargab, salprgper, salacuper, salprgperfor) (select codcta, descta, fecini, feccie, salant, debcre, cargab, salprgper, salacuper, salprgperfor from contabb where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";*/

    $sql="create table hisconb  as (select * from contabb  where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";
    $bd->actualizar($sql);

    //Se respalda CONTABB1
/*		 $sql="insert into hisconb1 (codcta, fecini, feccie, pereje, totdeb, totcre, salact, salprgper, salprgperfor) (select codcta, fecini, feccie, pereje, totdeb, totcre, salact, salprgper, salprgperfor from contabb1 where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";*/

    $sql="create table hisconb1  as (select * from contabb1  where fecini=to_date('".$fecini."','dd/mm/yyyy') and feccie=to_date('".$feccie."','dd/mm/yyyy'))";
      $bd->actualizar($sql);


    //Se respalda CONTABC
  /*	$sql="insert into hisconc (numcom, feccom, descom, moncom, stacom, tipcom) (select numcom, feccom, descom, moncom, stacom, tipcom from contabc where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";	  */
    $sql="create table hisconc  as (select * from contabc where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";
      $bd->actualizar($sql);


    //Se respalda CONTABC1
     /*$sql="insert into hisconc1 (numcom,feccom, debcre, codcta, numasi, refasi, desasi, monasi) (select numcom,feccom, debcre, codcta, numasi, refasi, desasi, monasi from contabc1 where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";	  */
    $sql="create table hisconc1  as (select * from contabc1 where feccom>=to_date('".$fecini."','dd/mm/yyyy') and feccom<=to_date('".$feccie."','dd/mm/yyyy'))";
      $bd->actualizar($sql);


 /// $bd->completeTransaccion();
  }


        function Verificar_Diferidos()
    {
       global $z;
       global $feccie;
       global $fecini;

       $sql = "select * from contabc where feccom>=TO_DATE('".$fecini."','DD/MM/YYYY') AND feccom<=TO_DATE('".$feccie."','DD/MM/YYYY') AND STACOM='D'";
//exit();
      if ($tb=$z->buscar_datos($sql))
      {
         Mensaje("Todavia existen comprobantes diferidos en el Ejercicio.");
         return true;
      }

      $sql = "select * from contaba1 where status='A'";
      if ($tb=$z->buscar_datos($sql))
      {
         Mensaje("Debe cerrar todos los Periodos antes de hacer el Cierre de Ejercicio.");
         return true;
            }
      return false;
    }


    function Cargar_Cuentas()
    {
       global $z;
       global $fecini;

        $sql= "select * from contaba";
      if ($tb=$z->buscar_datos($sql))
      {
          $GLOBALS["feccie"]    = $tb->fields["feccie"];
          $GLOBALS["activos"]   = $tb->fields["codtesact"];
          $GLOBALS["pasivos"]   = $tb->fields["codtespas"];
          $GLOBALS["ingresos"]  = $tb->fields["codind"];
          $GLOBALS["egresos"]   = $tb->fields["codegd"];
          $GLOBALS["capital"]   = $tb->fields["codcta"];
          $GLOBALS["resultado"] = $tb->fields["codres"];
          $GLOBALS["resultado_anterior"] = $tb->fields["codresant"];

          $sql = "Select descta from contabb where codcta='".$resultado."'";
          if ($tb=$z->buscar_datos($sql))
          {
             $GLOBALS["desresultado"] = $tb->fields["descta"];
          }

          $sql= "select max(pereje) as ultper from contabb1";
          if ($tb=$z->buscar_datos($sql))
          {
           $GLOBALS["ultimoperiodo"] = $tb->fields["ultper"];
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
?>
    <script language="javascript1.1" type="text/javascript">
      alert('Cierre Realizado.');
      close();
      //location=("ConFinCie.php")
    </script>
