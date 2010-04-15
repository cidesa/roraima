<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=30;
		$anchos[1]=80;
		$anchos[2]=25;
		$anchos[3]=28;
		$anchos[4]=28;

		return $anchos[$pos];
	}


}
?>