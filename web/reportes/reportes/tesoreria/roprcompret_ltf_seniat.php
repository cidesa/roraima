<?

	require_once("pdfoprcompret_ltf_seniat.php");
	require_once("anchooprcompret_ltf_seniat.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();



	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>