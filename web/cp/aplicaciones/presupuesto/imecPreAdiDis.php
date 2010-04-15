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
    $codigo=$_POST["codigo"];
    $fecha=$_POST["fecha"];
    $ano=substr($fecha,6,4);
    $desc=$_POST["desc"];
    $tipo=$_POST["tipo"];
    $desanu="";
    $totadidis=(float)(str_replace(',','',$_POST["totmon"]));
    $stadidis="A";
    $imec=$_GET["imec"];
  //validamos que la fecha este dentro del periodo seleccionado
    $periodo = ObtenerPeriodo($fecha);

  ////////////////
  ////////////////

    if ($imec=='I' or  $imec=='M')
    {
      try
      {
        $bd->startTransaccion();

        if ($imec=='I')
        {
          $sql="delete from CPAdiDis Where trim(RefAdi)='".trim($codigo)."'";
          $bd->actualizar($sql);
          //  GRABAR TRASLADO

          $sql="insert into CPAdiDis
            (RefAdi,FecAdi,AnoAdi,DesAdi,DesAnu,TotAdi,StaAdi,AdiDis)
            values ('".$codigo."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."','".$desanu."', ".$totadidis.",'".$stadidis."','".$tipo."')";

          $bd->actualizar($sql);
          
          // GRABAR DETALLE TRASLADOS CODIGOS PRESUPUESTARIOS -- GRID
          $sql="delete from CPMovAdi Where trim(RefAdi)='".trim($codigo)."'";
          $bd->actualizar($sql);

          $i=1;
          while ($i<=50)
          {
            if ((trim($_POST["x".$i."1"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
            {
              $monto=(float)(str_replace(',','',$_POST["x".$i."3"]));
              $sql="insert into CPMovAdi (RefAdi,CodPre,PerPre,MonMov,StaMov)
                    values ('".$codigo."','".$_POST["x".$i."1"]."','".$periodo."',".$monto.",'A')";
              $bd->actualizar($sql);
              $i=$i+1;
            }
            else
            {
              $i=51;
            }
          } //while
        } //if ($imec=='I')
        else if ($imec=='M')
        {
          //  ACTUALIZAR DATOS TRASLADO
          $sql="update CPAdiDis set FecAdi=to_date('".$fecha."','dd/mm/yyyy'),
                  AnoAdi='".$ano."',
                  DesAdi='".$desc."',
                  TotAdi= ".$totadidis.",
                  AdiDis='".$tipo."'
                where trim(RefAdi) = '".trim($codigo)."'";
          $bd->actualizar($sql);
        }

        // Guardar en Segbitaco
        $sql = "Select id from cpadidis where trim(RefAdi) = '".trim($codigo)."'";
  
        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpadidis', 'Preadidis', $imec=='M' ? 'A' : 'G' );


        $bd->completeTransaccion();

      }//try
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }

?>
<script>
  location=("PreAdiDis.php");
</script>
