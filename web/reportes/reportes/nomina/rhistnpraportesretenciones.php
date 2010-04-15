<?

	require_once("pdfhistnpraportesretenciones.php");
	$obj= new pdfreporte();
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>