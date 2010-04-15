<?


	require_once("pdfpreejepre.php");
	require_once("anchopreejepre.php");
	$objrep=new mysreportes();
	$obj= new pdfreporte();

	for($i=0;$i<count($obj->titulos);$i++)
	{
		$obj->anchos[$i]=$objrep->getAncho($i);
	}


$tb=$obj->bd->select($obj->sql);
/*if (!$tb->EOF)
{ //HAY DATOS*/
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
/*}
else
{ //NO HAY DATOS
  ?>
   <script>
   alert('No hay informacion para procesar Este reporte...');
   location=("preejere.php");
   </script>
  <?
}*/
?>



