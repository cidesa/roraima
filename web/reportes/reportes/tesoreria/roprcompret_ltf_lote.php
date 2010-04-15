<?

	require_once("pdfoprcompret_ltf_lote.php");
	require_once("anchooprcompret_ltf.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();



	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>