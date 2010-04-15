<?
	
	require_once("pdfnprlishijtra.php");
	require_once("anchonprlishijtra.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>