<?
	
	require_once("pdfnphisaporet.php");
		

	$obj= new pdfreporte();
	

	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>