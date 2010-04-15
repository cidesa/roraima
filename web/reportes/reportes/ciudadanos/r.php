<?
	include_once("../../lib/general/Herramientas.class.php");
	$reporte=H::GetPost("r");
	$modulo=H::GetPost("m");
	if(strrpos($reporte,"?"))
	{
		$varaux=explode("?",$reporte);
		$reporte=$varaux[0];
	}
	//require_once($modulo."/pdf".$reporte."");
	require_once("pdf".$reporte);

	$obj= new pdfreporte();

	/*if ($obj->arrp)
	{*/
		$obj->AliasNbPages();
		$obj->AddPage();
		$obj->Cuerpo();
		$obj->Output();
		if($obj->bd)
			$obj->bd->closed();
	/*}else
	{
	 ?><script language="JavaScript" type="text/javascript">
  		alert('No Existen Datos Para este Reporte');
  		location="<?php echo $reporte?>";
		</script><?
	//}*/
