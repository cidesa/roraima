<?

	require_once("pdfnprnomfirniv2.php");


	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages();
	$obj->Cuerpo();
	$obj->Output();
?>