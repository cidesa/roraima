<?

	require_once("pdfoprordpagben_sta.php");

	$obj= new pdfreporte();


$tb=$obj->bd->select($obj->sql);
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
   alert('No hay información para procesar Este reporte...');
   location=("oprordpagben_sta.php");
   </script>
  <?
}
?>