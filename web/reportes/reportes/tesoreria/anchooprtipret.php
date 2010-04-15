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
		$anchos[0]=13;
		$anchos[1]=70;
		$anchos[2]=20;
		$anchos[3]=13;
		$anchos[4]=27;
		$anchos[5]=50;
		$anchos[6]=20;
		$anchos[7]=10;
		$anchos[8]=30;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=30;
		$anchos2[1]=30;
		$anchos2[2]=30;
		$anchos2[3]=20;
		$anchos2[4]=33;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;

		return $anchos2[$pos];
	}

}
?>