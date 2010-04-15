<?
	
	require_once("pdfpreejefisaccespent.php");	
	
	$obj= new pdfreporte();

			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
?>