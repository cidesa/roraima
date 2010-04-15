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
    $codigo    = $_POST["codigo"];
    $fecha     = $_POST["fecha"];
    $ano       = substr($fecha,6,4);
    $periodo   = $_POST["periodo"];
    $desc      = $_POST["desc"];
    $desanu    = "";
    $tottrasla = (float)(str_replace(',','',$_POST["totmon"]));
    $statrasla = "A";

    $imec=$_GET["imec"];

function crearLog($valor)
{
  global $bd;
  global $codigo;
  // Guardar en Segbitaco
  $sql = "Select id from CPTrasla where trim(reftra) = '".trim($codigo)."'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cptrasla', 'Pretrasla', $valor);
  
}
  ////////////////
  ////////////////
  // validamos que la fecha este dentro del periodo seleccionado
      $sql="Select * from cppereje where pereje='".trim($periodo)."' and fecdes<=to_date('".$fecha."','dd/mm/yyyy') and fechas>=to_date('".$fecha."','dd/mm/yyyy') ";
      if (!$tb=$z->buscar_datos($sql))
      {
      	Mensaje('La Fecha de la Solicitud no Coincide con el Período Seleccionado');
	    Regresar("PreTrasla.php");
      	exit;
      }else{
	    if (!$z->validarFechaPresup($fecha))
	    {
	      Regresar("PreTrasla.php");
	      exit;
	    }
      }


  //////////////////////////////

    if ($imec=='I' or  $imec=='M')
    {
      try
      {
         //$bd->startTransaccion();

        if ($imec=='I')
        {
          Grabar_Fuentes();
          $sql="delete from CPTrasla Where trim(RefTra)='".trim($codigo)."'";
          $bd->actualizar($sql);
          //	GRABAR TRASLADO

          $sql="insert into CPTrasla
            (RefTra,Fectra,AnoTra,PerTra,DesTra,DesAnu,TotTra,StaTra)
             values ('".$codigo."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$periodo."','".$desc."','".$desanu."', ".$tottrasla.",'".$statrasla."')";

          $bd->actualizar($sql);
          crearLog('G');
        }
        else if ($imec=='M')
        {
          //	ACTUALIZAR DATOS TRASLADO
          $sql="update CPTrasla set Fectra=to_date('".$fecha."','dd/mm/yyyy'),
                   Anotra='".$ano."',
                   PerTra='".$periodo."',
                   DesTra='".$desc."',
                   TotTra= ".$tottrasla."
                where trim(reftra) = '".trim($codigo)."'";
          $bd->actualizar($sql);
          crearLog('A');
        }

        // GRABAR DETALLE TRASLADOS CODIGOS PRESUPUESTARIOS -- GRID
        $sql="delete from CPMovTra Where trim(RefTra)='".trim($codigo)."'";
        $bd->actualizar($sql);

        $i=1;
        while ($i<=20)
        {
          if ((trim($_POST["x".$i."1"])!="")  and (trim($_POST["x".$i."2"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
          {
              $monto=(float)(str_replace(',','',$_POST["x".$i."3"]));
            $sql="insert into CPMovTra (RefTra,CodOri,CodDes,MonMov,StaMov)
              values ('".$codigo."','".$_POST["x".$i."1"]."','".$_POST["x".$i."2"]."',".$monto.",'A')";
            $bd->actualizar($sql);

            $i=$i+1;
          }
          else
          {
            $i=21;
          }
          } //while

        //Anula el Precompromiso
        if ($imec=='I')
        {
          $aux=substr($codigo,2);
          $codigo_aux='TR'.trim($aux);
          $sql="update cpprecom set staprc='N', desanu='APROBACION DE LA SOLICITUD DEL TRASLADO'
                where trim(refprc) = '".$codigo_aux."'";

          $bd->actualizar($sql);

          $sql="update cpimpprc set staimp='N'
                where trim(refprc) = '".$codigo_aux."'";

          $bd->actualizar($sql);
          crearLog('N');
        }

        //$bd->completeTransaccion();

      }//try
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
      }
    }
    else if ($imec=="E")
    {
      try
      {
        //////////Verificar disponibilidad//////////////////////////////////////////////////////////////////////////
        $VerDispon = "S";
        $i         = 1;
        while ($i<=20)
        {
          if ((trim($_POST["x".$i."1"])!="")  and (trim($_POST["x".$i."2"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
          {
              $sql="select mondis from cpasiini where trim(codpre)='".trim($_POST["x".$i."2"])."'  and perpre='00'";
              if ($tb=$z->buscar_datos($sql))
              {
                $MonDis=$tb->fields["mondis"];
                $MonTra=(float)(str_replace(',','',$_POST["x".$i."3"]));
                if ($MonDis < $MonTra)
                {
                  $VerDispon="N";
                  Mensaje("NO se puede Eliminar o Anular el Traslado. El Monto Disponible de la Partida " . trim($_POST["x".$i."2"]) . " es de " . number_format($MonDis,2,'.',',') .". Al Disminuirla por el Monto del Traslado quedar�a Negativa.");
                  $i=21;
                }//if ($MonDis < $_POST["x".$i."3"])
              }	// if ($tb=$z->buscar_datos($sql))
              else
              {
                $VerDispon="N";
                Mensaje("La Partida " . trim($_POST["x".$i."2"]) . " no se encuentra en la Base de Datos. Por Favor Verifique");
                $i=21;
              }//else  if ($tb=$z->buscar_datos($sql))

              $i=$i+1;
          } //if ((trim($_POST["x".$i."1"])!="")  and (trim($_POST["x".$i."2"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
          else
          {
            $i=21;
          }
        } //while

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Eliminar Datos

        if ($z->validarFechaPresup($fecha))
        {
          if ($VerDispon=="S")
          {
            //$bd->startTransaccion();
            crearLog('E');
            $sql="delete from CPMovTra Where trim(RefTra)='".trim($codigo)."'";
            $bd->actualizar($sql);
            $sql="delete from CPTrasla Where trim(RefTra)='".trim($codigo)."'";
            $bd->actualizar($sql);
            //Grabar Precompromiso
            $aux=substr($codigo,2 );
            $aux="TR".$aux;
            $sql="update CPPrecom
                     set StaPrc='A',
                   DesAnu='',
                   FecAnu=Null
                where trim(RefPrc)='".trim($aux)."' ";
            $bd->actualizar($sql);
            $sql="update CPImpPrc set StaImp='A'
                    where trim(RefPrc)='".trim($aux)."' ";
            $bd->actualizar($sql);
            ////////////////////////
            //$bd->completeTransaccion();

          }//if ($VerDispon=="S")
        }//if ($tool->validarFechaPresup($fecha))



      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
      }

    }


  function Grabar_Fuentes()
  {
    global $z;
    global $bd;
    global $codigo;
    global $fecha;
    try
    {
       $sql="delete from cpdisfuefin Where trim(RefDis)='".trim($codigo)."' and origen='TRASLADO'";
       $bd->actualizar($sql);

        $i=1;
        while ($i<=20)
        {
          if ((trim($_POST["x".$i."1"])!="")  and (trim($_POST["x".$i."2"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
          {
              $monto=(float)(str_replace(',','',$_POST["x".$i."3"]));
              $sql="insert into CPMovTra (RefTra,CodOri,CodDes,MonMov,StaMov)
              values ('".$codigo."','".trim($_POST["x".$i."1"])."','".trim($_POST["x".$i."2"])."',".$monto.",'A')";
              $bd->actualizar($sql);

            $sql="SELECT COUNT(CODDES) AS coddes FROM CPSOLMOVTRA WHERE CODORI='".trim($_POST["x".$i."1"])."' AND REFTRA='".$codigo."'";
            if ($tb = $z->buscar_datos($sql))
            {
              $tb->fields["codcta"];
              $Cant_Partidas = $tb->fields["coddes"];
            }


            $sql = "Select  COUNT(DISTINCT B.FUEFIN) as fuefin from CPMOVFUEFIN A, CPDISFUEFIN B Where A.CORREL=B.CORREL AND A.RefMov='".$codigo."'";
            $Ftes_Diferentes = false;
            if ($tb = $z->buscar_datos($sql))
            {
              if ($tb->fields["fuefin"] > 1)
              {
                $Ftes_Diferentes = true;
              }
            }

            if ($Ftes_Diferentes){
                $sql = "Select A.CORREL,A.REFMOV,A.TIPMOV,A.CODPRE,B.CORREL,B.ORIGEN,B.fuefin,A.monmov From CPMOVFUEFIN A, CPDISFUEFIN B
                       Where A.CORREL=B.CORREL AND A.CODPRE='".trim($_POST["x".$i."1"])."' and A.RefMov='".$codigo."'";
            }else{
               $sql = "Select A.CORREL,A.REFMOV,A.TIPMOV,A.CODPRE,B.CORREL,B.ORIGEN,B.fuefin, c.monmov From CPMOVFUEFIN A, CPDISFUEFIN B,cpsolmovtra c
                       Where c.reftra=a.refmov and c.codori='".trim($_POST["x".$i."1"])."'  and c.coddes='".trim($_POST["x".$i."2"])."' and A.CORREL=B.CORREL AND
                       A.CODPRE='".trim($_POST["x".$i."1"])."' and A.RefMov='".$codigo."'";
            }
//echo $sql;
//exit();
            if ($cpmovfuefin = $z->buscar_datos($sql))
            {
              $conta=0;
              while ($conta <= count($tb))
              {
                $fuente = $cpmovfuefin->fields["fuefin"];
                $sql = "Select * From CPDISFUEFIN Where Origen='TRASLADO' And
                        FueFin='".$fuente."' And
                        CodPre='".trim($_POST["x".$i."2"])."' And
                        FecDis=TO_DATE('".$fecha."','dd/mm/yyyy') And
                        RefDis='".$codigo."' And
                        Status='A'";

                if ($cpdisfuefin = $z->buscar_datos($sql))
                {
                  $monasi2=$cpdisfuefin->fields["monasi"]+$cpmovfuefin->fields["monmov"];
                  $sql="update CPDISFUEFIN  set monasi=$monasi2  where origen='TRASLADO' And
                        FueFin='".$fuente."' And
                        CodPre='".trim($_POST["x".$i."2"])."' And
                        FecDis=TO_DATE('".$fecha."','dd/mm/yyyy') And
                        RefDis='".$codigo."' And
                        Status='A'";

                  $bd->actualizar($sql);
                }else
                {
                  if (count($cpmovfuefin) > 0)
                  {
                    if ($i <= count($cpmovfuefin)){
                      $monasi = $cpmovfuefin->fields["monmov"] / $Cant_Partidas;
                    }else{
                      $sql = "select * coalesce(sum(monasi),0) as monasi from cpdisfuefin where codpre='".trim($_POST["x".$i."2"])."' and refdis='".$codigo."' ";
                        if ($tb = $z->buscar_datos($sql))
                        {
                            $monasi = $tb->fields["monasi"] - $cpmovfuefin->fields["monmov"];
                        }
                    }
                  }else{
                    $monto=(float)(str_replace(',','',$_POST["x".$i."3"]));
                    $monasi = $monto;
                  }
                  $reg='';
                  $z->getVerCorrelativo('correl','cpdisfuefin',$reg);
                  $codigo2 = str_pad($reg,8,0,STR_PAD_LEFT);

                   $sql="insert into cpdisfuefin (correl, origen, fuefin, codpre, fecdis, monasi, refdis, status) values
                      ('".$codigo2."','TRASLADO','".$fuente."','".trim($_POST["x".$i."2"])."',to_date('".$fecha."','dd/mm/yyyy'),$monasi,'".$codigo."','A')";
          //echo  $sql."<br>";
//exit();
                  $bd->actualizar($sql);
                }
                $cpmovfuefin->MoveNext();
                $conta++;
              }
            }
            $i=$i+1;
          }
          else
          {
            $i=21;
          }
          } //while

          //exit();
    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
    exit();
    }
  }
?>
<script>
  location=("PreTrasla.php");
</script>
