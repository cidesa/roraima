<?
	
	require_once("pdfNPRCONSOLIDADO.php");
	require_once("anchoNPRCONSOLIDADO.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>