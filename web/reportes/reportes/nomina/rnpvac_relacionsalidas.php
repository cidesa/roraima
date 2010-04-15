<?
	
	require_once("pdfnpvac_relacionsalidas.php");
	$obj= new pdfreporte();

	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>