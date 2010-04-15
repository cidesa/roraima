<?

	require_once("pdfoprordenvdes_sintmp.php");


	$obj= new pdfreporte();

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>