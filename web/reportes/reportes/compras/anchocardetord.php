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
		$anchos[1]=50;
		$anchos[2]=25;
		$anchos[3]=25;
		$anchos[4]=50;
		$anchos[5]=35;
		$anchos[6]=35;
		$anchos[7]=35;


		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=25;
		$anchos2[1]=40;
		$anchos2[2]=25;
		$anchos2[3]=25;
		$anchos2[4]=25;
		$anchos2[5]=25;
		$anchos2[6]=25;
		$anchos2[7]=25;
		$anchos2[8]=25;
		$anchos2[9]=30;


		return $anchos2[$pos];
	}

}
?>