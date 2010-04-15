<?
	
	require_once("pdfconrflucaj.php");
	
	
	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>