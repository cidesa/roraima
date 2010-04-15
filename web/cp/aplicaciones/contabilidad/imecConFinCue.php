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

  if (!empty($_POST["mcodigo"]))
    {
      $codigo     = $_POST["mcodigo"];
      $descta     = strtoupper($_POST["descta"]);
      $etadef     = $_POST["etadef"];
      $cargable   = $_POST["RadioGroup2"];
      $tipo_saldo = $_POST["RadioGroup1"];
      $IncMod     = $_GET["IncMod"];
      $fecini     = $_POST["fecini"];
      $feccie     = $_POST["feccie"];
      $saldo_anterior=$_POST["saldo_anterior"];
    //// Guardamos los datos del Grig //////
    $i=1;
    while ($i<=13)
      {
        $col1[$i] = $_POST["x".$i."1"];
        $col2[$i] = $_POST["x".$i."2"];
        $col3[$i] = $_POST["x".$i."3"];
        $col4[$i] = $_POST["x".$i."4"];
        $col5[$i] = $_POST["x".$i."5"];
        $col6[$i] = $_POST["x".$i."6"];
        $col7[$i] = $_POST["x".$i."7"];

        $i=$i+1;
      }
    ///////////////
    }			//echo $col5[1];

  if (!empty($_GET["imec"]))
  {
    $imec=$_GET["imec"];
    $continuar = true;
    if ($imec=='I') //Salvar
    {
      ////   Verificar Cargable ////
      // LA CUENTA SE PIENSA DEFINIR COMO CARGABLE
      if ($cargable=='Si')
      //por lo tanto la cuenta no puede tener ctas hijas
      {
        $sql= "select * from contabb where trim(codcta) like trim('$codigo%') and length(trim(codcta))> + length(trim('$codigo'))";
        $tb=$bd->select($sql);
        if (!$tb->EOF)
        {
          Mensaje("No se puede definir esta cuenta como cargable ya que la misma tiene cuentas Hijas");
          Regresar("ConFinCue.php?mcodigo=$codigo");
          $continuar= false;
        }
      }

      if ($continuar)
      {
	      $sql= "Select * from CONTABB where trim(codcta)=trim('$codigopadre') and cargab='C'";
	      $tb=$bd->select($sql);
	      if (!$tb->EOF)
          {
	        Mensaje("Existe una Cuenta Padre Cargable para este Código");
	        Regresar("ConFinCue.php?mcodigo=$codigo");
            $continuar= false;
	      }

    	  if ($continuar)
	      {
	      //////////// Grabar_Cuenta ////////////
	        $bd->startTransaccion();
	          grabar_cuenta();
	          Grabar_Periodos();
	          ActualizarCuenta(1); //En Vb en vez de 1 estaba +
	        $bd->completeTransaccion();

	      ///////////////////////////////////////
	         Mensaje("Código Guardado");
	         Regresar("ConFinCue.php");
	      }
      }
      }


    elseif ($imec=='E')    //Eliminar
    {	 //EliminarRegistroDetalle
    $bd->startTransaccion();

      // Guardar en Segbitaco
      $sql = "Select id from contabb where trim(codcta)=trim('$codigo') and fecini=to_date('$fecini','DD/MM/YYYY') and feccie=to_date('$feccie','DD/MM/YYYY')";
      
      $tb=$bd->select($sql);
      $id = $tb->fields["id"];

       $sql1="delete from contabb1 where trim(codcta)=trim('$codigo') and fecini=to_date('$fecini','DD/MM/YYYY') and feccie=to_date('$feccie','DD/MM/YYYY')";
         $bd->actualizar($sql1);
       $sql="delete from contabb where trim(codcta)=trim('$codigo') and fecini=to_date('$fecini','DD/MM/YYYY') and feccie=to_date('$feccie','DD/MM/YYYY')";
         $bd->actualizar($sql);
       ActualizarCuenta(2); //En Vb en vez de 2 estaba -
       $bd->Log($id, 'con', 'Contabb', 'Confincue', 'E');
    $bd->completeTransaccion();

       Mensaje("Código Eliminado");
       Regresar("ConFinCue.php");

    }
  }



  function prueba()
  {
    global $bd;
    global $z;
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


    if ($tb=$z->buscar_datos("select * from contabb")){ echo "SI"; } else { echo "NO";} exit;

  }

  function ActualizarCuenta($var1)
  {
    global $bd;
    global $codigo;
    global $fecini;
    global $feccie;
    global $etadef;
    global $col1;
    global $col2;
    global $col3;
    global $col5;
    global $saldo_anterior;


   if ($etadef!='C'){ //Ejercicio No esta Cerrado
    $bd->startTransaccion();

      $num=instr($codigo,'-',0,1);
      if ($num<>0)
      {
       $cuentaini = substr($codigo,0,$num-1);
       $cuentafin = $codigo;

       $sql="select * from contabb where codcta >= '$cuentaini' and codcta < '$cuentafin' and position(trim(codcta) in trim('$cuentafin'))<>0 and to_char(fecini,'dd/mm/yyyy')='$fecini' and  to_char(feccie,'dd/mm/yyyy')='$feccie'";
       $tb=$bd->select($sql);
       if (!$tb->EOF)
          {
          while(!$tb->EOF)
            {
               $codcta=$tb->fields["codcta"];
               $salant=str_replace(',','',$col5[1]); // Se le quita la ,

        		$salant= $tb->fields["salant"] - $saldo_anterior + $salant;
            //if ($var1=='1'){ $salant= $tb->fields["salant"] - $saldo_anterior + $salant; }
            //else{  $salant= $tb->fields["salant"] - $salant; }

            	$sql="update contabb set salant='$salant' where codcta >= '$cuentaini' and codcta < '$cuentafin' and position(trim(codcta) in trim('$cuentafin'))<>0 and to_char(fecini,'dd/mm/yyyy')='$fecini' and  to_char(feccie,'dd/mm/yyyy')='$feccie'";
            	$bd->actualizar($sql);

               //$sql="select * from contabb1 where trim(codcta) = trim('$codcta') and to_char(fecini,'DD/MM/YYYY')='$fecini' and to_char(feccie,'DD/MM/YYYY')='$feccie'";
            	$sql="update contabb1 set salact='$salant' where trim(codcta) = trim('$codcta') and to_char(fecini,'dd/mm/yyyy')='$fecini' and to_char(feccie,'dd/mm/yyyy')='$feccie'";
            	$bd->actualizar($sql);

          	$tb->MoveNext();
          }
        }
      }
    $bd->completeTransaccion();
     }
   return true;
  }

  function Grabar_Periodos()
  {
    global $codigo;
    global $IncMod;
    global $fecini;
    global $feccie;
    global $bd;
    global $col1;
    global $col2;
    global $col3;
    global $col5;

/*		global $descta;
    global $cargable;
    global $tipo_saldo;*/

    $sql = "delete from contabb1 where trim(codcta) = trim('$codigo') and to_char(fecini,'dd/mm/yyyy')='$fecini' and to_char(feccie,'dd/mm/yyyy')='$feccie'";
    $bd->actualizar($sql);

    $bd->startTransaccion();
      $i=2;
      while ($i<=13)
        {
          $pereje=$col1[$i];
            $totdeb=str_replace(',','',$col2[$i]); // Se le quita la ,
          $totcre=str_replace(',','',$col3[$i]); // Se le quita la ,
          $salact=str_replace(',','',$col5[$i]); // Se le quita la ,

          $sql = "insert into contabb1 (codcta,fecini,feccie,pereje,totdeb,totcre,salact) values ('$codigo',to_date('$fecini','DD/MM/YYYY'),to_date('$feccie','DD/MM/YYYY'),'$pereje','$totdeb','$totcre','$salact')";
          $bd->actualizar($sql);

          $i=$i+1;
        }

    $bd->completeTransaccion();
  }


  function grabar_cuenta()
  {
    global $bd;
    global $codigo;
    global $descta;
    global $cargable;
    global $tipo_saldo;
    global $IncMod;
    global $fecini;
    global $feccie;
    global $col1;
    global $col2;
    global $col3;
    global $col5;
    global $col6;
    global $col7;

      if ($cargable=='Si'){ $cargab='C';}else{ $cargab='N';}
      if ($tipo_saldo=='D'){ $debcre='D';}else{ $debcre='C';}

      $salant=str_replace(',','',$col5[1]); // Se le quita la ,
      $salprgper=str_replace(',','',$col6[1]); // Se le quita la ,

     if ($IncMod == "M"){
       $sql="update contabb set descta='$descta', fecini=to_date('$fecini','DD/MM/YYYY'),feccie=to_date('$feccie','DD/MM/YYYY'), salant='$salant', salprgper='$salprgper', salacuper=0, cargab='$cargab', debcre='$debcre' where trim(codcta)='$codigo'";
       $bd->actualizar($sql);

    //Todos los movimientos heredan el tipo de saldo Deudor o Acreedor
       $sql="update contabb set debcre='$debcre' where codcta like '$codigo%'";
       $bd->actualizar($sql);

      // Guardar en Segbitaco
      $sql = "Select id from contabb where trim(codcta)='$codigo'";
      
      $tb=$bd->select($sql);
      $id = $tb->fields["id"];
      $bd->Log($id, 'con', 'Contabb', 'Confincue', 'A');

     }else{    //Incluir

      $sql = "insert into contabb (codcta,descta,salant,salprgper,salacuper,cargab,debcre,fecini,feccie) values ('$codigo','$descta','$salant','$salprgper','0','$cargab','$debcre',to_date('$fecini','DD/MM/YYYY'),to_date('$feccie','DD/MM/YYYY'))";
      $bd->actualizar($sql);
      
      // Guardar en Segbitaco
      $sql = "Select id from contabb where trim(codcta)='$codigo'";
      
      $tb=$bd->select($sql);
      $id = $tb->fields["id"];
      $bd->Log($id, 'con', 'Contabb', 'Confincue', 'G');
      
      
      }


  }
?>

