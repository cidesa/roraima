<?
	
	require_once("pdfcarrecarg.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>