<?

	require_once("pdfNPRRELCONHIS.php");
	require_once("anchoNPRRELCONCHIS.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();


	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>