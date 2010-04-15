<?
	
	require_once("pdfoprordpag.php");
	
	$obj= new pdfreporte();
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>