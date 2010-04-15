<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=85;
		$anchos[1]=75;
		$anchos[2]=50;
		$anchos[3]=50;

		return $anchos[$pos];
	}

	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=25;
		$anchos2[1]=60;
		$anchos2[2]=25;
		$anchos2[3]=25;
		$anchos2[4]=25;
		$anchos2[5]=25;
		$anchos2[6]=25;
		$anchos2[7]=25;
		$anchos2[8]=25;

		return $anchos2[$pos];
	}


}
?>