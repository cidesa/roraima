<?
	
	require_once("pdfprecom.php");
	
	
	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>