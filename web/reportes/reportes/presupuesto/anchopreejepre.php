<?
require_once("../../lib/bd/basedatosAdo.php");
class mysreportes
{

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=30;
		$anchos[1]=69;
		$anchos[2]=28;
		$anchos[3]=28;
		$anchos[4]=28;
		$anchos[5]=28;
		$anchos[6]=12;
		$anchos[7]=28;
		$anchos[8]=28;
		$anchos[9]=12;
		$anchos[10]=28;
		$anchos[11]=12;
		$anchos[12]=12;

		return $anchos[$pos];
	}


}
?>