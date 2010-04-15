<?

	require_once("pdfnprnomfircat2.php");


	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages();
	$obj->Cuerpo();
	$obj->Output();
?>