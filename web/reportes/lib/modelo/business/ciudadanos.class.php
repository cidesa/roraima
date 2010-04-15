<?php
require_once("../../lib/modelo/baseClases.class.php");

class ciudadanos extends baseClases
{

/**
 *   REPORTES::nprnomdef.php y nprhisnomdef.php
 *
 * */



public static function catalogo_attipayu($objhtml)
	{
		$sql="select codayu as codigo, desayu as descripcion from attipayu where ( codayu like '%V_0%' AND desayu like '%V_1%') order by codayu";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n de la Donaci&oacute;n:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_attiproviv($objhtml)
	{
		$sql="select id as codigo, tipviv as descripcion from attipproviv where ( id like '%V_0%' AND tipviv like '%V_1%') order by id";
		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n de la Propiedad de Vivieda:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_atestado($objhtml)
	{
		$sql="select id as codigo,desest as descripcion from atestados where ( id like '%V_0%' AND desest like '%V_1%') order by id";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n del Estado:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );
	    return $catalogo;
	}
  public static function catalogo_attipviv($objhtml)
	{
		$sql="select id as codigo, tipviv as descripcion from attipviv where ( id like '%V_0%' AND tipviv like '%V_1%') order by id";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n de Vivienda:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_attiping($objhtml)
	{
		$sql="select id as codigo, tiping as descripcion from attiping where ( id like '%V_0%' AND tiping like '%V_1%') order by id";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n del Ingreso:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_atrelent($objhtml)
	{
		$sql="select nroexp as numero, desden as descripcion from atayudas where ( id like '%V_0%' AND desden like '%V_1%') order by id";
		$catalogo = array(
		    $sql,
		    array('N&uacute;mero Expediente:','Descripci&oacute;n de la Denuncia:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_atdenuncia($objhtml)
	{
		$sql="select id as codigo, desden as descripcion from atdenuncias where ( id like '%V_0%' AND desden like '%V_1%') order by id";
		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n de la Denuncia:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
		public static function catalogo_atreclamo($objhtml)
	{
		$sql="select id as codigo, desrec as descripcion from atreclamos where ( id like '%V_0%' AND desrec like '%V_1%') order by id";
		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n del Reclamo:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	//
	public static function catalogo_atdesfact($objhtml)
	{
		$sql="select a.nroexp as codigo,b.nomciu as nombreciu,c.nompro as nombrepro from atayudas a,atciudadano b,caprovee c where (a.nroexp like '%V_0%' and a.atbenefi=b.id and a.caprovee_id=c.id) order by a.nroexp";
		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Nombre del Proveedor','Nombre del Proveedor'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
public static function catalogo_atparroquia($objhtml)
	{
		$sql="select id as codigo,despar as descripcion from atparroquias where ( id like '%V_0%' AND despar like '%V_1%') order by id";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n de la Parroquia:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_ataudiencia($objhtml)
	{
		$sql="select  id as codigo,motaud as descripcion from ataudiencias where ( id like '%V_0%' AND motaud like '%V_1%') order by id";
		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n del la Audiencia:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_atmunicipio($objhtml)
	{
		$sql="select  id as codigo,desmun as descripcion from atmunicipios where ( id like '%V_0%' AND desmun like '%V_1%') order by id";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo','Descripci&oacute;n del Municipio:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_attrasoc($objhtml)
	{
		$sql="select  cedtra as codigo,nomtra as descripcion from attrasoc where ( cedtra like '%V_0%' AND montra like '%V_1%') order by cedtra";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo','Nombre de la Trabajadora Social'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
public static function catalogo_codayu($objhtml)
	{
		$sql="select a.codpre as codigo, b.nompre as descripcion from attipayu a left outer join cpdeftit b on (a.codpre=b.codpre) where ( codayu like '%V_0%' AND desayu like '%V_1%') order by a.codayu";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo Presupuestario:','Descripci&oacute;n:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_atrecaud($objhtml)
	{
		$sql="select codrec as codigo, desrec as descripcion from atrecaud where ( codrec like '%V_0%' AND desrec like '%V_1%') order by codrec";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n del Recaudo:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
public static function catalogo_atunidades($objhtml)
	{
		$sql="select coduni as codigo, desuni as descripcion from atunidades where ( coduni like '%V_0%' AND desuni like '%V_1%') order by coduni";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n de la unidad:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

public static function catalogo_atdonaciones($objhtml)
	{
		$sql="select coddon as codigo, desdon as descripcion from atdonaciones where ( coddon like '%V_0%' AND desdon like '%V_1%') order by coddon";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo','Descripci&oacute;n de la Donaci&oacute;n:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

public static function catalogo_atgrudon($objhtml)
	{
		$sql="select id as codigo, desgru as descripcion from atgrudon where ( desgru like '%V_1%') order by id";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo:','Descripci&oacute;n del Grupo:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
//-----------------AMANDA PARA EL ACTA------------------------------------------------------------------------------------------------------------
	 public static function catalogo_atayudas($objhtml)
	{
		$sql="select a.nroexp as Codigo , b.cedciu||'-'||b.nomciu as Beneficiario from atayudas a , atciudadano b where a.atbenefi=b.id and ( a.nroexp like '%V_0%' and b.cedciu like '%V_1%') order by nroexp";
		//$sql="select a.nroexp as Expediente , b.cedciu||'-'||b.nomciu as Beneficiario from atayudas a , atciudadano b where a.atbenefi=b.id and ( a.nroexp like '%V_0%' and b.cedciu like '%V_1%') order by nroexp";

		$catalogo = array(
		    $sql,
		    array('C&oacute;digo','Beneficiario:'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_atrubros($objhtml)
	{
		$sql="select desrub as descripcion from atrubros where ( desrub like '%V_0%') order by desrub";

		$catalogo = array(
		    $sql,
		    array('Descripci&oacute;n del Rubro'),
		    array($objhtml),
		    array('descripcion'),
		    100
		    );

	    return $catalogo;
	}
}