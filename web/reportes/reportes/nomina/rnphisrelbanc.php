<?
	
	require_once("pdfnphisrelbanc.php");
	$obj= new pdfreporte();
	

	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>