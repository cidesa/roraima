<?
	
	require_once("pdfNPRVARPER.php");
	require_once("anchoNPRVARPER.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>