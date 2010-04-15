<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=25;
		$anchos[1]=60;
		$anchos[2]=28;
		$anchos[3]=25;
		$anchos[4]=25;
		$anchos[5]=25;
		$anchos[6]=12;
		$anchos[7]=25;
		$anchos[8]=25;
		$anchos[9]=12;
		$anchos[10]=25;
		$anchos[11]=12;
		$anchos[12]=25;

		return $anchos[$pos];
	}


}
?>