<?
	
	require_once("pdfoprdesubi.php");
	
	
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
   alert('No hay informacion para procesar este reporte...');
   location=("oprdesubi.php");
   </script>
  <?
}	
?>