<?

	require_once("pdfNPRVARPER.php");
	require_once("anchoNPRVARPER.php");

	$objrep=new mysreportes();

	$obj= new pdfreporte();


$tb=$obj->bd->select($obj->sql1);
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
   alert('No hay informacion para procesar Este reporte...');
   location=("NPRVARPER.php");
   </script>
  <?
}
?>