<?
	
	require_once("pdfINVERSIONES.php");
	
	$obj= new pdfreporte();

	 $tb=$obj->bd->select($obj->sql);
	 
	//HAY DATOS
	$obj->AliasNbPages(); 
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>