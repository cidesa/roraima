<?
	
	require_once("pdfNPRRELCONC.php");
	require_once("anchoNPRRELCONC.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>