<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tesoreria extends baseClases
{
/**
 *   REPORTE::tsrdisban.php
 *
 * */

 	public static function catalogo_numcue($objhtml)
	{
		$sql="SELECT distinct(numcue) as numcue, nomcue from tsdefban where ( numcue like '%V_0%' AND nomcue like '%V_1%' ) order by numcue";
		$catalogo = array(
		    $sql,
		    array('Nro. de Cuenta','Nombre Cuenta'),
		    array($objhtml),
		    array('numcue'),
		    100
		    );
	    return $catalogo;
	}


 	public static function catalogo_tipmov($objhtml)
	{
		$sql="SELECT DISTINCT(codtip) as codtip, destip FROM tstipmov  where ( codtip like '%V_0%' AND destip like '%V_1%' ) order by codtip";

		$catalogo = array(
		    $sql,
		    array('Código Tipo}','Descripción'),
		    array($objhtml),
		    array('codtip'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_reflib($objhtml)
	{
		$sql="SELECT DISTINCT(reflib) as reflib, deslib as CODIGO FROM tsmovlib where ( reflib like '%V_0%' AND deslib like '%V_1%' ) ORDER BY reflib";

		$catalogo = array(
		    $sql,
		    array('Referencia','Descripción'),
		    array($objhtml),
		    array('reflib'),
		    100
		    );

	    return $catalogo;
	}

    public static function catalogo_banco($objhtml)
	{
		$sql="SELECT distinct(nomcue) as nomcue from tsdefban order by nomcue";

		$catalogo = array(
		    $sql,
		    array('Nombre Banco'),
		    array($objhtml),
		    array('nomcue'),
		    100
		    );

	    return $catalogo;
	}

   public static function catalogo_origen($objhtml)
	{
		$sql="SELECT distinct(ctaori) as ctaori from tsmovtra order by ctaori";

		$catalogo = array(
		    $sql,
		    array('N° Cuenta Origen'),
		    array($objhtml),
		    array('ctaori'),
		    100
		    );

	    return $catalogo;
	}


	public static function catalogo_benefi($objhtml)
	{
		$sql="select distinct(cedrif) as cedrif, nomben from OPBENEFI where ( cedrif like '%V_0%' AND nomben like '%V_1%' ) order by cedrif";
		$catalogo = array(
		    $sql,
		    array('Ced/Rif','Nombre Beneficiario'),
		    array($objhtml),
		    array('cedrif'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_numordpag($objhtml)
	{
		$sql="SELECT distinct(numord) as numord FROM OPORDPAG where ( numord like '%V_0%') ORDER BY NUMORD";
		$catalogo = array(
		    $sql,
		    array('Num. de Orden'),
		    array($objhtml),
		    array('numord'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_numcue_tscheemi($objhtml)
	{
		$sql="SELECT distinct(a.numcue) as numcue, b.nomcue from tscheemi a,tsdefban b where trim(a.numcue)=trim(b.numcue) and ( a.numcue like '%V_0%' AND b.nomcue like '%V_1%' ) order by a.numcue";

		$catalogo = array(
		    $sql,
		    array('Nro. de Cuenta','Nombre Cuenta'),
		    array($objhtml),
		    array('numcue'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_numche_tscheemi($objhtml)
	{
		$sql="SELECT distinct(numche) as numche, fecemi from tscheemi where ( numche like '%V_0%' AND fecemi like '%V_1%' ) order by numche";

		$catalogo = array(
		    $sql,
		    array('Nro. de Cheque','Fecha Cheque'),
		    array($objhtml),
		    array('numche'),
		    100
		    );

	    return $catalogo;
	}


	public static function catalogo_tipdoc($objhtml)
	{
		$sql="SELECT distinct(tipdoc) as tipdoc from tscheemi where ( tipdoc like '%V_0%'  ) order by tipdoc";
		$catalogo = array(
		    $sql,
		    array('Tipo Documento'),
		    array($objhtml),
		    array('tipdoc'),
		    100
		    );

	    return $catalogo;
	}

	/**********PRUEBA*****************/
		public static function catalogo_codnom($objhtml)
	{
		$sql="select codnom, nomnom from npnomina where ( codnom like '%V_0%' and nomnom like '%V_1%'  ) order by codnom";
		$catalogo = array(
		    $sql,
		    array('Codigo de la Nomina','Nombre de la Nomina'),
		    array($objhtml),
		    array('codnom'),
		    100
		    );

	    return $catalogo;
	}

	/********************************/

	public static function catalogo_numfactura_opfactur($objhtml)
	{
		$sql="select numfac from opfactur where ( numfac like '%V_0%' ) order by numfac";
		$catalogo = array(
		    $sql,
		    array('Codigo de la Nomina','Nombre de la Nomina'),
		    array($objhtml),
		    array('codnom'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_benefi_opordpag($objhtml)
	{
		$sql="select distinct(a.cedrif) as cedrif, a.nomben from OPBENEFI a, OPORDPAG b where a.cedrif=b.cedrif and ( a.cedrif like '%V_0%' AND a.nomben like '%V_1%' ) order by a.cedrif";
		$catalogo = array(
		    $sql,
		    array('Ced/Rif','Nombre Beneficiario'),
		    array($objhtml),
		    array('cedrif'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_refmovcajchc($objhtml)
	{
		$sql="SELECT distinct(refsal) as codigo, dessal as nombre from tssalcaj where ( refsal like '%V_0%' AND dessal like '%V_1%' ) order by refsal";
		$catalogo = array(
		    $sql,
		    array('Referencia','Descripción'),
		    array($objhtml),
		    array('codigo','nombre'),
		    100
		    );
	    return $catalogo;
	}
		public static function catalogo_tscheemi_numche($objhtml)
	{
		$sql="SELECT distinct(a.numche) as cheques, a.numcue, b.nomcue from tscheemi a, tsdefban b where a.numcue=b.numcue and ( a.numche like '%V_0%' and a.numcue like '%V_1%' and b.nomcue  like '%V_2%' ) order by a.numche";

		$catalogo = array(
		    $sql,
		    array('Nro. de Cheques','Nro. Cuenta','Nombre Banco'),
		    array($objhtml),
		    array('cheques'),
		    2000
		    );

	    return $catalogo;
	}
	 	public static function catalogo_benche($objhtml)
	{
		$sql="SELECT distinct (trim(a.CEDRIF)) as cedrif, b.nomben FROM tscheemi a, opbenefi b where a.cedrif=b.cedrif and ( a.CEDRIF like '%V_0%') and ( b.nomben like '%V_1%')";

		$catalogo = array(
		    $sql,
		    array('Ced/Rif','Nombre '),
		    array($objhtml),
		    array('cedrif'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_cpimpprct($objhtml)
	{
		$sql="select distinct(a.codpre) as Codigo, b.nompre as Nombre from CPASIINI A,CPDEFTIT B  WHERE A.CODPRE = B.CODPRE  and ( a.codpre like '%V_0%' AND b.nompre like '%V_1%' ) order by a.codpre";

		$catalogo = array(
		    $sql,
		    array('Código Presupuestario','Descripcion de PreCompromiso'),
		    array($objhtml),
		    array('codigo'),
		    500
		    );

	    return $catalogo;
	}

}

