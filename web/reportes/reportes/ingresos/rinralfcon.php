<?

	require_once("pdfinralfcon.php");

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
   location=("inralfcon.php");
   </script>
  <?
}
?>