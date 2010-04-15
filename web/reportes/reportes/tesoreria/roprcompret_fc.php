<?

	require_once("pdfoprcompret_fc.php");
	require_once("anchooprcompret_fc.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();

	/*for($i=0;$i<count($obj->titulos);$i++)
	{
		$obj->anchos[$i]=$objrep->getAncho($i);
	}

/*	for($i=0;$i<count($obj->titulos2);$i++)
	{
		$obj->anchos2[$i]=$objrep->getAncho2($i);
	}*/

	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>