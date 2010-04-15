<?
	
	require_once("pdfpredisneg.php");
	
	$obj= new pdfreporte();
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>