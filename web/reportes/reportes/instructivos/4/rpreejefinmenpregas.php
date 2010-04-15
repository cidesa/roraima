<?
	
	require_once("pdfpreejefinmenpregas.php");	
	
	$obj= new pdfreporte();

			$obj->AliasNbPages(); 
			$obj->AddPage();
					
			$obj->Cuerpo();
			$obj->Output();
	
?>