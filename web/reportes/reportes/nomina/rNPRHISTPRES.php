<?
	
	require_once("pdfNPRHISTPRES.php");
	require_once("anchoNPRHISTPRES.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>