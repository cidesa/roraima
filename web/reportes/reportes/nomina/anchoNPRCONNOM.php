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
		$anchos[0]=14;
		$anchos[1]=57;
		$anchos[2]=22;
		$anchos[3]=20;
		$anchos[4]=17;
		$anchos[5]=12;
		$anchos[6]=12;
		$anchos[7]=10;
		$anchos[8]=13;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;
		
		return $anchos[$pos];	
	}	
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=71;
		$anchos2[1]=25;
		$anchos2[2]=18;
		$anchos2[3]=17;
		$anchos2[4]=11;
		$anchos2[5]=11;
		$anchos2[6]=24;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;
		
		return $anchos2[$pos];	
	}	

}
?>