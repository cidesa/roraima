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
    $imec   = $_POST["imec"];
    $codigo = $_POST["codigo"];
    $fecha  = $_POST["fecha"];
    $ano    = substr($fecha,6,4);
    $desc   = $_POST["desc"];
    $tipaju = $_POST["tipaju"];
    $refmov = $_POST["refmov"];
    $fecmov = $_POST["fecmov"];

    $desanu = $_POST["desmov"];
    $totaju = (float)(str_replace(',','',$_POST["totmon"]));
    $staaju = "A";


    if (!$z->validarFechaPresup($fecha))
    {
      Regresar("Preajuste.php");
      exit;
    }


  ////////////////
  ////////////////

    if ($imec=='I' or $imec=='M')
    {
      try
      {
        if (ValidarFechaAjuste($fecha, $fecmov))
        {
          Mensaje("La Fecha del Ajuste no puede ser menor a la Fecha del Movimiento");
          Regresar('PreAjuste.php');

        }else{

          $bd->startTransaccion();

        if ($imec=='I')
        {

          ////////////// CORRELATIVO ////////////////
             $reg='';
            if ($codigo=='########')
            {
              $z->getVerCorrelativo('coraju','cpdefniv',$reg);
               $encontrado = false;

              //Busca el correlativo si existe
                    while (!$encontrado)
                    {
                       $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                       $sql    = "select RefAju from CPAJuste where RefAju='$codigo'";
                       if ($tb=$z->buscar_datos($sql))
                       {
                         $reg = $reg + 1;
                       }
                       else
                       {
                         $encontrado=true;
                       }
                    }

                    $z->getSalvarCorrelativo('coraju','cpdefniv',$codigo);

            }else
            //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
            {
              $sql   = "select RefAju from CPAJuste where RefAju='$codigo'";
              if ($tb=$z->buscar_datos($sql))
              {
                $encontrado = false;
              if (Confirmar("Esta refencia".$codigo." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
              {
              //Busca una referencia valida
                    while (!$encontrado)
                    {
                       $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                       $sql    = "select RefAju from CPAJuste where RefAju='$codigo'";
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
                Regresar("PreAjuste.php");
                exit;
              }
              }
            }
                    ////////////////////////////


          $sql="delete from CPAJuste Where trim(RefAju)='".trim($codigo)."'";
          $bd->actualizar($sql);
          //	GRABAR TRASLADO

          $sql="insert into CPAJuste
            (RefAju,TipAju,FecAju,AnoAju,DesAju,Refere,DesAnu,TotAju,StaAju)
             values ('".$codigo."','".$tipaju."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."','".$refmov."','".$desanu."', ".abs($totaju).",'".$staaju."')";

          $bd->actualizar($sql);
          // GRABAR DETALLE TRASLADOS CODIGOS PRESUPUESTARIOS -- GRID
          $sql="delete from CPMovAju Where trim(RefAju)='".trim($codigo)."'";
          $bd->actualizar($sql);

          $i=1;
          while ($i<=50)
          {
            if ((trim($_POST["x".$i."1"])!="")  and (number_format($_POST["x".$i."2"],2,'.',',')!= number_format(0,2,'.',',')) )
            {
              $monto=(float)(str_replace(',','',$_POST["x".$i."2"]));
              if (trim($_POST["x".$i."4"])!="" )
              {
                $refprc=$_POST["x".$i."4"];
              }
              else
              {
                $refprc='NULO';
              }

              if (trim($_POST["x".$i."5"])!="" )
              {
                $refcom=$_POST["x".$i."5"];
              }
              else
              {
                $refcom='NULO';
              }

              if (trim($_POST["x".$i."6"])!="")
              {
                $refcau=$_POST["x".$i."6"];
              }
              else
              {
                $refcau='NULO';
              }
              /*$sql="insert into CPMovAju (RefAju,CodPre,MonAju,StaMov,RefPrc,RefCom,RefCau,RefPag)
                values ('".$codigo."','".$_POST["x".$i."1"]."',($monto*(-1)),'A','".$refprc."','".$refcom."','".$refcau."','NULO')";
              */

              $sql="insert into CPMovAju (RefAju,CodPre,MonAju,StaMov,RefPrc,RefCom,RefCau,RefPag)
                values ('".$codigo."','".$_POST["x".$i."1"]."',($monto),'A','".$refprc."','".$refcom."','".$refcau."','NULO')";


              $bd->actualizar($sql);

            } 	//if ((trim($_POST["x".$i."1"])!="")  and (number_format($_POST["x".$i."2"],2,'.',',')!= number_format(0,2,'.',',')) )
           // else
           // {
           //   $i=51;
           // }
           $i=$i+1;
          } //while
        } //if ($imec=='I')
        else if ($imec=='M')
        {
          //	ACTUALIZAR DATOS TRASLADO
          $sql="update CPAJuste set  DesAju='".$desc."'
                where trim(RefAju) = '".trim($codigo)."'";
          $bd->actualizar($sql);
        }

        // Guardar en Segbitaco
        $sql = "Select id from cpajuste where trim(RefAju) = '".trim($codigo)."'";
  
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpajuste', 'Preajuste', $imec=='M' ? 'A' : 'G' );

        $bd->completeTransaccion();
        }
      }//try
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }


  function ValidarFechaAjuste($fecha='', $fecmov='')
  {
     $tool= new tools();

      if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
       {
          $splitfecha = split('/', $fecha); //Fecha Ajuste
          $splitfecotr = split('/', $fecmov); //Fecha Movimiento
          $fecha_for = $splitfecha[2] . "-" . $splitfecha[1] . "-" . $splitfecha[0];
          $fecotr_for = $splitfecotr[2] . "-" . $splitfecotr[1] . "-" . $splitfecotr[0];
          if  ((!empty($fecmov))  and (strtotime($fecha_for) < strtotime($fecotr_for)))
          {
            Mensaje("La Fecha del Ajuste no puede ser menor a la Fecha del Movimiento");
        ?>
          <script>
            opener.document.getElementById('fecha').value="";
            opener.document.getElementById('fecha').focus();
          </script>
        <?
         }//  if  ((!empty($fecmov))  and (strtotime($fecha_for) < strtotime($fecotr_for)))
      }
  }

?>
<script>
  location=("PreAjuste.php");
</script>
