<?
	
	require_once("pdfctaahoinvfin.php");	
	
	$obj= new pdfreporte();

	
			
			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
	
?>