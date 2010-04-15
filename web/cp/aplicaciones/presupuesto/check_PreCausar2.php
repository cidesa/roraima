<?
session_start();

require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/funciones2.php');
require($_SESSION["x"].'lib/general/tools.php');
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z=new tools();


//CARGAR MASCARA
$sql = "SELECT forpre, to_char(fecini,'dd/mm/yyyy') as fecini, to_char(feccie,'dd/mm/yyyy') as feccie,
    to_char(fecini,'yyyy') as anoinicio, to_char(feccie,'yyyy') as anocierre, nivdis
    from cpdefniv where codemp='001'";
if ($tb = $z->buscar_datos($sql)) {
  $numper = $tb->fields["numper"];
  $fechainicio = $tb->fields["fecini"];
  $fechacierre = $tb->fields["feccie"];
  $anoinicio = $tb->fields["anoinicio"];
  $anocierre = $tb->fields["anocierre"];
  $prenivdis = $tb->fields["nivdis"];
} else {
  $_SESSION["formato"] = "";
}

?>
<script language="JavaScript"  src="../../lib/general/js/funciones.js"></script>
<script language="JavaScript"  src="../../lib/general/js/fecha.js"></script>
<script language="JavaScript"  src="../../lib/general/js/datepickercontrol.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXProtobar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXToolbar.js"></script>
<script language="JavaScript"  src="../../lib/general/toolbar/js/dhtmlXCommon.js"></script>
<script type='text/javascript' src='../../lib/general/js/dFilter.js'></script>
	<script>
	i=1;

	while (i<=50)
	{
		var x="x"+i+"1";
		var x2="x"+i+"2";
		var x3="x"+i+"3";
		var x4="x"+i+"4";
		var x5="x"+i+"5";

		opener.document.getElementById(x).value='';
		opener.document.getElementById(x2).value='0.00';
		opener.document.getElementById(x3).value='0.00';
		opener.document.getElementById(x4).value='0.00';
		opener.document.getElementById(x5).value='';

		i=i+1;
	}
	opener.actualizarsaldos2();
	</script>

<?

   $concate = $_GET["concate"];
   $concate = substr($concate,1,strlen($concate));
   $ref     = split("/",$concate);

   $fecha = $_GET["fecha"];
   $fecha = substr($fecha,1,strlen($fecha));
   $fecha     = split("-",$fecha);

   $sel    = intval($_GET["sel"]);
   $monto  = (float)$_GET["monto"];
   $refere = $_GET["refere"];
   $cedula = $_GET["cedula"];
   $cont   = 0;
   $i      = 0;

   while ($i<=$sel)
   {
   		if ($refere=='C')
		{
			//$sql="select (case when refere = 'NULO' then refcau end) as ref refere as ref, codpre as codpre, monimp as monto, monaju as ajustado, monpag as pagado from cpimpcom where trim(refcom)=trim('".$ref[$i]."') ";
			//$sql="select (case when refere='' or refere='NULO' then refcom else refere end) as ref, codpre, monimp as monto, monaju as ajustado, monpag as pagado from cpimpcom where trim(refcom)=trim('".$ref[$i]."') ";
			$sql="select refcom as referencia,refere as ref, codpre, (monimp-moncau-monaju) as monto, monaju as ajustado, monpag as pagado from cpimpcom where trim(refcom)=trim('".$ref[$i]."') ";


		}
		else if ($refere=='P')
		{
//			$sql="select (case when refere='' or refere='NULO' then refprc else refere end) as ref, codpre as codpre, monimp as monto, monaju as ajustado, monpag as pagado from cpimpprc where trim(refprc)=trim('".$ref[$i]."') ";
			$sql="select refprc as referencia, refere as ref, codpre as codpre, (monimp-moncau-monaju) as monto, monaju as ajustado, monpag as pagado from cpimpprc where trim(refprc)=trim('".$ref[$i]."') ";
		}
   		if ($tb=$z->buscar_datos($sql))
		{
			while (!$tb->EOF)
			{
			$cont=$cont+1;

				$sql2="select nomben, cedrif from opbenefi where trim(cedrif)=trim('".$cedula."') ";
				if ($tb2=$z->buscar_datos($sql2))
				{
					$codben=$tb2->fields["cedrif"];
					$nomben=$tb2->fields["nomben"];
				}

				?>
				<script>
					i='<? print $cont;?>';
					var x="x"+i+"1";
					var x2="x"+i+"2";
					var x3="x"+i+"3";
					var x4="x"+i+"4";
					var x5="x"+i+"5";
					var x7="x"+i+"7";
					var x9="x"+i+"9";
					var x10="x"+i+"10";

					opener.document.getElementById(x).value  = '<? print $tb->fields["codpre"];?>';
					opener.document.getElementById(x2).value = format('<? print $tb->fields["monto"];?>','.','.',',');
					opener.document.getElementById(x3).value = format('<? print $tb->fields["pagado"];?>','.','.',',');
					//opener.document.getElementById(x4).value = format('<? print $tb->fields["ajustado"];?>','.','.',',');
					opener.document.getElementById(x5).value   = '<? print $tb->fields["ref"];?>';
					opener.document.getElementById(x7).value   = format('<? print $tb->fields["monto"];?>','.','.',',');
					opener.document.getElementById(x9).value   = '<? print $tb->fields["referencia"];?>';
					//Si por la fecha que viene del catalogo
					//opener.document.getElementById(x10).value  = format('<? print $tb->fields["monto"] - Monto_disponible_ejecucion($anocierre, $tb->fields["codpre"]. '%', substr($fecha[$i],3,2));?>','.','.',',');
					opener.document.getElementById(x10).value  = format('<? print Monto_disponible_ejecucion($anocierre, $tb->fields["codpre"]. '%', '00') - $tb->fields["monto"]; ?>','.','.',',');
				</script>
				<?
			$tb->MoveNext();
			}
		}

   		$i=$i+1;
   }
?>
<script>
	opener.actualizarsaldos2();
	opener.document.getElementById('codben').value='<? print $codben;?>';
	opener.document.getElementById('nomben').value='<? print $nomben;?>';
	opener.document.getElementById('referencia').value='<? print $concate;?>';
	close();
</script>