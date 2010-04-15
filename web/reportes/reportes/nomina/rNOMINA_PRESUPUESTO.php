<?
	
	require_once("pdfNOMINA_PRESUPUESTO.php");
	require_once("anchoNOMINA_PRESUPUESTO.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>