<?
	
	require_once("pdfNPRHOJINT.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>