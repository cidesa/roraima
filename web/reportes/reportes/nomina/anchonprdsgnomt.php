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
		$anchos[0]=15;
		$anchos[1]=50;
		$anchos[2]=25;
		$anchos[3]=10;
		$anchos[4]=10;
		$anchos[5]=10;
		$anchos[6]=10;
		$anchos[7]=10;
		$anchos[8]=10;
		$anchos[9]=10;
		$anchos[10]=10;
		$anchos[11]=10;
		$anchos[12]=10;
		$anchos[13]=10;
		$anchos[14]=10;
		$anchos[15]=10;
		$anchos[16]=10;
		$anchos[17]=10;
		$anchos[18]=10;
		$anchos[19]=10;
     	return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=15;
		$anchos2[1]=50;
		$anchos2[2]=25;
		$anchos2[3]=10;
		$anchos2[4]=10;
		$anchos2[5]=10;
		$anchos2[6]=10;
		$anchos2[7]=10;
		$anchos2[8]=10;
		$anchos2[9]=10;
		$anchos2[10]=10;
		$anchos2[11]=10;
		$anchos2[12]=10;
		$anchos2[13]=10;
		$anchos2[14]=10;
		$anchos2[15]=10;
		$anchos2[16]=10;
		$anchos2[17]=10;
		$anchos2[18]=10;
		$anchos2[19]=10;
	    return $anchos2[$pos];
	}

}
?>