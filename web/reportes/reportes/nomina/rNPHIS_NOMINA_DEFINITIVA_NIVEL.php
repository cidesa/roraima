<?
	
	require_once("pdfNPHIS_NOMINA_DEFINITIVA_NIVEL.php");
	require_once("anchoNPHIS_NOMINA_DEFINITIVA_NIVEL.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>