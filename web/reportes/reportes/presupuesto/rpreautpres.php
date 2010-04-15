<?
	require_once("pdfpreautpres.php");

	if ($obj->tb->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("preautpres.php");
		</script>
		<?
	}


	$obj= new pdfreporte();
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>