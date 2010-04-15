<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{
	var $rep;
	var $bd;

	function mysreportes()
	{
		$this->rep="";
		$this->bd=new basedatosAdo();
	}
	function sqlreporte()
	{

		$sql="select refcom as referencia, codpre as codigo_presupuestario, monimp as monto from cpimpcom order by refcom";
		return $sql;
	}
	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=20;
		$anchos[1]=20;
		$anchos[2]=20;
		$anchos[3]=20;
		$anchos[4]=20;
		$anchos[5]=20;
		$anchos[6]=20;
		$anchos[7]=20;
		$anchos[8]=20;
		$anchos[9]=20;
		$anchos[10]=20;
		$anchos[11]=20;
		$anchos[12]=20;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=50;
		$anchos2[1]=50;
		$anchos2[2]=50;
		$anchos2[3]=20;
		$anchos2[4]=40;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;
		$anchos2[11]=30;

		return $anchos2[$pos];
	}

}
?>