<?

	require_once("pdfprecreadi_oficio.php");

	$obj= new pdfreporte();



	if (!$obj->arrp->EOF)
{
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
   location=("prerectificaciones.php");
   </script>
  <?
}
?>
