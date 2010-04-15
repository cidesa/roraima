<?
	
	require_once("pdfRECIBO_TIPO_A.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>