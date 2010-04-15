<?
session_start();

require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
require_once($_SESSION["x"].'lib/general/funciones2.php');
require($_SESSION["x"].'lib/general/tools.php');
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z=new tools();
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
	opener.actualizar_saldos2();
	</script>

<?

   $concate=$_GET["concate"];

   $ref=split("/",$concate);
   $concate=substr($concate,1,strlen($concate));

   $sel=intval($_GET["sel"]);
   $monto=(float)$_GET["monto"];
   $cedula=$_GET["cedula"];
   $cont=0;
   $i=1;
   while ($i<=$sel)
   {
		$sql="select refprc as ref, codpre as codpre, (monimp-moncom) as monto, moncau as causado, monaju as ajustado, monpag as pagado from cpimpprc where trim(refprc)=trim('".$ref[$i]."') ";

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

				//Buscar la Disponibilidad



$sql='Select ' .
		'DesPrc as Descripcion,' .
		'RefPrc as Referencia,' .
		'CedRif as Beneficiario,' .
		'to_char(FecPrc,�dd/mm/yyyy�) as Fecha,' .
		'MonPrc as Monto ' .
		'From C' .
		'PPrecom ' .
		'Where ' .
		'StaPrc=�A� and ' .
		'SALCOM < MONPRC-SALAJU and ' .
		'FecPrc <=  to_date((�'+feccom+'�),�dd/mm/yyyy�) and ' .
		'RefPrc like upper(�%�) ' .
		'Order By ' .
		'RefPrc';

	/*			$codpre=$tb->fields["codpre"];
				echo $sql2="select mondis from cpdeftit where codpre='$codpre'";
				if ($tb2=$z->buscar_datos($sql2))
				{
					echo $mondis=$tb2->fields["mondis"];
				}
*/
//exit('   kk');
				?>
				<script>
					i='<? print $cont;?>';
					var x="x"+i+"1";
					var x2="x"+i+"2";
					var x3="x"+i+"3";
					var x4="x"+i+"4";
					var x5="x"+i+"5";
					var x6="x"+i+"6";
					var x7="x"+i+"7";
					var x8="x"+i+"8";

					opener.document.getElementById(x).value='<? print $tb->fields["codpre"];?>';
					opener.document.getElementById(x2).value=format('<? print $tb->fields["monto"];?>','.','.',',');
					opener.document.getElementById(x3).value=format('<? print $tb->fields["causado"];?>','.','.',',');
					opener.document.getElementById(x4).value=format('<? print $tb->fields["pagado"];?>','.','.',',');
					opener.document.getElementById(x5).value=format('<? print $tb->fields["monto"];?>','.','.',',');
					opener.document.getElementById(x6).value=format('<? print $tb->fields["ajustado"];?>','.','.',',');
					opener.document.getElementById(x7).value='<? print $tb->fields["ref"];?>';
					opener.document.getElementById(x8).value=format('<? print $tb->fields["monto"] - $tb->fields["causado"];?>','.','.',',');
				</script>
				<?
				$desprc=$tb->fields["desprc"];
				$tb->MoveNext();
			}
		}

   		$i=$i+1;
   }
?>
<script>
	opener.actualizar_saldos2();
	opener.document.getElementById('cedrif').value='<? print $codben;?>';
	opener.document.getElementById('nomben').value='<? print $nomben;?>';
	opener.document.getElementById('refprc').value='<? print $concate;?>';
	opener.document.getElementById('desprc').value='<? print $desprc;?>';
	close();
</script>