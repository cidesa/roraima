<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$tools= new tools();

  /////////////////////////////////////
    $refpag=trim($_POST["refpag"]);
    $fecpag=trim($_POST["fecpag"]);
    //$fecpag=trim($_POST["fecpag"]);
    $despag=trim($_POST["despag"]);
    $tippag=trim($_POST["tippag"]);
    $refer=trim($_POST["refierea"]);
    $cedrif=trim($_POST["cedrif"]);
      $refcau=substr(trim($_POST["refcau"]),0,8);
    $monpag=str_replace(',','',trim($_POST["monpag"])); // Se le quita la ,
    $imec=$_GET["imec"];

function crearLog($valor)
{
  global $bd;
  global $refpag;
  // Guardar en Segbitaco
  $sql = "Select id from cppagos where refpag='".$refpag."'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cppagos', 'Prepagar', $valor);
  
}

  try
  {


    if (!$tools->validarFechaPresup($fecpag))
    {
      Regresar("PrePagar.php");
      exit;
    }

        $i=$_POST["i"];

      $cont=1;
      $contador=0;
      while ($cont<=$i)
      {
        if (trim($_POST["x".$cont."1"])!="")
        {
          if (substr(trim($_POST["x".$cont."1"]),0,2)!="--")
          {
            if ((float)str_replace(',','',$_POST["x".$cont."2"])!=0)
            {
              $contador=$contador+1;
              $col1[$contador]=$_POST["x".$cont."1"];
              $col2[$contador]=str_replace(',','',trim($_POST["x".$cont."2"])); // Se le quita la ,
              $col3[$contador]=$_POST["x".$cont."3"];
              $col6[$contador]=$_POST["x".$cont."6"];
              $col7[$contador]=$_POST["x".$cont."7"];
            }else
            {
              Mensaje("Existe Monto con valor 0, No se puede Guardar.");
              Regresar("PreCompro.php");
              exit;
            }
          }

        }else
        {
          $cont=100000000; ///Salirse del while
        }

        $cont=$cont+1;
      }

      ///////////////
      //$bd->startTransaccion();
        Grabar_Pagado();
        Grabar_GridImpPag();
      //$bd->completeTransaccion();
      ///////////////

        Mensaje("El Pagado fue grabado exitosamente.");
        LanzarReporte('presupuesto','cprpagado.php&refpagdes='.$refpag.'&refpaghas='.$refpag.'');
        Regresar("PrePagar.php");
    }

    catch(Exception $e)
    {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
    }

  function Grabar_Pagado()
  {
    global $tools;
    global $bd;
    global $refpag;
    global $tippag;
    global $refcau;
    global $tipcau;
    global $fecpag;
    global $despag;
    global $desanu;
    global $cedrif;
    global $monpag;
    global $salaju;
    global $stapag;
    global $imec;

  try
  {
    $anopag=substr($fecpag,6,4);  //200X
    if ($imec=='I')
    {


      ////////////// CORRELATIVO ////////////////
        $reg='';
        if ($refpag=='########')
        {
          $tools->getVerCorrelativo('corpag','cpdefniv',$reg);
          $encontrado = false;

          //Busca el correlativo si existe
                while (!$encontrado)
                {
                  $refpag = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refpag from cppagos where refpag='$refpag'";
                  if ($tb=$tools->buscar_datos($sql))
                  {
                    $reg = $reg + 1;
                  }
                  else
                  {
                    $encontrado=true;
                  }
                }

                $tools->getSalvarCorrelativo('corpag','cpdefniv',$refpag);

        }else
        //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
        {
          $sql   = "select refpag from cppagos where refpag='$refpag'";
          if ($tb=$tools->buscar_datos($sql))
          {
            $encontrado = false;
          if (Confirmar("Esta refencia".$refpag." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
          {
          //Busca una referencia valida
                while (!$encontrado)
                {
                  $refpag = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refpag from cppagos where refpag='$refpag'";
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
            Regresar("PrePagar.php");
            exit;
          }
          }
        }
                ////////////////////////////


    //refcau= 0001/2000/5000
    //en que tabla se va a guardar, ya que si se almacenan en cppagos seria:
    //x cada refcau un registro? de lo contrario si lo guardo todo junto 0001/2000/5000, me va a modificar al momento
    // de hacer un reporte tendre que primero descomponer ese campo x las cantidades de referebcia que trae 0001/2000/5000.
    // o la otra solucion es que lo guarde a la tabla de detalles CPImpPag...

    //Solucion; guardar los detalles en cpimppag y actualizar refacu en cppagos
      $sql="insert into cppagos (refpag,tippag,refcau,tipcau,fecpag,anopag,despag,desanu,cedrif,monpag,salaju,stapag) values ('$refpag','$tippag','$refcau','',to_date('".$fecpag."','dd/mm/yyyy'),'$anopag','$despag','','$cedrif',$monpag,0,'A')";
      $bd->actualizar($sql);
      crearLog('G');

    }else{

        $sql="update cppagos Set tippag='".$tippag."',
                    refcau='".$refcau."',
                    tipcau='',
                    fecpag=to_date('".$fecpag."','dd/mm/yyyy'),
                    anopag='$anopag',
                    despag='".$despag."',
                    desanu='',
                    cedrif='".$cedrif."',
                    monpag=".$monpag.",
                    SalAju=0,
                    StaCom='A'
                    where
                    refpag='".$refpag."'";

        $bd->actualizar($sql);
        crearLog('A');
    }
    }
    catch(Exception $e)
    {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
        exit();
    }
  }


  function Grabar_GridImpPag()
  {
    global $tools;
    global $bd;
    global $tb;
    global $refpag;
    global $tippag;
    global $refcau;
    global $tipcau;
    global $fecpag;
    global $despag;
    global $desanu;
    global $cedrif;
    global $monpag;
    global $salaju;
    global $stapag;
    global $col1;
    global $col2;
    global $col3;
    global $col6;
    global $col7;
    global $i;
    global $imec;
    global $refer;
    global $contador;

    //$tools= new tools();
    //$bd=new basedatosAdo($codemp);

      $sql="delete from CPImpPag where trim(refpag)=trim('$refpag')";
      $bd->actualizar($sql);

        $cont=1;
        while ($cont<=$contador)
        {
          /*if (!empty($col6[$cont])){
            $refere=$col6[$cont];
            $sql="select * from CPIMPCAU where refcau='$col6[$cont]'";
            if ($tb=$tools->buscar_datos($sql))
            {
              if (!empty($tb->fields["refere"])){
                $refcom=$tb->fields["refere"];
              }else{
                $refcom="NULO";
              }

              if (!empty($tb->fields["refprc"])){
                $refprc=$tb->fields["refprc"];
              }else{
                $refprc="NULO";
              }

            }else{
              $refcom="NULO";
              $refprc="NULO";
            }
          }else{
            $refere="NULO";
            $refcom="NULO";
            $refprc="NULO";
          }*/

        if ($refer=='A') //Causado
        {
          // $s="select refere,refprc from cpimpcau where refcau='".$col6[$cont]."' and codpre='".$col1[$cont]."'";
          $s = "select refere,refprc from cpimpcau where refcau='".$col7[$cont]."'";

          if ($tb=$tools->buscar_datos($s))
          {
              $refere=$col7[$cont];
            if ((!empty($tb->fields["refere"])) || trim($tb->fields["refere"])!='')
            {
              $refcom=$tb->fields["refere"];
            }else{
              $refcom='NULO';
            }

            if ((!empty($tb->fields["refprc"])) || trim($tb->fields["refprc"])!='')
            {
              $refprc=$tb->fields["refprc"];
            }else{
              $refprc='NULO';
            }
          }

        }else if ($refer=='C')   //Comprometer
        {
          $s="select refere from cpimpcom where refcom='".$col7[$cont]."' ";
          if ($tb=$tools->buscar_datos($s))
          {
            $refere = 'NULO';
            $refcom = $refcau;
            if ((!empty($tb->fields["refere"])) || trim($tb->fields["refere"])!='')
            {
              $refprc = $tb->fields["refere"];
            }else{
              $refprc = 'NULO';
            }
          }

        }else if ($refer=='P')  //Precomprometer
        {
          $refere = 'NULO';
          $refcom = 'NULO';
          $refprc = $col7[$cont];
          //$refcau;
        }

        $sql="insert into CPImpPag
          (refpag,codpre,monimp,monaju,staimp,refere,refcom,refprc)
          values
          ('".$refpag."','".$col1[$cont]."',".$col2[$cont].",".$col3[$cont].",'A','".$refere."','".$refcom."','".$refprc."')";

        $bd->actualizar($sql);
        $cont++;



      /*  if ($refer=='A')
        {
          $s="select refere,refprc from cpimpcau where refcau='".$refcau."' and codpre='".$col1[$cont]."'";
          if ($tb=$tools->buscar_datos($s))
          {
              $refere=$refcau;
            if ((!empty($tb->fields["refere"])) || trim($tb->fields["refere"])!='')
            {
              $refcom=$tb->fields["refere"];
            }else{
              $refcom='NULO';
            }

            if ((!empty($tb->fields["refprc"])) || trim($tb->fields["refprc"])!='')
            {
              $refprc=$tb->fields["refprc"];
            }else{
              $refprc='NULO';
            }
          }
        }
        if ($refer=='C')
        {
          $s="select refere from cpimpcom where refcom='".$refcau."' ";
          if ($tb=$tools->buscar_datos($s))
          {
            $refere = 'NULO';
            $refcom = $refcau;
            if ((!empty($tb->fields["refere"])) || trim($tb->fields["refere"])!='')
            {
              $refprc=$tb->fields["refere"];
            }else{
              $refprc='NULO';
            }
          }
        }

        if ($refer=='P')
        {
          $refere = 'NULO';
          $refcom = 'NULO';
          $refprc = $refcau;
        }

        $sql="insert into CPImpPag
          (refpag,codpre,monimp,monaju,staimp,refere,refcom,refprc)
          values
          ('".$refpag."','".$col1[$cont]."',".$col2[$cont].",".$col3[$cont].",'A','".$refere."','".$refcom."','".$refprc."')";

        //echo $sql."<br>";
          $bd->actualizar($sql);
        $cont=$cont+1;*/

        }

  }
?>