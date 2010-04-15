<?
	
	require_once("pdfOprOrdPre_Nomina.php");
	
	$obj= new pdfreporte();
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>