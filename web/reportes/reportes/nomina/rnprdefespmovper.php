<?
	
	require_once("pdfnprdefespmovper.php");
	
	
	$obj= new pdfreporte();
	
	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>