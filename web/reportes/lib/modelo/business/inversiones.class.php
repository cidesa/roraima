<?php
require_once("../../lib/modelo/baseClases.class.php");

class Inversiones extends baseClases
{

 	public static function catalogo_refcolape($objhtml)
	{
		$sql="SELECT refcol as codigo, descol as descripcion from invcoloca where ( refcol like '%V_0%' AND descol like '%V_1%' ) order by refcol";
		$catalogo = array(
		    $sql,
		    array('Nro. Apertura','Descripcion'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );
	    return $catalogo;
	}

 	public static function catalogo_refcoltra($objhtml)
	{
		$sql="SELECT reftra as codigo, destra as descripcion from tsmovtra where ( reftra like '%V_0%' AND destra like '%V_1%' ) order by reftra";
		$catalogo = array(
		    $sql,
		    array('Nro. Traslado','Descripcion'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );
	    return $catalogo;
	}

}

