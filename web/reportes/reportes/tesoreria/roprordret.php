<?

	require_once("pdfoprordret.php");
	require_once("anchooprordret.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>