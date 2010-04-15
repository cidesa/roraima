<?

	require_once("pdfcarcatart.php");

	if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("oprordemitidaspartidas.php");
		</script>
		<?
	}

	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages();
	$obj->Cuerpo();
	$obj->Output();
?>