<?

	require_once("pdfprecerpre.php");


	$obj= new pdfreporte();

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>