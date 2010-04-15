<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=80;
		$anchos[1]=34;
		$anchos[2]=34;
		$anchos[3]=34;
		$anchos[4]=34;
		$anchos[5]=40;

		return $anchos[$pos];
	}


}
?>