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
		$anchos[1]=15;
		$anchos[2]=25;
		$anchos[3]=15;
		$anchos[4]=15;
		$anchos[5]=15;
		$anchos[6]=15;
		$anchos[7]=15;
		$anchos[8]=15;
		$anchos[9]=15;
		$anchos[10]=15;
		$anchos[11]=15;
		$anchos[12]=15;
		$anchos[13]=15;
		$anchos[14]=15;
		$anchos[15]=15;
		$anchos[16]=18;
		$anchos[17]=17;
		$anchos[18]=18;		
		
		return $anchos[$pos];	
	}	
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=20;
		$anchos2[1]=20;
		$anchos2[2]=20;
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