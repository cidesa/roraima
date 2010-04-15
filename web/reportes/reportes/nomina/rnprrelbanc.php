<?
	
	require_once("pdfnprrelbanc.php");
	$obj= new pdfreporte();

	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>