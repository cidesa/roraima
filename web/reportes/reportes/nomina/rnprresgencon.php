<?
	
	require_once("pdfnprresgencon.php");
	//require_once("anchonprresgencon.php");
	
	//$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>