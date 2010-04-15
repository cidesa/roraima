<?
	
	require_once("pdfejegasesppersertra.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>