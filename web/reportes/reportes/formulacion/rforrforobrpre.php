<?

	require_once("pdfforrforobrpre.php");
	require_once("anchoforrforobrpre.php");

	//$objrep=new mysreportes();

	$obj= new pdfreporte();

	for($i=0;$i<count($obj->titulos);$i++)
	{
		$obj->anchos[$i]=$objrep->getAncho($i);
	}

$tb=$obj->bd->select($obj->sqlg);
if (!$tb->EOF)
{ //HAY DATOS*/
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
}
else
{ //NO HAY DATOS
  ?>
   <script>
   alert('No hay informacion para procesar este reporte...');
   location=("forrforobrpre.php");
   </script>
  <?
}
?>