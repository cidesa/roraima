<?
	require_once("pdfpredisperanu.php");
	
	$obj= new pdfreporte();
   //anchos de mis columnas
   	
	$obj->anchos[0]=28;//codigo
	$obj->anchos[1]=63;//denominacion
    $obj->anchos[2]=8;//ley asignacion inicial
	$obj->anchos[3]=28;//modificaciones
    $obj->anchos[4]=17;//asignacion actualizada (gasto acordado)
    $obj->anchos[5]=25;//precompromiso
    $obj->anchos[6]=26;//disponibilidad
	$obj->anchos[7]=27;//compromiso
    $obj->anchos[8]=25;//causado
    $obj->anchos[9]=21;//pagado

		
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
   location=("predisperanu.php");
   </script>
  <?
}	
?>