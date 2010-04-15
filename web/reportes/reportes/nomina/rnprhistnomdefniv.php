<?

	require_once("pdfnprhistnomdefniv.php");


	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages();
	$obj->Cuerpo();
	$obj->Output();
?>