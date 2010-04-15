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
  if (!empty($_POST["refcom"]))
    {
    $refcom  = trim($_POST["refcom"]);
    $descom  = trim($_POST["descom"]);
    $feccom  = trim($_POST["feccom"]);
    $tipcom  = trim($_POST["tipcom"]);
    $cedrif  = trim($_POST["cedrif"]);
    $refprc  = substr(trim($_POST["refprc"]),0,8);
    //$refprc  = trim($_POST["refprc"]);

    $imec    = $_GET["imec"];

      $totmont = (float)str_replace(',','',$_POST["totmont"]);

    if (!$tools->validarFechaPresup($feccom))
    {
      Regresar("PreCompro.php");
      exit;
    }

      $cont = 1;
      while ($cont<=50)
      {
        if ($_POST["x".$cont."1"]!='')
        {
          //echo substr(trim($_POST["x".$cont."1"]),0,2)."<br>";

          if (substr(trim($_POST["x".$cont."1"]),0,2)!="--")
          {
          //  echo (float)str_replace(',','',$_POST["x".$cont."2"])."<br>";

            if ((float)str_replace(',','',$_POST["x".$cont."2"])!=0)
            {
              $col1[$cont] = $_POST["x".$cont."1"];
              $col2[$cont] = (float)str_replace(',','',$_POST["x".$cont."2"]);
              $col3[$cont] = (float)str_replace(',','',$_POST["x".$cont."3"]);
              $col4[$cont] = (float)str_replace(',','',$_POST["x".$cont."4"]);
                $col7[$cont] = $_POST["x".$cont."7"];
            }else
            {
              Mensaje("Existe Monto con valor 0, No se puede Guardar.");
              Regresar("PreCompro.php");
              exit;
            }
          }
          $cont=$cont+1;
        }else
        {
          $cont=51;
        }

      }
      ///////////////
      //$bd->startTransaccion();
      if ($imec=='A'){
        Autorizar_Compromiso();
      }else{
        Grabar_Compromiso();
        Grabar_GridImpCom();
      }
      
      // Guardar en Segbitaco
      $sql = "Select id from cpcompro where refcom='$refcom'";
  
      $tb=$bd->select($sql);
      $id = $tb->fields["id"];
      $bd->Log($id, 'pre', 'Cpcompro', 'Precompro', $imec=='I' ? 'G' : 'A');
      
      //$bd->completeTransaccion();
      ///////////////

        Mensaje("Los Datos Del Compromiso Fueron Guardado Con Exito.");
        LanzarReporte('presupuesto','cprcompromiso.php&refcomdes='.$refcom.'&refcomhas='.$refcom.'');
        Regresar("PreCompro.php");
    }
    }
    catch(Exception $e)
    {
        Print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
    }


  function Grabar_GridImpCom()
  {
    global $tools;
    global $bd;
    global $refcom;
    global $descom;
    global $feccom;
    global $tipcom;
    global $cedrif;
    global $refprc;
    global $imec;
    global $col1;
    global $col2;
    global $col3;
    global $col4;
    global $col7;
    global $totmont;

  try
    {
        $sql= "select * from CPImpCom where trim(RefCom)='$refcom'";
      if (!$tb=$tools->buscar_datos($sql))
      {
        $sql="delete from cpimpcom where trim(refcom)='$refcom'";
        $bd->actualizar($sql);
      }
      // echo $refprc;exit();
      $conta=1;
      while ($conta<=count($col1))
      {
        //if ($tipcom==''){ $tip_com='NULO';}else{$tip_com=$tipcom;}
        if ($col7[$conta]==''){ $refere = 'NULO'; }else{ $refere = $col7[$conta]; }

        $sql="insert into CPImpCom (RefCom,CodPre,MonImp,MonCau,MonPag,MonAju,StaImp,Refere)  values ('".$refcom."','".$col1[$conta]."',".$col2[$conta].",".$col3[$conta].",".$col4[$conta].",0,'A','".$refere."')";
        $bd->actualizar($sql);
        $conta++;
      }

    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
      exit();
    }
  }

  function Autorizar_Compromiso()
  {
    global $tools;
    global $bd;
    global $refcom;

    try
    {
      $sql="update cpcompro set aprcom='S' where refcom='$refcom'";
      $bd->actualizar($sql);
      //exit();
    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
      exit();
    }
  }

  function Grabar_Compromiso()
  {
    global $tools;
    global $bd;
    global $refcom;
    global $descom;
    global $feccom;
    global $tipcom;
    global $cedrif;
    global $refprc;
    global $imec;
    global $col1;
    global $totmont;

  try
    {
      ////////////// CORRELATIVO ////////////////
        $reg='';
        if ($refcom=='########')
        {
          $tools->getVerCorrelativo('corcom','cpdefniv',$reg);
          $encontrado = false;

          //Busca el correlativo si existe
                while (!$encontrado)
                {
                  $refcom = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refcom from CPCompro where refcom='$refcom'";
                  if ($tb=$tools->buscar_datos($sql))
                  {
                    $reg = $reg + 1;
                  }
                  else
                  {
                    $encontrado=true;
                  }
                }

                $tools->getSalvarCorrelativo('corcom','cpdefniv',$refcom);

        }else
        //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
        {
          $sql   = "select refcom from CPCompro where refcom='$refcom'";
          if ($tb=$tools->buscar_datos($sql))
          {
            $encontrado = false;
          if (Confirmar("Esta refencia".$refcom." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
          {
          //Busca una referencia valida
                while (!$encontrado)
                {
                  $refcom = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refcom from CPCompro where refcom='$refcom'";
                  if ($tb=$tools->buscar_datos($sql))
                  {
                    $reg = $reg + 1;
                  }
                  else
                  {
                    $encontrado=true;
                  }
                }

          }else
          {
            Regresar("PreCompro.php");
            exit;
          }
          }
        }
                ////////////////////////////



        //Permite saber si esta activo o no la verificacion del compromiso
        $sql = "select reqaut from cpdoccom where tipcom = '$tipcom'";
          if ($tb=$tools->buscar_datos($sql))
          {
            //Si esta activo la opcion de Aprobacion,
            //colocar en el Compromiso N ( no esta aprobada)
            $reqaut = iif($tb->fields["reqaut"]=='S','N','');
          }

      if ($imec=='I')
      {
      $feccom_ano=substr($feccom,6,4);
      $sql="insert into CPCompro (RefCom,TipCom,CedRif,RefPrc,TipPrc,FecCom,AnoCom,DesCom,DesAnu,MonCom,SalCau,SalPag,SalAju,StaCom,Aprcom)
          values ('".$refcom."','".$tipcom."','".$cedrif."','".$refprc."','',to_date('".$feccom."','dd/mm/yyyy'),'$feccom_ano','".$descom."','',".$totmont.",0,0,0,'A','$reqaut')";

        $bd->actualizar($sql);

      }else if ($imec=='M')
      {
      $feccom_ano=substr($feccom,6,4);
      $sql="update CPCompro Set TipCom='".$tipcom."',
                    CedRif='".$cedrif."',
                    RefPrc='".$refprc."',
                    TipPrc='',
                    FecCom=to_date('".$feccom."','dd/mm/yyyy'),
                    AnoCom='$feccom_ano',
                    DesCom='".$descom."',
                    DesAnu='',
                    MonCom=".$totmont.",
                    SalCau=0,
                    SalPag=0,
                    SalAju=0,
                    StaCom='A'
                    where
                    RefCom='".$refcom."'";

        $bd->actualizar($sql);

      }

    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
      exit();
    }
}
/////////////////

?>
