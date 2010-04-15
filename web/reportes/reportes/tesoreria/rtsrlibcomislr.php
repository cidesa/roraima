<?

	require_once("pdftsrlibcomislr.php");

	$obj= new pdfreporte();

		if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("tsrlibcomislr.php");
		</script>
		<?
	}

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>