<?

	require_once("pdfnprhistnomfirdefcat.php");

	$obj= new pdfreporte();


	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>