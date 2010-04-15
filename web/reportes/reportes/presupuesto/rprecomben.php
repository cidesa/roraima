<?
	
	require_once("pdfprecomben.php");
	
	
	$obj= new pdfreporte();

	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>