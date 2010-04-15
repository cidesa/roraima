<?php
require_once("../../lib/modelo/baseClases.class.php");

class creditos extends baseClases  {

   public static function catalogo_crerif($objhtml)
	{
		$sql="SELECT cedrif as rif, nomben as Nombre FROM ccbenefi where (cedrif like '%V_0%' AND nomben like '%V_1%' ) order by cedrif";

		$catalogo = array(
		    $sql,
		    array('R.I.F','Nombre del Beneficiario'),
		    array($objhtml),
		    array('rif'),
		    100
		    );

	    return $catalogo;
	}
}
?>