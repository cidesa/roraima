<?
	
	require_once("pdfPRERADIDIS.php");
	require_once("anchoPRERADIDIS.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	


	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>