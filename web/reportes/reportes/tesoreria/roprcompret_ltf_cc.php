<?

	require_once("pdfoprcompret_ltf_cc.php");
	require_once("anchooprcompret_ltf_cc.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();



	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>