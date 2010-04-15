<?
	
	require_once("pdfnpaporet.php");
		

	$obj= new pdfreporte();
	

	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>