<?

	require_once("pdfoprtipret.php");
	require_once("anchooprtipret.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();

	if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("oprtipret.php");
		</script>
		<?
	}


	for($i=0;$i<count($obj->titulos);$i++)
	{
		$obj->anchos[$i]=$objrep->getAncho($i);
	}

/*	for($i=0;$i<count($obj->titulos2);$i++)
	{
		$obj->anchos2[$i]=$objrep->getAncho2($i);
	}*/

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>