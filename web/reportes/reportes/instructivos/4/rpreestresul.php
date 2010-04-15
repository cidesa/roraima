<?
	
	require_once("pdfpreestresul.php");	
	
	$obj= new pdfreporte();

	
			
			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
	
?>