<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nomina extends baseClases
{

/**
 *   REPORTES::nprnomdef.php y nprhisnomdef.php
 *
 * */

 	public static function catalogo_codemp($objhtml)
	{
		$sql="select distinct(codemp) as codemp,nomemp from npasicaremp where ( codemp like '%V_0%' AND nomemp like '%V_1%' ) order by codemp";

		$catalogo = array(
		    $sql,
		    array('Codigo Empleado','Nombre Empleado'),
		    array($objhtml),
		    array('codemp'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_codcar($objhtml)
	{
		$sql="SELECT distinct(CODcar),nomcar FROM NPASICAREMP  where ( codcar like '%V_0%' AND nomcar like '%V_1%' ) order by codcar";

		$catalogo = array(
		    $sql,
		    array('Codigo Cargo','Nombre Cargo'),
		    array($objhtml),
		    array('codcar'),
		    100
		    );

		return $catalogo;
	}

	public static function catalogo_codcon($objhtml)
	{
		$sql="SELECT distinct(CODCON)as codcon,NOMCON FROM NPASICONEMP where ( codcon like '%V_0%' AND nomcon like '%V_1%' ) order by CODCON";

		$catalogo = array(
		    $sql,
		    array('Codigo Concepto','Nombre Concepto'),
		    array($objhtml),
		    array('codcon'),
		    100
		    );

		return $catalogo;
	}

	public static function catalogo_codnom($objhtml)
	{
		$sql="SELECT distinct(CODNOM) as codnom,NOMNOM FROM NPASICAREMP where ( codnom like '%V_0%' AND nomnom like '%V_1%' ) order by CODNOM";

		$catalogo = array(
		    $sql,
		    array('Codigo Nomina','Nombre Nomina'),
		    array($objhtml),
		    array('codnom'),
		    100
		    );

		return $catalogo;
	}

	public static function catalogo_codnom1($objhtml)
	{
		$sql="SELECT distinct(a.CODNOM) as codnom,a.NOMNOM FROM npnomina a where ( a.codnom like '%V_0%' AND a.nomnom like '%V_1%' ) order by a.CODNOM ";

		$catalogo = array(
		    $sql,
		    array('Codigo Nomina','Nombre Nomina'),
		    array($objhtml),
		    array('codnom','nomnom'),
		    100
		    );

		return $catalogo;
	}

 ///////////////////////////////////////////////////////////
	public static function catalogo_codcat($objhtml)
	{
		$sql="select distinct rtrim(codcat) as codcat,nomcat from npcatpre order by rtrim(codcat)";

		$catalogo = array(
		    $sql,
		    array('Codigo Categoria','Nombre Categoria'),
		    array($objhtml),
		    array('codcat'),
		    100
		    );

		return $catalogo;
	}

    public static function catalogo_codniv($objhtml)
	{
		$sql="SELECT distinct(CODNIV) as Codigo, desniv as Descripcion FROM NPESTORG  where length(rtrim(codniv))=(SELECT MAX (LENGTH(CODNIV)) FROM NPESTORG) and (codniv like '%V_0%' and desniv like '%V_1%' ) ORDER BY CODNIV";

		$catalogo = array(
		    $sql,
		    array('Codigo Nivel','Descripción'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_tipnom($objhtml)
	{
		$sql="SELECT distinct(a.CODNOM) as codnom,a.NOMNOM FROM npnomina a order by a.codnom";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','nombre'),
		    100
		    );

	    return $catalogo;
	}



	public static function catalogo_tipnom_especial($objhtml)
	{
		$sql="SELECT distinct(a.CODNOMESP) as codigo, a.DESNOMESP as nombre FROM npnomesptipos a order by a.codnomesp";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','nombre'),
		    100
		    );

	    return $catalogo;
	}


    public static function catalogo_banco($objhtml)
	{
		$sql="SELECT DISTINCT(CODBAN) AS codigo, nomban as nombre FROM NPBANCOS where ( codban like '%V_0%' AND nomban like '%V_1%' ) ORDER BY CODBAN ASC";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','nombre'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_cuenta($objhtml)
	{
		$sql="SELECT DISTINCT(NUMCUE) AS codigo, nomcue as nombre FROM TSDEFBAN where ( numcue like '%V_0%' AND nomcue like '%V_1%' ) ORDER BY numcue ASC";

		$catalogo = array(
		    $sql,
		    array('Codigo','Nombre'),
		    array($objhtml),
		    array('codigo','nombre'),
		    100
		    );

	    return $catalogo;
	}

public static function catalogo_cedemp($objhtml)
	{
		$sql="select distinct(cedemp) as cedemp,nomemp from nphojint where ( cedemp like '%V_0%' AND nomemp like '%V_1%' ) order by cedemp";

		$catalogo = array(
		    $sql,
		    array('Cedula Empleado','Nombre Empleado'),
		    array($objhtml),
		    array('cedemp'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_tippre($objhtml)
	{
		$sql="SELECT distinct(a.codTIPPRE) as codtippre,a.destippre as nombre FROM nptippre a  order by a.codtippre ";

		$catalogo = array(
		    $sql,
		    array('Codigo Prestamo','Nombre Prestamo'),
		    array($objhtml),
		    array('codtippre','nombre'),
		    100
		    );

		return $catalogo;
	}

	 	public static function catalogo_Nphojint_codemp($objhtml)
	{
		$sql="select distinct(codemp) as codemp,nomemp from nphojint where ( codemp like '%V_0%' AND nomemp like '%V_1%' ) order by codemp";

		$catalogo = array(
		    $sql,
		    array('Codigo Empleado','Nombre Empleado'),
		    array($objhtml),
		    array('codemp'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_meses($objhtml)
	{
		$sql="select distinct(to_char(fecnac,'MM')) as mes from nphojint ORDER by mes";

		$catalogo = array(
		    $sql,
		    array('Mes'),
		    array($objhtml),
		    array('mes'),
		    100
		    );

	    return $catalogo;
	}

	public static function catalogo_dias($objhtml)
	{
		$sql="select distinct(to_char(fecnac,'DD')) as dia from nphojint ORDER by dia";

		$catalogo = array(
		    $sql,
		    array('Dia'),
		    array($objhtml),
		    array('dia'),
		    100
		    );

	    return $catalogo;
	}

   	public static function catalogo_codemph($objhtml)
	{
		$sql="select distinct(codemp) as codemp,nomemp from nphojint where ( codemp like '%V_0%' AND nomemp like '%V_1%' ) order by codemp";

		$catalogo = array(
		    $sql,
		    array('Codigo Empleado','Nombre Empleado'),
		    array($objhtml),
		    array('codemp'),
		    100
		    );

	    return $catalogo;
	}
  public static function catalogo_npnomina($objhtml)
  {
    $sql="select codnom, nomnom from npnomina
       where ( codnom like '%V_0%' AND nomnom like '%V_1%' ) order by codnom";


    $catalogo = array(
        $sql,
        array('Tipo de Nomina','Descripcion'),
        array($objhtml),
        array('codnom', 'nomnom'),
        100
        );

      return $catalogo;
  }
   public static function catalogo_npnominacodemp($objhtml)
  {
    $sql="select distinct(a.codemp) as codemp,a.nomemp from nphojint a, nphiscon b where ( a.codemp like '%V_0%' AND a.nomemp like '%V_1%' ) and a.codemp=b.codemp  order by a.codemp";

    $catalogo = array(
        $sql,
        array('Cedula Empleado','Nombre Empleado'),
        array($objhtml),
        array('codemp'),
        100
        );

      return $catalogo;
  }
     public static function catalogo_npnominacodcon($objhtml)
  {
    $sql="select codcon, nomcon from npdefcpt where ( codcon like '%V_0%' AND nomcon like '%V_1%' ) order by codcon";

    $catalogo = array(
        $sql,
        array('Concepto','Descripcion'),
        array($objhtml),
        array('codcon'),
        100
        );

      return $catalogo;
  }
       public static function catalogo_codempliq($objhtml)
  {
    $sql="select distinct (a.codemp) as codigo,b.nomemp as nombre from npliquidacion_det a,nphojint b where a.codemp=b.codemp and ( a.codemp like '%V_0%' AND b.nomemp like '%V_1%' ) order by a.codemp";

    $catalogo = array(
        $sql,
        array('Codigo Empleado','Nombre Empleado'),
        array($objhtml),
        array('codigo'),
        100
        );

      return $catalogo;
  }
	public static function catalogo_motliq($objhtml)
	{
		$sql="select desmotliq as nombre from npmotliq where ( desmotliq like '%V_0%' ) order by desmotliq";

		$catalogo = array(
		    $sql,
		    array('Nombre Motivo'),
		    array($objhtml),
		    array('nombre'),
		    100
		    );

	    return $catalogo;
	}
	public static function catalogo_codnivedu($objhtml)
	{
		$sql="select codniv as codniv, desniv from NPNIVEDU where ( codniv like '%V_0%' AND desniv like '%V_1%' ) order by codniv";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripción'),
		    array($objhtml),
		    array('codniv'),
		    100
		    );

	    return $catalogo;
	}

		public static function catalogo_codprofes($objhtml)
	{
		$sql="select codprofes as codprofes , desprofes from NPPROFESION where ( codprofes like '%V_0%' AND desprofes like '%V_1%') order by codprofes";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripción'),
		    array($objhtml),
		    array('codprofes'),
		    100
		    );

	    return $catalogo;
	}
			public static function catalogo_codtipapo($objhtml)
	{
		$sql="SELECT distinct CODTIPAPO as codigo ,DESTIPAPO as descripcion FROM NPTIPAPORTES  where ( CODTIPAPO like '%V_0%' AND DESTIPAPO like '%V_1%') order by CODTIPAPO";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripción'),
		    array($objhtml),
		    array('codigo'),
		    100
		    );

	    return $catalogo;
	}

				public static function catalogo_codtiket($objhtml)
	{
		$sql="SELECT distinct codcon, nomcon FROM NPASICONEMP  where nomcon like '%TICK%' and ( codcon like '%V_0%' AND nomcon like '%V_1%')  order by codcon";

		$catalogo = array(
		    $sql,
		    array('Codigo','Descripción'),
		    array($objhtml),
		    array('codcon'),
		    100
		    );

	    return $catalogo;
	}
}