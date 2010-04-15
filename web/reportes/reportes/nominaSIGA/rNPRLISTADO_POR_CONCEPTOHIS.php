<?
	
	require_once("pdfNPRLISTADO_POR_CONCEPTOHIS.php");
	require_once("anchoNPRLISTADO_POR_CONCEPTOHIS.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>