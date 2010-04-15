<?
	
	require_once("pdfNPRLISTADO_POR_CONCEPTO.php");
	require_once("anchoNPRLISTADO_POR_CONCEPTO.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>