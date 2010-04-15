<?
	
	require_once("pdfnpvac_solicitud.php");
	$obj= new pdfreporte();

	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>