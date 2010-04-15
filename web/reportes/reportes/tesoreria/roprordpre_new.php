<?

	require_once("pdfoprordpre_new.php");

	$obj= new pdfreporte();
$tb1=$obj->bd->select($obj->sql1);

if (!$tb->EOF)
{ //HAY DATOS
	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
}
else
{ //NO HAY DATOS
  ?>
   <script>
   alert('No hay información para procesar este reporte...');
   location=("oprordpre_new.php");
   </script>
  <?
}
?>