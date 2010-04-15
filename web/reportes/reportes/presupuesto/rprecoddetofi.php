<?

	require_once("pdfprecoddetofi.php");

		$obj= new pdfreporte();

	if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("precoddetofi.php");
		</script>
		<?
	}

	$obj= new pdfreporte();
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>