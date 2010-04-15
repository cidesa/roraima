<?
	
	require_once("pdfnprprestliquidacion.php");
				    
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>