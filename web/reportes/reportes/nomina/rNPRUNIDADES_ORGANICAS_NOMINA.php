<?
	
	require_once("pdfNPRUNIDADES_ORGANICAS_NOMINA.php");
	require_once("anchoNPRUNIDADES_ORGANICAS_NOMINA.php");
	
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