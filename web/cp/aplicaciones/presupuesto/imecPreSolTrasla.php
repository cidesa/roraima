<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp = $_SESSION["codemp"];
$bd     = new basedatosAdo($codemp);
$z      = new tools();


  /////////////////////////////////////
    $codigo  = $_POST["codigo"];
    $fecha   = $_POST["fecha"];
    $ano     = substr($fecha,6,4);
    //$periodo = $_POST["periodo"];
    $desc    = $_POST["desc"];

function crearLog($valor)
{
  global $bd;
  global $codigo;
  // Guardar en Segbitaco
  $sql = "Select id from cpsoltrasla where reftra='".$codigo."'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpsoltrasla', 'Presoltrasla', $valor);
  
}

  // validamos que la fecha este dentro del periodo seleccionado
  $periodo = ObtenerPeriodo($fecha);

  /*  $sql ="select pereje from cppereje where fecdes<=to_date('".$fecha."','dd/mm/yyyy') and fechas>=to_date('".$fecha."','dd/mm/yyyy')";
      if ($tb=$z->buscar_datos($sql))
      {
        $periodo=$tb->fields["pereje"];
      }*/

  $sql = "Select * from contaba1 where pereje='".trim($periodo)."' and fecdes<=to_date('".$fecha."','dd/mm/yyyy') and fechas>=to_date('".$fecha."','dd/mm/yyyy') ";

      if (!$tb=$z->buscar_datos($sql))
      {
      Mensaje('La Fecha de la Solicitud no Coincide con el Período Seleccionado');
      Regresar("PreSolTrasla.php");
      //exit;
      }
  //////////////////////////////

    if (empty($_POST["feccont"]))
    {
      $feccont = "";
    }
    else
    {
      $feccont = $_POST["feccont"];
    }

    $codart        = $_POST["codart"];
    $justificacion = $_POST["justificacion"];
    $tipo          = $_POST["tipo"];
    $tipgas        = $_POST["tipgas"];
    $desanu = "";
    $tottrasla = (float)(str_replace(',','',$_POST["totmon"]));
    $statrasla = "A";
    $stapre    = $_POST["stapre"];
    $despre    = $_POST["despre"];
    $fecpre    = $_POST["fecpre"];
    $imec      = $_GET["imec"];


    $i=1;
    while ($i<=20)
      {
        if (trim($_POST["x".$i."1"])!="")
        {

          if ((substr(trim($_POST["x".$i."1"]),0,2)!="--") and (substr(trim($_POST["x".$i."2"]),0,2)!="--"))
            {

            if ((float)str_replace(',','',$_POST["x".$i."3"])!=0)
            {
              //$grid1[$i]=$_POST["x".$i."1"];
              $grid1[$i]=$_POST["x".$i."1"];
              $grid2[$i]=$_POST["x".$i."2"];
              $grid3[$i]=(float)(str_replace(',','',$_POST["x".$i."3"]));
            }else
            {
              Mensaje("Existe Monto con valor 0, No se puede Guardar.");
              Regresar("PreSolTrasla.php");
              exit;
            }
            }
          $i = $i + 1;
        }
        else
        {
          $fin = $i-1;
          $i   =21;
        }
      }

    ////////////////
    ////////////////

    if ($imec=='I' or  $imec=='M')
    {
      try
      {
         $bd->startTransaccion();


      ////////////// CORRELATIVO ////////////////
         $reg='';
        if ($codigo=='########')
        {
          $z->getVerCorrelativo('corsoltra','cpdefniv',$reg);
           $encontrado = false;

          //Busca el correlativo si existe
                while (!$encontrado)
                {
                   $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                   $sql    = "select reftra from CPSolTrasla where reftra='$codigo'";
                   if ($tb=$z->buscar_datos($sql))
                   {
                     $reg = $reg + 1;
                   }
                   else
                   {
                     $encontrado=true;
                   }
                }

                $z->getSalvarCorrelativo('corsoltra','cpdefniv',$codigo);

        }else
        //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
        {
          if ($imec =='I'){
		          $sql   = "select reftra from CPSolTrasla where reftra='$codigo'";
		          if ($tb=$z->buscar_datos($sql))
		          {
		            $encontrado = false;
		          if (Confirmar("Esta refencia".$codigo." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
		          {
		          //Busca una referencia valida
		                while (!$encontrado)
		                {
		                   $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
		                   $sql    = "select reftra from CPSolTrasla where reftra='$codigo'";
		                   if ($tb=$z->buscar_datos($sql))
		                   {
		                     $reg = $reg + 1;
		                   }
		                   else
		                   {
		                     $encontrado=true;
		                   }
		                }

		          }else{
		            Regresar("PreSolTrasla.php");
		            exit;
		          }
		    	 }
          	}
        }
                ////////////////////////////


        $sql="delete from CPSolTrasla Where trim(RefTra)='".trim($codigo)."'";
        $bd->actualizar($sql);

		//if  ($imec=='I'){
	        //	GRABAR SOLICITUD DE TRASLADO
	        if (trim($feccont)=="")
	        {
	          $sql="insert into CPSolTrasla
	          (RefTra,Fectra,AnoTra,PerTra,DesTra,DesAnu,TotTra,StaTra,CodArt,Tipo,TipGas,Justificacion,FecCont)
	             values ('".$codigo."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$periodo."','".$desc."','".$desanu."',
	           ".$tottrasla.",'".$statrasla."','".$codart."','".$tipo."','".$tipgas."','".$justificacion."',NULL)";
	        }
	        else
	        {
	          $sql="insert into CPSolTrasla
	          (RefTra,Fectra,AnoTra,PerTra,DesTra,DesAnu,TotTra,StaTra,CodArt,Tipo,TipGas,Justificacion,FecCont)
	             values ('".$codigo."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$periodo."','".$desc."','".$desanu."',
	           ".$tottrasla.",'".$statrasla."','".$codart."','".$tipo."','".$tipgas."','".$justificacion."',to_date('".$feccont."','dd/mm/yyyy'))";
	        }

	       $bd->actualizar($sql);

		//}elseif  ($imec=='M'){
          if (trim($fecpre)!="")
          {
            $sql="update CPSolTrasla set despre='".$despre."',
               fecpre=to_date('".$fecpre."','dd/mm/yyyy'),
               stapre='".$stapre."'
            where trim(reftra) = '".trim($codigo)."'";
            $bd->actualizar($sql);
           }
       // }  //if  ($imec=='M')
        crearLog('G');

        // GRABAR DETALLE TRASLADOS CODIGOS PRESUPUESTARIOS -- GRID
        $sql="delete from CPSolMovTra Where trim(RefTra)='".trim($codigo)."'";
        $bd->actualizar($sql);

    $i=1;
    while ($i<=$fin)
    {
              $sql   = "insert into CPSolMovTra (RefTra,CodOri,CodDes,MonMov,StaMov)
              values ('".$codigo."','".$grid1[$i]."','".$grid2[$i]."',".$grid3[$i].",'A')";

              $bd->actualizar($sql);

         $i=$i+1;
        } //while

         // GRABAR PRECOMPROMISO
        $aux=substr($codigo,2 );
        $aux="TR".$aux;

        $sql="delete from CPImpPrc Where trim(RefPrc)='".trim($aux)."' ";
        $bd->actualizar($sql);

        $sql="delete from CPPrecom Where trim(RefPrc)='".trim($aux)."' ";
        $bd->actualizar($sql);

        $sql = "select * from cpdefniv";
        $tb=$bd->select($sql);
        if (!$tb->EOF)
        {
           $TipTraPrc=$tb->fields["TipTraPrc"];
        }
        else
        {
          $TipTraPrc="";
        }

        if  (trim($TipTraPrc)=="")
        {
          $TipPrc="SAE";
        }
        else
        {
          $TipPrc=$TipTraPrc;
        }

        //guardar  datos precompromiso en la tabla correspondiente
        $sql="insert into CPPrecom (RefPrc,TipPrc,FecPrC,AnoPrc,DesPrc,CedRif,DesAnu,
                      MonPrc,SalCom,SalCau,SalPag,SalAju,StaPrc)
            values ('".$aux."','".$TipPrc."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."','','',
                ".$tottrasla.",0,0,0,0,'A')";
        $bd->actualizar($sql);
        crearLog('G');
        //Grabar Imputaciones

        //se completa la transaccion para que actualice en las tablas correspondientes,
        //se utilizara  los datos guardados en la tabla	CPSOLMOVTRA para guardar las Imputaciones
        $bd->completeTransaccion();

         //cargar datos
         $pos=1;
         $sqlDet="select codori,SUM(monmov) as monmov From CPSolMovTra Where trim(RefTra)='".trim($codigo)."' GROUP BY CodOri";
         $tbDet=$bd->select($sqlDet);
         while (!$tbDet->EOF)
         {
            $CodOri = $tbDet->fields["codori"];
            $MonImp = $tbDet->fields["monmov"];

            //guardar  datos imputaciones
              $sql="insert into CPImpPrc (RefPrc,CodPre,MonImp,MonCom,MonCau,MonPag,MonAju,StaImp)
              values ('".$aux."','".$CodOri."',".$MonImp.",0,0,0,0,'A')";
              $bd->actualizar($sql);

            $tbDet->MoveNext();
         }
         ///////////////////////////////////////////

      }//try
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }
    else if ($imec=="E")
    {
      try
      {
        $bd->startTransaccion();

        $aux=substr($codigo,2 );
        $aux="TR".$aux;
        crearLog('E');
        $sql="delete from CPSolMovTra Where trim(RefTra)='".trim($codigo)."'";
        $bd->actualizar($sql);
        $sql="delete from CPSolTrasla Where trim(RefTra)='".trim($codigo)."'";
        $bd->actualizar($sql);
        $sql="delete from CPImpPrc Where trim(RefPrc)='".trim($aux)."' ";
        $bd->actualizar($sql);
        $sql="delete from CPPrecom Where trim(RefPrc)='".trim($aux)."' ";
        $bd->actualizar($sql);
        $sql="delete from CPMovFueFin Where trim(RefMov)='".trim($codigo)."'  and TipMov='TRASLADO'";
        $bd->actualizar($sql);

        $bd->completeTransaccion();
        crearLog('E');
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }

    }



?>
<script>
  location=("PreSolTrasla.php");
</script>
