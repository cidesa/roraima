<?
	
	require_once("pdfEjeFisAccEspEnt.php");	
	
	$obj= new pdfreporte();

			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
?>