<?
	
	require_once("pdfcarramart.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>