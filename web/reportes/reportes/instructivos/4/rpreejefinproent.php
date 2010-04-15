<?
	
	require_once("pdfpreejefinproent.php");	
	
	$obj= new pdfreporte();

			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
?>