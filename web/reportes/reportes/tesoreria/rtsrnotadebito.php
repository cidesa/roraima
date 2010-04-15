<?
	
	require_once("pdftsrnotadebito.php");
	require_once("anchotsrnotadebito.php");
	
	$objrep=new mysreportes();
	
	$obj= new pdfreporte();
	
	/*for($i=0;$i<count($obj->titulos);$i++)
	{
		$obj->anchos[$i]=$objrep->getAncho($i);
	}
	
/*	for($i=0;$i<count($obj->titulos2);$i++)
	{
		$obj->anchos2[$i]=$objrep->getAncho2($i);
	}*/

//	$obj->AliasNbPages(); 
//	$obj->AddPage();
//	$obj->Cuerpo();
//	$obj->Output();
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
   location=("tsrnotadebito.php");
   </script>
  <?
}	
?>