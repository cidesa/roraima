<?
	
	require_once("pdfproexcejefis.php");	
	
	$obj= new pdfreporte();

	
			
			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
	
?>