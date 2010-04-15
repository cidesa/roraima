<?
	require_once("pdfpreejeprefin.php");

	$obj= new pdfreporte();
   //anchos de mis columnas

   		if ($obj->tb2->EOF)
	{
		?>
		<script>
		alert("No hay informacion para procesar este reporte...");
		location=("predispar.php");
		</script>
		<?
	}

	$obj->anchos[0]=26;//codigo
	$obj->anchos[1]=52;//denominacion
    $obj->anchos[2]=9;//ley asignacion inicial
	$obj->anchos[3]=27;//modificaciones
    $obj->anchos[4]=20;//asignacion actualizada (gasto acordado)
    $obj->anchos[5]=20;//compromisos
    $obj->anchos[6]=31;//disponibilidad
	$obj->anchos[7]=24;//causado
    $obj->anchos[8]=25;//pagado
    $obj->anchos[9]=21;//deuda


	$obj->AliasNbPages();
	$obj->AddPage();
	$obj->Cuerpo();
	$obj->Output();
?>