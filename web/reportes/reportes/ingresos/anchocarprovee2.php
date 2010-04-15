<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=19;
		$anchos[1]=25;
		$anchos[2]=40;
		$anchos[3]=35;
		$anchos[4]=55;
		$anchos[5]=23;

		return $anchos[$pos];
	}


}
?>