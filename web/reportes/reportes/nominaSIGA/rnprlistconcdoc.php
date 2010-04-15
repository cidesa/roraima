<?
	
	require_once("pdfnprlistconcdoc.php");

	$obj= new pdfreporte();
	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>