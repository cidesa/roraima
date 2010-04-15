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
		$anchos[1]=60;
		$anchos[2]=17;
		$anchos[3]=20;
		$anchos[4]=20;
		$anchos[5]=30;
		$anchos[6]=20;


		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=20;
		$anchos2[1]=60;
		$anchos2[2]=17;
		$anchos2[3]=20;
		$anchos2[4]=20;
		$anchos2[5]=30;
		$anchos2[6]=20;

		return $anchos2[$pos];
	}

}
?>