<?

	require_once("pdfnprhistnomdefcat.php");

	$obj= new pdfreporte();


	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>