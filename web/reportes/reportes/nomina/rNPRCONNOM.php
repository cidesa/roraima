<?

	require_once("pdfNPRCONNOM.php");

	$obj= new pdfreporte();



	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>