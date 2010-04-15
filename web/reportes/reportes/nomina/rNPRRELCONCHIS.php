<?
	
	require_once("pdfNPRRELCONCHIS.php");
	require_once("anchoNPRRELCONCHIS.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>