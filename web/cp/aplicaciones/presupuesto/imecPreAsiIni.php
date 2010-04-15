<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
require($_SESSION["x"].'lib/general/tools.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools=new tools();

    ////////  Recibimos las Variables por el POST  /////////

  if (!empty($_POST["codpre"]))
    {
    $codigopre=trim($_POST["codpre"]);
    $nompre=trim($_POST["nompre"]);
    $monasi=str_replace(',','',trim($_POST["monasi"])); // Se le quita la ,
    $ano=trim($_POST["ano"]);
    $IncMod=trim($_GET["IncMod"]);

    $fechainicio=trim($_POST["fechainicio"]);
    $anoinicio=trim($_POST["anoinicio"]);
    $fechacierre=trim($_POST["fechacierre"]);
    $anocierre=trim($_POST["anocierre"]);
    //// Guardamos los datos del Grig //////

    $i=1;
    while ($i<=12)
      {
        if (trim($_POST["x".$i."1"])!="")
        {
          $col1[$i]=str_replace(',','',$_POST["x".$i."1"]); // Se le quita la ,
          $col2[$i]=str_replace(',','',$_POST["x".$i."2"]); // Se le quita la ,
          $i=$i+1;
      $perje=$perje+1;
        }
        else
        {
          $fin=$i-1;
          $i=13;
        }
      }
    ///////////////


  if (!empty($_GET["imec"]))
  {
    $imec=$_GET["imec"];
    if ($imec=='I') //Salvar o Actualizar
    {
      //////////// Grabar_Cuenta ////////////
        $bd->startTransaccion();
      if (NoSobregira()){
        if (($ano >= $anoinicio) and ($ano <= $anocierre)){
          $sql="select etadef from cpdefniv";
              if ($tb=$tools->buscar_datos($sql))
          {
            $etadef=$tb->fields["etadef"];
            if ($etadef<>'C'){
              Grabar_Asignacion();
            }
            else
            {
              if (($IncMod=='I') and ($monasi=='0'))
              {
                Grabar_Asignacion();
              }else {
                Mensaje("No puede Grabar ya que la Etapa de Definición está Cerrada");
                Regresar("PreAsiIni.php"); }
            }
          }
        }
        else //if (($ano >= $anoinicio) and ($ano <= $anocierre)){
        {
         Mensaje("Año se encuentra fuera del Periodo Actual");
         Regresar("PreAsiIni.php");
        }
      }else{
        Mensaje("El Monto a Asignar no puede ser menor al monto ejecutado");
        Regresar("PreAsiIni.php");
      }

        // Guardar en Segbitaco
        $sql = "Select id from cpasiini where trim(codpre)='$codigopre' and anopre='$ano' and perpre='00'";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpasiini', 'Preasiini', 'G' );

        $bd->completeTransaccion();
      ///////////////////////////////////////

         Mensaje("Código Guardado");
         Regresar("PreAsiIni.php?var=9&mcodigo=$codigopre");
      }


    elseif ($imec=='E')    //Eliminar
    {	 //EliminarRegistroDetalle
        $bd->startTransaccion();
    
        // Guardar en Segbitaco
        $sql = "Select id from cpasiini where trim(codpre)='$codigopre' and anopre >= '$anoinicio' and anopre <= '$anocierre'";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpasiini', 'Preasiini', 'E' );

       //$sql1="delete from cpdeftit where trim(codpre)=trim('$codigopre')";
       $sql1= "Delete from cpasiini where trim(codpre)='$codigopre' and anopre >= '$anoinicio' and anopre <= '$anocierre'";
       $bd->actualizar($sql1);
    $bd->completeTransaccion();

       Mensaje("Código Presupuestario Eliminado");
       Regresar("PreAsiIni.php");

    }
    }
  }


  function NoSobregira()
  {
    global $bd;
    global $tools;
    global $codigopre;
    global $monasi;
return true;
      $sql	="select * from cpasiini where perpre='00' and trim(codpre)='$codigopre'";
    if ($tb=$tools->buscar_datos($sql))
     {
      $moneje=$tb->fields["monprc"];
      $MontoComparar=(($monasi+ $tb->fields["monadi"] + $tb->fields["montra"]) - ($tb->fields["montrn"] - $tb->fields["mondim"]));
      if ($MontoComparar <= $moneje)
      {
        return false;
      }
      }
  return true;
  }


  function Grabar_Asignacion()
  {
    global $bd;
    global $codigopre;
    global $monasi;
    global $nompre;
    global $ano;
    global $col1;
    global $col2;
    global $tools;
    global $IncMod;
  global $perje;

    try
    {

       if ($IncMod <> "M"){
     //Incluir
         $mont=(float)$monasi;
       //periodo 00
        $sql = "insert into cpasiini (codpre,nompre,perpre,anopre,monasi,monprc,moncom,moncau,monpag,montra,montrn,monadi,mondim,monaju,mondis,difere,status)
        values ('$codigopre','$nompre','00','$ano','$mont',0,0,0,0,0,0,0,0,0,'$mont',0,'A')";
        $bd->actualizar($sql);

      $i=1;
      while($i<=$perje)
      {
      $mont=(float)$col2[$i];
        $sql = "insert into cpasiini (codpre,nompre,perpre,anopre,monasi,monprc,moncom,moncau,monpag,montra,montrn,monadi,mondim,monaju,mondis,difere,status)
        values ('$codigopre','$nompre','$col1[$i]','$ano','$mont',0,0,0,0,0,0,0,0,0,'$mont',0,'A')";
        $bd->actualizar($sql);
         $i=$i+1;
      }

   }
   else
   {    //Modificar
    //Primero el Periodo 00
      $mont=(float)$monasi;
      $sql="update cpasiini set monasi=$mont , mondis=($mont+coalesce(monadi,0)+coalesce(montra,0)-coalesce(montrn,0)-coalesce(mondim,0)-coalesce(monprc,0))  where trim(codpre)='$codigopre' and anopre='$ano' and perpre='00'";
      $bd->actualizar($sql);

      //luego los demas periodos
      $i=1;
      while($i<=12)
      {
      $mont=(float)$col2[$i];
      $sql="update cpasiini set monasi=$mont , mondis=($mont+coalesce(monadi,0)+coalesce(montra,0)-coalesce(montrn,0)-coalesce(mondim,0)-coalesce(monprc,0))  where trim(codpre)='$codigopre' and anopre='$ano' and perpre='$col1[$i]'";

     // echo $sql."<br>";
      $bd->actualizar($sql);

        $i=$i+1;
      }

   }	//else

          //AJUSTAR DIFERENCIAS EN LOS MONTOS DE CPASIINI
      $sql="select monasi from cpasiini where trim(codpre)='$codigopre' and anopre='$ano' and perpre='00'";
       if ($tb=$tools->buscar_datos($sql))
      {
          $montotot=$tb->fields["monasi"];
        $sql="Select coalesce(sum(monasi),0) as montoacu from cpasiini where trim(codpre)='$codigopre' and anopre='$ano' and perpre>='01' and perpre<='12'";
        $bd->actualizar($sql);
        if ($tb=$tools->buscar_datos($sql))
        {
        $montoacu=$tb->fields["montoacu"];
        if ($montotot<>$montoacu)
          {
            $dif=$montotot - $montoacu;
          $sql="update cpasiini set monasi=monasi+$dif where trim(codpre)='$codigopre' and anopre='$ano' and perpre='01'";
          $bd->actualizar($sql);
          }
        }
      }

     }//try
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
    }
  }	//end function
?>

