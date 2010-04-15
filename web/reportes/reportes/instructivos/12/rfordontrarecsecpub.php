<?
	
	require_once("pdffordontrarecsecpub.php");	
	
	$obj= new pdfreporte();

	
			
			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
	
?>