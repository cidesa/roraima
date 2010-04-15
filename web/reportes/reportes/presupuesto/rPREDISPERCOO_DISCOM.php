<?
	
	require_once("PDFPREDISPERCOO_DISCOM.php");
	
	
	$obj= new pdfreporte();
	


	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>