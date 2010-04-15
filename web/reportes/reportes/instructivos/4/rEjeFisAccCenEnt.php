<?
	
	require_once("pdfEjeFisAccCenEnt.php");	
	
	$obj= new pdfreporte();

			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
?>