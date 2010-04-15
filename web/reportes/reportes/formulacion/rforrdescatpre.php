<?
	require_once("pdfforrdescatpre.php");
	require_once("anchoforrdescatpre.php");


	$obj= new pdfreporte();

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
   location=("forrdescatpre.php");
   </script>
  <?
}
?>