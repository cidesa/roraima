<?
	
	require_once("pdfOprOrdEnvFin_SinTmp.php");
	
	$obj= new pdfreporte();
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>