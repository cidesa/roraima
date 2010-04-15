<?
	
	require_once("pdfconmayana.php");
	
	
	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>