<?

	require_once("pdfnprhistasigemp.php");


	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages();
	$obj->Cuerpo();
	$obj->Output();
?>