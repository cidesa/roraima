<?
	
	require_once("pdfOprOrdEnvCont.php");
	
	$obj= new pdfreporte();
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>