<?
	include_once("../../lib/general/Herramientas.class.php");
	$reporte=H::GetPost("r");
	$modulo=H::GetPost("m");
	//require_once($modulo."/pdf".$reporte."");
	require_once("pdf".$reporte);

	$obj= new pdfreporte();

	if ($obj->arrp)
	{
		$obj->AliasNbPages();
		$obj->AddPage();
		$obj->Cuerpo();
		$obj->Output();
	}else
	{
	 ?><script language="JavaScript" type="text/javascript">
  		alert('No Existen Datos Para este Reporte');
  		location="<?php echo $reporte?>";
		</script><?
	}

