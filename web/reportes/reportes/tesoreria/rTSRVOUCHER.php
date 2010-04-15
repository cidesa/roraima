<?

	require_once("pdfTSRVOUCHER.php");
	require_once("anchoTSRVOUCHER.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();
	$obj->AliasNbPages();
	$obj->SetTopMargin(0);
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>