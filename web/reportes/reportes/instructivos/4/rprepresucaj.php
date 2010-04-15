<?
	
	require_once("pdfprepresucaj.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>