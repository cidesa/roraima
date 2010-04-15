<?

	require_once("pdfoprordpagdes_vis.php");

	$obj= new pdfreporte();

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>