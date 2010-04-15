<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=40;
		$anchos[1]=80;
		$anchos[2]=25;

		return $anchos[$pos];
	}

	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=25;
		$anchos2[1]=40;
		$anchos2[2]=40;
		$anchos2[3]=25;
		$anchos2[4]=25;

		return $anchos2[$pos];
	}

}
?>