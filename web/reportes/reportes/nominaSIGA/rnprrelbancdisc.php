<?
	
	require_once("pdfnprrelbancdisc.php");
	//require_once("anchoNPRCATPRE.php");
	
	//$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	

	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>