<?
//<!--  Programado  por Jaime Suàrez -->
	
	require_once("pdfnpvac_historico.php");

	$obj= new pdfreporte();
	$obj->AddPage();
	$obj->AliasNbPages(); 
	$obj->Cuerpo();
	$obj->Output();
?>