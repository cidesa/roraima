<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z= new tools();


  function grabar_cuenta($cuenta,$nombre,$tipo)
  {
    global $bd;
    global $z;
     //GRABANDO CUENTA
     $sql = "Select * from CONTABA1 Where PerEje='01'";
     if ($tb=$z->buscar_datos($sql))
     {
         $fechainicio=$tb->fields["fecini"];
      $fechacierre=$tb->fields["feccie"];
     }

    $sql="select * from contabb
      where trim(codcta)=trim('".$cuenta."') and
      fecini=(select fecini from contaba1 where pereje='01') and
      feccie=(select feccie from contaba1 where pereje='01')";
    if ($tb=$z->buscar_datos($sql))
    {
    }
    else
    {
      $sql2="insert into contabb (codcta,descta,fecini,feccie,salant,debcre,cargab,salprgper,salacuper)
      values ('".$cuenta."','".$nombre."','".$fechainicio."','".$fechacierre."',0,'".$tipo."','N',0,0)";
      $bd->actualizar($sql2);
      
      $sql = "Select id from contabb where codcta = '".$cuenta."' And descta = '".$nombre."'";
      
      $tb=$bd->select($sql);
      $id = $tb->fields["id"];
      // Guardar en Segbitaco
      $bd->Log($id, 'con', 'Contabb', 'Confintipcue', 'G');

      
    }

    //GRABANDO PERIODOS
    $sql="select * from contabb1
    where trim(codcta)=trim('".$cuenta."') and
    fecini=(select fecini from contaba1 where pereje='01') and
    feccie=(select feccie from contaba1 where pereje='01')";
    if ($tb=$z->buscar_datos($sql))
    {
    }
    else
    {

      for ($i=1;$i<=12;$i++)
      {
        $per=(string)$i;
        $per= str_pad($per,2,'0',STR_PAD_LEFT);

          try
          {
            $sql2="insert into contabb1 (codcta,fecini,feccie,pereje,totdeb,totcre,salact)
            values ('".$cuenta."','".$fechainicio."','".$fechacierre."','".$per."',0,0,0)";
            $bd->actualizar($sql2);
          }
          catch(Exception $e)
          {
            print "Excepcion Obtenida: ".$e->getMessage()."\n";
          }

      }
    }

  }
  /////////////////////////////////////

    $activos=$_POST["activos"];
    $pasivos=$_POST["pasivos"];
    $ingresos=$_POST["ingresos"];
    $egresos=$_POST["egresos"];
    $resultado=$_POST["resultado"];
    $capital=$_POST["capital"];
    $orden=$_POST["orden"];
    $resant=$_POST["resant"];
    $resact=$_POST["resact"];

    $imec=$_GET["imec"];

    if ($imec=='I')
    {
//      print "entro";
              try
              {
                // GRABAR TIPOS CUENTAS
                $sql="SELECT * FROM CONTABA WHERE CODEMP='001'";
                if ($tb=$z->buscar_datos($sql))
                {
                  $bd->startTransaccion();
                  $sql2="UPDATE CONTABA SET
                  codtesact='".$activos."',
                  codtespas='".$pasivos."',
                  codind='".$ingresos."',
                  codegd='".$egresos."',
                  codctd='".$resultado."',
                  codcta='".$capital."',
                  codord='".$orden."'
                  WHERE CODEMP='001'";
                  $bd->actualizar($sql2);

                  $sql = "Select id from contaba where codemp='001'";
                  
                  $tb=$bd->select($sql);
                  $id = $tb->fields["id"];
                  $bd->Log($id, 'con', 'Contabb', 'Confintipcue', 'A');
                  
                  
                  $bd->completeTransaccion();

                  //grabar_cuenta($activos,"ACTIVOS","D");
                  //grabar_cuenta($pasivos,"PASIVOS","C");
                  //grabar_cuenta($ingresos,"INGRESOS","C");
                  //grabar_cuenta($egresos,"EGRESOS","D");
                  //grabar_cuenta($resultado,"RESULTADO","D");
                  //grabar_cuenta($capital,"CAPITAL","D");
                  //grabar_cuenta($orden,"ORDEN","D");
                }
                else
                {
                  ?>
                  <script language="javascript1.1" type="text/javascript">
                    alert("No hay Ejercicio Contable Definido");
                    location=("ConFinTipCueCon.php")
                  </script>
                  <?

                }

                //GRABAR CUENTAS CONTABLES
                $sql = "SELECT * FROM CONTABA WHERE CODEMP = '001'";
                if ($tb=$z->buscar_datos($sql))
                {
                  $bd->startTransaccion();
                  $sql2="UPDATE CONTABA SET
                  codresant='".$resant."',
                  codres='".$resact."'
                  WHERE CODEMP='001'";
                  $bd->actualizar($sql2);

                  $sql = "Select id from contaba where codemp='001'";
                  
                  $tb=$bd->select($sql);
                  $id = $tb->fields["id"];
                  $bd->Log($id, 'con', 'Contabb', 'Confintipcue', 'A');
                  
                  $bd->completeTransaccion();
                }
                else
                {
                  ?>
                  <script language="javascript1.1" type="text/javascript">
                    alert("No hay Ejercicio Contable Definido");
                    location=("ConFinTipCueCon.php")
                  </script>
                  <?

                }
                  ?>
                  <script language="javascript1.1" type="text/javascript">
                    location=("ConFinTipCueCon.php")
                  </script>
                  <?

              }
              catch(Exception $e)
              {
                  print "Excepcion Obtenida: ".$e->getMessage()."\n";
              }
    }

?>
