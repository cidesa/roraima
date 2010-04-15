<?

	require_once("pdfnprcalcon1.php");

	$obj= new pdfreporte();



	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>