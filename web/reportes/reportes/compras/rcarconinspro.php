<?

	require_once("pdfcarconinspro.php");


	$obj= new pdfreporte();

	if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("carconinspro.php");
		</script>
		<?
	}

	$obj->AddPage();
	$obj->AliasNbPages();
	$obj->Cuerpo();
	$obj->Output();
?>