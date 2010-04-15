<?
	
	require_once("pdfnprhisnomdefcat.php");
	
	$obj= new pdfreporte();
	
	
	$obj->AddPage();
	$obj->AliasNbPages();	
	$obj->Cuerpo();
	$obj->Output();
?>