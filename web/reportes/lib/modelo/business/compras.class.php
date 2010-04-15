<?php
require_once("../../lib/modelo/baseClases.class.php");

class Compras extends baseClases
{

 	public static function catalogo_codart($objhtml)
	{
	 $sql="select distinct(codart) as codart, desart  from caregart where length(trim(codart))=(select (length(trim( forart))) from cadefart) and ( codart like '%V_0%' AND desart like '%V_1%' ) order by codart ";

		$catalogo = array(
		    $sql,
		    array('Codigo Del Articulo','Descripción'),
		    array($objhtml),
		    array('codart'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_codartg($objhtml)
	{
	 $sql="select distinct(codart) as codart, desart  from caregart where ( codart like '%V_0%' AND desart like '%V_1%' ) order by codart ";

		$catalogo = array(
		    $sql,
		    array('Codigo Del Articulo','Descripción'),
		    array($objhtml),
		    array('codart'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_existencia($objhtml)
	{
	 $sql="SELECT distinct(exitot) as exitot FROM CAREGART order by exitot ";

		$catalogo = array(
		    $sql,
		    array('Existencia'),
		    array($objhtml),
		    array('exitot'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_codartd($objhtml)
	{
	 $sql="select distinct(a.codart) as codart, b.desart as desart  from caartdph a, caregart b where a.codart=b.codart and ( codart like '%V_0%' AND desart like '%V_1%' ) order by codart ";

		$catalogo = array(
		    $sql,
		    array('Codigo Del Articulo','Descripción'),
		    array($objhtml),
		    array('codart'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_coddes($objhtml)
	{
	 $sql="select distinct(a.dphart) as dphart, b.desdph as desdph  from caartdph a, dphart b where a.dphart=b.dphart and ( dphart like '%V_0%' AND desdph like '%V_1%' ) order by dphart ";


 		$catalogo = array(
		    $sql,
		    array('Codigo Del Articulo','Descripción'),
		    array($objhtml),
		    array('codart'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_rcpart($objhtml)
	{
	 $sql="SELECT distinct(rcpart) as rcpart, desrcp from carcpart where ( rcpart like '%V_0%' AND desrcp like '%V_1%' ) order by rcpart ";

		$catalogo = array(
		    $sql,
		    array('Codigo de Nota de Recepción','Descripción'),
		    array($objhtml),
		    array('rcpart'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_codpro($objhtml)
	{
	 $sql="select distinct(a.codpro) as codpro, b.nompro as nompro from carcpart a, caprovee b where (a.codpro=b.codpro) and (a.codpro like '%V_0%' AND b.nompro like '%V_1%') order by codpro ";

 		$catalogo = array(
		    $sql,
		    array('Codigo Del Proveedor','Descripción'),
		    array($objhtml),
		    array('codpro'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_codartr($objhtml)
	{
	 $sql="select distinct(a.codart) as codart, b.desart as desart  from caartrcp a, caregart b where a.codart=b.codart and ( a.codart like '%V_0%' AND b.desart like '%V_1%' ) order by codart ";

		$catalogo = array(
		    $sql,
		    array('Codigo Del Articulo','Descripción'),
		    array($objhtml),
		    array('codart'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_caordcom($objhtml)
	{
		$sql="Select distinct(ordcom) as ordcom, desord from caordcom where ordcom like 'OC%' and ( ordcom like '%V_0%' AND desord like '%V_1%' ) order by ordcom";

		$catalogo = array(
		    $sql,
		    array('Codigo de Compra','Descripción'),
		    array($objhtml),
		    array('ordcom'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_caordser($objhtml)
	{
		$sql="Select distinct(ordcom) as ordcom, desord from caordcom where ordcom like 'OS%' and ( ordcom like '%V_0%' AND desord like '%V_1%' ) order by ordcom";

		$catalogo = array(
		    $sql,
		    array('Codigo de Servicio','Descripción'),
		    array($objhtml),
		    array('ordcom'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_caprovee($objhtml)
	{
	 $sql="select a.rifpro as rifpro, a.nompro as nompro from caprovee a where  (a.rifpro like '%V_0%' AND a.nompro like '%V_1%') order by a.rifpro   ";

 		$catalogo = array(
		    $sql,
		    array('RIF Del Proveedor','Nombre Proveedor'),
		    array($objhtml),
		    array('rifpro'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_casolart($objhtml)
	{
		$sql="SELECT DISTINCT(REQART) as codigo, desreq as Descripcion FROM CASOLART where  REQART like '%V_0%' and desreq like '%V_1%' order by REQART";

		$catalogo = array(
		    $sql,
		    array('Codigo de Requisicion','Descripcion'),
		    array($objhtml),
		    array('codigo'),
		    450
		    );

	    return $catalogo;
	}

	public static function catalogo_codalm($objhtml)
	{
	 $sql="select distinct(codalm) as codalm, nomalm  from cadefalm where ( codalm like '%V_0%' AND nomalm like '%V_1%' ) order by codalm ";

		$catalogo = array(
		    $sql,
		    array('Codigo Del Almacen','Nombre'),
		    array($objhtml),
		    array('codalm'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_refcot($objhtml)
	{
	 	$sql="select distinct(refcot) as refcot, descot FROM cacotiza";

		$catalogo = array(
		    $sql,
		    array('Numero de Cotiza','Descripción'),
		    array($objhtml),
		    array('refcot'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_caordcom_ordcom($objhtml)
	{
	 $sql="select (a.ordcom) as ordcom, to_char(a.fecord,'dd/mm/yyyy') as fecord   from carcpart c, caordcom a left join caprovee b on a.codpro=b.codpro  where A.ORDCOM=C.ORDCOM and (a.ordcom like '%V_0%' AND a.fecord like '%V_1%') order by a.ordcom ";

 		$catalogo = array(
		    $sql,
		    array('N° Orden','Fecha Orden'),
		    array($objhtml),
		    array('ordcom'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_caordcom_rifpro($objhtml)
	{
	 $sql="select distinct(a.codpro) as codpro, a.nompro as nompro from caprovee a, caordcom b where (a.codpro=b.codpro) and (a.codpro like '%V_0%' AND a.nompro like '%V_1%') order by a.codpro ";

 		$catalogo = array(
		    $sql,
		    array('Cod Del Proveedor','Nombre Proveedor'),
		    array($objhtml),
		    array('codpro'),
		    100
		    );

	    return $catalogo;
	}
		public static function catalogo_coddes2($objhtml)
	{
	 $sql="select distinct(a.dphart) as codigo, b.desdph as descripcion  from caartdph a, cadphart b where a.dphart=b.dphart and ( a.dphart like '%V_0%' AND b.desdph like '%V_1%' )  order by a.dphart  ";

		$catalogo = array(
		    $sql,
		    array('Codigo Del Despacho','Descripción'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_codartd2($objhtml)
	{
	 $sql="select distinct(a.codart) as codigo, b.desart as descripcion  from caartdph a, caregart b where a.codart=b.codart and ( a.codart like '%V_0%' AND b.desart like '%V_1%' )  order by a.codart ";

		$catalogo = array(
		    $sql,
		    array('Codigo Del Articulo','Descripción'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}


	public static function catalogo_codsal($objhtml)
	{
	 $sql="select distinct(codsal) as numero, dessal as descripcion  from casalalm where ( codsal like '%V_0%' AND upper(dessal) like '%V_1%' ) order by codsal ";

		$catalogo = array(
		    $sql,
		    array('Número de Salida','Descripción'),
		    array($objhtml),
		    array('numero'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_codprosal($objhtml)
	{
	 $sql="select distinct(codpro) as codigo, nompro as nombre  from caprovee  where ( codpro like '%V_0%' AND upper(nompro) like '%V_1%' )order by codpro ";

		$catalogo = array(
		    $sql,
		    array('Código del Proveedor','Nombre del Proveedor'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_ramart($objhtml)
	{
	 $sql="select distinct(ramart) as codigo, nomram as descripcion  from caramart  where ( ramart like '%V_0%' AND upper(nomram) like '%V_1%' )order by ramart ";

		$catalogo = array(
		    $sql,
		    array('Código del Ramo','Descripción'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_codent($objhtml)
	{
	 $sql="select distinct(rcpart) as numero, desrcp as descripcion  from caentalm where ( rcpart like '%V_0%' AND upper(desrcp) like '%V_1%' ) order by rcpart";

		$catalogo = array(
		    $sql,
		    array('Número de Entrada','Descripción'),
		    array($objhtml),
		    array('numero'),
		    100
		    );

	    return $catalogo;
	}


}
