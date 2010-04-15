<?

	require_once("pdftsrrescon.php");
	require_once("anchotsrrescon.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();

	for($i=0;$i<count($obj->titulos);$i++)
	{
		$obj->anchos[$i]=$objrep->getAncho($i);
	}

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>