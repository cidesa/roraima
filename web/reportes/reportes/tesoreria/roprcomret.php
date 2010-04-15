<?

	require_once("pdfoprcomret.php");
	require_once("anchooprcomret.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();


	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>