<?

	require_once("pdfnprrelchecdisc.php");
	$obj= new pdfreporte();


	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>