<?php
require_once("../../lib/modelo/baseClases.class.php");

class ingresos extends baseClases
{
	public static function catalogo_cireging_refing($objhtml)
	{
	 $sql="select distinct(a.refing) as refing, a.fecing as fecing, a.desing  from cireging a where (a.refing like '%V_0%' AND a.fecing like '%V_1%' AND a.desing like '%V_2%') order by a.refing ";

 		$catalogo = array(
		    $sql,
		    array('Referencia del Ingreso','Fecha del Ingreso','Descripción'),
		    array($objhtml),
		    array('refing'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_ciconrep_rifcon($objhtml)
	{
	 $sql="select distinct(a.rifcon) as rif, a.nomcon as NOMBRE from ciconrep a where (a.rifcon like '%V_0%' AND a.nomcon like '%V_1%') order by a.rifcon ";

 		$catalogo = array(
		    $sql,
		    array('Rif Constribuyente','Nombre Contribuyente'),
		    array($objhtml),
		    array('rif'),
		    100
		    );

	    return $catalogo;
	}


	public static function catalogo_cireging_refliq($objhtml)
	{
	 $sql="select distinct(a.refliq) as refliq, a.fecliq as fecliq, a.desliq  from cireging a where (a.refliq like '%V_0%' AND a.fecliq like '%V_1%' AND a.desliq like '%V_2%') order by a.refliq ";

 		$catalogo = array(
		    $sql,
		    array('Referencia Liquidación','Fecha Liquidación','Descripción'),
		    array($objhtml),
		    array('refliq'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_ciniveles($objhtml)
	{
	 $sql="select nomext as nivel from ciniveles a where (nomext like '%V_0%') order by consec";

 		$catalogo = array(
		    $sql,
		    array('NOMBRE NIVEL'),
		    array($objhtml),
		    array('NIVEL'),
		    20
		    );

	    return $catalogo;
	}

	public static function catalogo_cideftit($objhtml)
	{
	 $sql="select codpre as codigo, nompre as nombre from cideftit where (codpre like '%V_0%' AND nompre like '%V_1%') order by codpre";

 		$catalogo = array(
		    $sql,
		    array('Codigo Presupuestario','Nombre'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_codpre($objhtml)
	{
	 $sql="select distinct(codpre) as codigo, nompre as nombre from  ingresos where (codpre like '%V_0%' AND nompre like '%V_1%') order by codpre";

 		$catalogo = array(
		    $sql,
		    array('Codigo Presupuestario','Nombre'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

}
?>