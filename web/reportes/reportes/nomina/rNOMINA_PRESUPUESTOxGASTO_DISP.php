<?
	
	require_once("pdfNOMINA_PRESUPUESTOxGASTO_DISP.php");
	require_once("anchoNOMINA_PRESUPUESTOxGASTO_DISP.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>