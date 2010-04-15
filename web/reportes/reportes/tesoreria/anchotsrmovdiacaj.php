<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=65;
		$anchos[1]=35;
		$anchos[2]=35;
		$anchos[3]=35;
		$anchos[4]=35;
		$anchos[5]=50;

		return $anchos[$pos];
	}


}
?>