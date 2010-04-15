<?
	
	require_once("pdfoce2032.php");	
	
	$obj= new pdfreporte();

	
			
			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	
	
?>