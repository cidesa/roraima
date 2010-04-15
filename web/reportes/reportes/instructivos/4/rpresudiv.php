<?
	
	require_once("pdfpresudiv.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>