<?
	require_once("pdfpredispercoo_discom.php");

	$obj= new pdfreporte();
   //anchos de mis columnas

	$obj->anchos[0]=45;//codigo
	$obj->anchos[1]=45;//denominacion
    $obj->anchos[2]=9;//ley asignacion inicial
	$obj->anchos[3]=27;//modificaciones
    $obj->anchos[4]=20;//asignacion actualizada (gasto acordado)
    $obj->anchos[5]=20;//compromisos
    $obj->anchos[6]=31;//disponibilidad
	$obj->anchos[7]=24;//causado
    $obj->anchos[8]=25;//pagado
    $obj->anchos[9]=21;//deuda



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
   location=("predispercoo_discom.php");
   </script>
  <?

  	}
?>