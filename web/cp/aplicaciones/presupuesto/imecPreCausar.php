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

    $codigo     = $_POST["codigo"];
    $fecha      = $_POST["fecha"];
    $ano        = substr($fecha,6,4);
    $desc       = $_POST["desc"];
    $tipcau     = $_POST["tipcau"];
    $moncau     = (float)str_replace(',','',$_POST["moncau"]);
    $refere     = $_POST["refere"];
    $referencia = substr(trim($_POST["referencia"]),0,8);
    $codben     = $_POST["codben"];
    $imec=$_GET["imec"];

    if (!$z->validarFechaPresup($fecha))
    {
      Regresar("PreCausar.php");
      exit;
    }

    $i=1;
    while ($i<=50)
      {
        if (trim($_POST["x".$i."1"])!="")
        {
          if (substr(trim($_POST["x".$i."1"]),0,2)!="--")
            {
            if ((float)str_replace(',','',$_POST["x".$i."2"])!=0)
            {
              $grid1[$i]=$_POST["x".$i."1"];
              $grid2[$i]=(float)(str_replace(',','',$_POST["x".$i."2"]));
              $grid3[$i]=(float)(str_replace(',','',$_POST["x".$i."3"]));
              $grid4[$i]=(float)(str_replace(',','',$_POST["x".$i."4"]));

            /*  if (trim($tb2->fields["refprc"]) != 'NULO') {
                $grid5[$i] = $tb2->fields["refprc"];

              } else if (trim($tb2->fields["refere"]) != 'NULO') {
                $grid5[$i] = $tb2->fields["refere"];

              }else{
                $grid5[$i] = '';
              }*/

              $grid5[$i]=$_POST["x".$i."5"];
              $grid9[$i]=trim($_POST["x".$i."9"]);
            }else
            {
              Mensaje("Existe Monto con valor 0, No se puede Guardar.");
              Regresar("PreCausar.php");
              exit;
            }
            }
          $i=$i+1;
        }
        else
        {
          $fin=$i-1;
          $i=51;
        }
      }


    ////////////////
    ////////////////
    //$bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {

        if ($codigo=='########')
        {
          $z->getVerCorrelativo('corcau','cpdefniv',$reg);
          $encontrado = false;

          //Busca el correlativo si existe
                while (!$encontrado)
                {
                  $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refcau from cpcausad where refcau='$codigo'";
                  if ($tb=$z->buscar_datos($sql))
                  {
                    $reg = $reg + 1;
                  }
                  else
                  {
                    $encontrado=true;
                  }
                }

                $z->getSalvarCorrelativo('corcau','cpdefniv',$codigo);
        }else
        //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
        {
          $sql   = "select refcau from cpcausad where refcau='$codigo'";
          if ($tb=$z->buscar_datos($sql))
          {
            $encontrado = false;
          if (Confirmar("Esta refencia".$codigo." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
          {
          //Busca una referencia valida
                while (!$encontrado)
                {
                  $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refcau from cpcausad where refcau='$codigo'";
                  if ($tb=$z->buscar_datos($sql))
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
            Regresar("PreCausar.php");
            exit;
          }
          }
        }

        //  GRABAR CAUSADO
        $sql="insert into cpcausad
          (refcau,tipcau,refcom,tipcom,feccau,anocau,descau,desanu,moncau,salpag,salaju,stacau,cedrif)
            values ('".$codigo."','".$tipcau."','".$referencia."','',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."',
          '',".$moncau.",0,0,'A','".$codben."')";


        $bd->actualizar($sql);

        // GRABAR GRID
        $sql="delete from cpimpcau where refcau = '".$codigo."' ";
          $bd->actualizar($sql);


        $i=1;
        while ($i<=$fin)
        {
          if ($refere=='C') //Compromiso
          {
              $sql2="select * from cpimpcom where trim(refcom) = '".$grid9[$i]."'";

            if ($tb2=$z->buscar_datos($sql2))
            {
                if ($tb2->fields["refere"]!="")  //Si el compromiso Refiere a un precompromiso
                {
                      $sql="insert into cpimpcau (refcau,codpre,monimp,monpag,monaju,staimp,refere,refprc)
                      values ('".$codigo."','".$grid1[$i]."',".$grid2[$i].",".$grid3[$i].",".$grid4[$i].",'A','".$grid9[$i]."','".$grid5[$i]."')";
                }
                else  //Si el compromiso no Refiere a un precompromiso
                {
                  $sql="insert into cpimpcau (refcau,codpre,monimp,monpag,monaju,staimp,refere,refprc)
                    values ('".$codigo."','".$grid1[$i]."',".$grid2[$i].",".$grid3[$i].",".$grid4[$i].",'A','".$grid9[$i]."','NULO')";

                }
                $bd->actualizar($sql);
            }
          }
          elseif ($refere=='P')  //Precompromiso
          {
            $sql="insert into cpimpcau (refcau,codpre,monimp,monpag,monaju,staimp,refere,refprc)
              values ('".$codigo."','".$grid1[$i]."',".$grid2[$i].",".$grid3[$i].",".$grid4[$i].",'A','NULO','".$grid9[$i]."')";
              $bd->actualizar($sql);
          }
          else  //$refere = 'N'
          {
            $sql="insert into cpimpcau (refcau,codpre,monimp,monpag,monaju,staimp,refere,refprc)
              values ('".$codigo."','".$grid1[$i]."',".$grid2[$i].",".$grid3[$i].",".$grid4[$i].",'A','NULO','NULO')";
              $bd->actualizar($sql);
          }

          $i=$i+1;
        }

        ?>
        <script language="JavaScript" type="text/javascript">
            alert('Causado Registrado Exitosamente');
        </script>
        <?

        LanzarReporte('presupuesto','cprcausado.php&refcaudes='.$codigo.'&refcauhas='.$codigo.'');

      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
      }
    }
    else if ($imec=="M")
    {
      try
      {
          $sql="update cpcausad set descau='".$desc."',
                      tipcau='".$tipcau."',
                      cedrif='".$codben."'
                    where refcau='".$codigo."' ";

          $bd->actualizar($sql);
          ?>
        <script language="JavaScript" type="text/javascript">
            alert('Causado Actualizado Exitosamente');
        </script>
        <?

        LanzarReporte('presupuesto','cprcausado.php&refcaudes='.$codigo.'&refcauhas='.$codigo.'');

      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
      }
    }

    // Guardar en Segbitaco
    $sql = "Select id from cpcausad where refcau='".$codigo."' ";

    $tb=$bd->select($sql);
    $id = $tb->fields["id"];
    $bd->Log($id, 'pre', 'Cpcausad', 'Precausar', $imec=='M' ? 'A' : 'G' );


    //$bd->completeTransaccion();
?>
<script>
  location=("PreCausar.php");
</script>
