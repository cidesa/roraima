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
  try
  {
  if (!empty($_POST["codpre"]))
    {
    $codigopre=trim($_POST["codpre"]);
    $nompre=trim($_POST["nompre"]);
    $codigocon=trim($_POST["codigocon"]);
    $nompre1=trim($_POST["nompre1"]);
    $todos=trim($_POST["todos"]); // Para saber si marco todas con el check
    $i=$_POST["i"];


      $cont=1;
      $contador=1;
      while ($cont<=$i)
      {
        if ($_POST["x".$cont."1"]=='1')
        {
          $col1[$contador]=$_POST["x".$cont."2"];
          $contador=$contador+1;
        }
          $cont=$cont+1;
      }

      ///////////////
      $bd->startTransaccion();
        Grabar_CodigoPre();
        // Guardar en Segbitaco
        $sql = "Select id from cpdeftit where trim(codpre)='$codigopre'";
    
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpdeftit', 'Preasipar', 'G' );

        $bd->completeTransaccion();

      $bd->completeTransaccion();
      ///////////////

         Mensaje("Las Partidas fueron Copiadas con Exito.");
         Regresar("PreAsiPar.php");
    }
    }
    catch(Exception $e)
    {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
    }


  function Grabar_CodigoPre()
  {
    global $tools;
    global $bd;
    global $codigopre;
    global $nompre;
    global $codigocon;
    global $nompre1;
    global $todos;
    global $col1;

   /* print " todos" . $todos;
    if ($todos=='1')
    {
      $busq="(select a.* from (select '$codigocon'||substr(codpre,6) as codpre,nompre,codcta,stacod,coduni,estatus,codtip from cpdeftit where substr(codpre,1,5)='$codigopre' ) as a full outer join cpdeftit b on a.codpre=b.codpre where b.codpre is null order by a.codpre)";
      $sql="insert into cpdeftit ".$busq;
      print "sql ". $sql;
      //$bd->actualizar($sql);
    }else{*/

      $conta=1;
      while ($conta<=count($col1))
       {
        $concurrencia=1;
        $PosGuion=instr($col1[$conta],'-',0,$concurrencia);
        while ($PosGuion<>0)
        {
        $CodigoMov= $codigopre."-".substr($col1[$conta],0,$PosGuion-1);
        $CodigoMov=trim($CodigoMov);
        $sql= "select * from cpdeftit where trim(codpre)='$CodigoMov'";
        if ($tb=$tools->buscar_datos($sql))
           {
             $CodigoGrabar= $codigocon."-".substr($col1[$conta],0,$PosGuion-1);
            $nompre=$tb->fields["nompre"];
            $codcta=$tb->fields["codcta"];
            $sql= "select * from cpdeftit where trim(codpre)='$CodigoGrabar'";
              if (!$tb=$tools->buscar_datos($sql))
               {
                  $sql="insert into cpdeftit (codpre,nompre,codcta,stacod) values ('$CodigoGrabar','$nompre','$codcta','A')";
                  $bd->actualizar($sql);
               //   print "GRABAR";
               }
           }
          $concurrencia=$concurrencia+1;
           $PosGuion=instr($col1[$conta],'-',0,$concurrencia);
        }//end while


        $CodigoMov= $codigopre."-".$col1[$conta];
        $CodigoMov=trim($CodigoMov);
        $sql= "select * from cpdeftit where trim(codpre)='$CodigoMov'";
          if ($tb=$tools->buscar_datos($sql))
           {
            $CodigoGrabar= $codigocon."-".$col1[$conta];
            $nompre=$tb->fields["nompre"];
            $codcta=$tb->fields["codcta"];
            $sql= "select * from cpdeftit where trim(codpre)='$CodigoGrabar'";
              if (!$tb=$tools->buscar_datos($sql))
               {
                 $sql="insert into cpdeftit (codpre,nompre,codcta,stacod) values ('$CodigoGrabar','$nompre','$codcta','A')";
                $bd->actualizar($sql);
             //   print "GRABAR";
               }
           }
        $conta=$conta+1;
        }
    }
  //}
?>
