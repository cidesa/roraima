<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=35;
		$anchos[1]=20;
		$anchos[2]=38;
		$anchos[3]=80;
		$anchos[3]=60;

		return $anchos[$pos];
	}


}
?>