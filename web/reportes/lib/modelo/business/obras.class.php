<?php
require_once("../../lib/modelo/baseClases.class.php");

class Obras extends baseClases
{

/**
 *   REPORTES::nprnomdef.php y nprhisnomdef.php
 *
 * */

 	public static function catalogo_octipval($objhtml)
	{		
		$sql="select codtipval as codigo, destipval as descripcion from octipval where ( codtipval like '%V_0%' AND destipval like '%V_1%') order by codtipval";

		$catalogo = array(
		    $sql,
		    array('Codigo del Evaluo','Descripcion del Evaluo'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	
    public static function catalogo_octipobr($objhtml)
	{		
		$sql="select codtipobr as codigo, destipobr as descripcion from octipobr where ( codtipobr like '%V_0%' AND destipobr like '%V_1%') order by codtipobr";

		$catalogo = array(
		    $sql,
		    array('Codigo de obra','Descripcion de obra'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	
	    public static function catalogo_octipesp($objhtml)
	{		
		$sql="select codtipesp as codigo, destipesp as descripcion from octipesp where ( codtipesp like '%V_0%' AND destipesp like '%V_1%') order by codtipesp";

		$catalogo = array(
		    $sql,
		    array('Codigo de especialidad','Descripcion de especialidad'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}	
	
	public static function catalogo_octipact($objhtml)
	{		
		$sql="select codtipact as codigo, destipact as descripcion from octipact where ( codtipact like '%V_0%' AND destipact like '%V_1%') order by codtipact";

		$catalogo = array(
		    $sql,
		    array('Codigo de acta','Descripcion de acta'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}	

public static function catalogo_ocregcon($objhtml)
	{		
		$sql="select codcon as codigo, descon as descripcion from ocregcon where ( codcon like '%V_0%' AND descon like '%V_1%') order by codcon";

		$catalogo = array(
		    $sql,
		    array('Codigo del Contrato','Descripcion del Contrato'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	
	public static function catalogo_ocregobr($objhtml)
	{		
		$sql="select codobr as codigo, desobr as descripcion from ocregobr where ( codobr like '%V_0%' AND desobr like '%V_1%') order by codobr";

		$catalogo = array(
		    $sql,
		    array('Codigo de Obra','Descripcion de Obra'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	
	public static function catalogo_ocasiact($objhtml)
	{		
		$sql="select distinct  ocasiact.codcon as codigo, ocregcon.descon from ocasiact, ocregcon where ( ocasiact.codcon like '%V_0%' AND ocregcon.descon like '%V_1%') and ocasiact.codcon=ocregcon.codcon order by ocasiact.codcon asc";

		$catalogo = array(
		    $sql,
		    array('Codigo de Contrato','Descripcion de Contrato'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	
	public static function catalogo_cpdeftit($objhtml)
	{		
		$sql="select codpre as codigo, nompre as descripcion from cpdeftit where ( codpre like '%V_0%' AND nompre like '%V_1%') order by codpre";

		$catalogo = array(
		    $sql,
		    array('Código Presupuestario','Descripción Presupuestaria'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	
			
}
	

