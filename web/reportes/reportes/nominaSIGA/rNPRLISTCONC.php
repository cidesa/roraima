<?
	
	require_once("pdfNPRLISTCONC.php");
	require_once("anchoNPRLISTCONC.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>