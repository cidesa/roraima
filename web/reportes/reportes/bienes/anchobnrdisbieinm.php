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
		$anchos[0]=40;
		$anchos[1]=40;
		$anchos[2]=80;
		$anchos[3]=35;
		$anchos[4]=30;
		$anchos[5]=30;
		$anchos[6]=30;
		$anchos[7]=30;
		$anchos[8]=30;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;
		
		return $anchos[$pos];	
	}	
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=60;
		$anchos2[1]=60;
		$anchos2[2]=40;
		$anchos2[3]=50;
		$anchos2[4]=40;
		$anchos2[5]=30;

		
		return $anchos2[$pos];	
	}	
	function getAncho3($pos)
	{
		$anchos3=array();
		$anchos3[0]=50;
		$anchos3[1]=50;
		$anchos3[2]=20;
		$anchos3[3]=25;
		$anchos3[4]=40;
		$anchos3[5]=30;
		$anchos3[6]=30;
		$anchos3[7]=30;
		$anchos3[8]=30;
		$anchos3[9]=30;
		$anchos3[10]=30;
		$anchos3[11]=30;
		
		return $anchos3[$pos];	
	}	
	function getAncho4($pos)
	{
		$anchos4=array();
		$anchos4[0]=30;
		$anchos4[1]=50;
		$anchos4[2]=25;
		$anchos4[3]=25;
		$anchos4[4]=25;
		$anchos4[5]=25;
		$anchos4[6]=25;
		$anchos4[7]=25;
		$anchos4[8]=25;
		$anchos4[9]=30;
		$anchos4[10]=30;
		$anchos4[11]=30;
		
		return $anchos3[$pos];	
	}	
}
?>