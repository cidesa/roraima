<?

	require_once("pdftsrmovbanban.php");


	$obj= new pdfreporte();
		if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("tsrmovbanban.php");
		</script>
		<?
	}
	$obj->AddPage();
	$obj->AliasNbPages();
	$obj->Cuerpo();
	$obj->Output();
?>