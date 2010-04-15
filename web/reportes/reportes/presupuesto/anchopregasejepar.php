<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=30;
		$anchos[1]=60;
		$anchos[2]=100;

		return $anchos[$pos];
	}

	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=30;
		$anchos2[1]=60;
		$anchos2[2]=20;
		$anchos2[3]=20;
		$anchos2[4]=20;
		$anchos2[5]=20;
		$anchos2[6]=20;


		return $anchos2[$pos];
	}


}
?>