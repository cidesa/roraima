<?

	require_once("pdfprecreadi_decreto.php");

	$obj= new pdfreporte();



	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>