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
		$anchos[2]=40;
		$anchos[3]=35;
		$anchos[4]=45;
		$anchos[5]=35;
		$anchos[6]=40;
		$anchos[7]=30;
		
		return $anchos[$pos];	
	}	
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=20;
		$anchos2[1]=20;
		$anchos2[2]=40;
		$anchos2[3]=35;
		$anchos2[4]=45;
		$anchos2[5]=35;
		$anchos2[6]=45;
		$anchos2[7]=30;

		
		return $anchos2[$pos];	
	}	

}
?>