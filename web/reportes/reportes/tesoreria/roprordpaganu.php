<?

	require_once("pdfoprordpaganu.php");

	$obj= new pdfreporte();

	if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("oprordpaganu.php");
		</script>
		<?
	}

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>