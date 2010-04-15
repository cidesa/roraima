<?php
require_once("../../lib/modelo/baseClases.class.php");

class Presupuesto extends baseClases
{
  public static function catalogo_codprePrerasiini($objhtml,$orden)
  {
    if ($orden=='A')
    {$sql="select codpre,nompre from cpdeftit where ( codpre like '%V_0%' AND nompre like '%V_1%' ) order by codpre";}
    else { $sql="select codpre,nompre from cpdeftit where ( codpre like '%V_0%' AND nompre like '%V_1%' ) order by codpre desc";}

    $catalogo = array(
        $sql,
        array('Código Presupuestario','Nombre'),
        array($objhtml),
        array('codpre'),
        250
        );

      return $catalogo;
  }


	public static function catalogo_codprePredisper($objhtml,$orden)
	{
	  if ($orden=='A')
      {$sql="select b.codpre as codpre, b.nompre as nompre from cpasiini a, cpdeftit b where a.perpre='00' and a.codpre=b.codpre and ( b.codpre like '%V_0%' AND b.nompre like '%V_1%' )order by codpre";}
	  else { $sql="select b.codpre as codpre, b.nompre as nompre from cpasiini a, cpdeftit b where a.perpre='00' and a.codpre=b.codpre and ( b.codpre like '%V_0%' AND b.nompre like '%V_1%' )order by codpre desc";}

	  $catalogo = array(
		    $sql,
		    array('Código Presupuestario','Nombre'),
		    array($objhtml),
		    array('codpre'),
		    100
		    );

	    return $catalogo;
	}


public static function catalogo_cpcausad($objhtml)
	{ $sql="select  compromiso, descripcion from(
	  select distinct(a.refcau ) as compromiso,a.descau as descripcion from cpcausad a ,cpdoccau b where a.tipcau=b.tipcau and b.afecau<>'N'
	  union
	  select distinct(a.refpag) as compromiso ,a.despag as descripcion from cppagos a, cpdocpag b where a.tippag=b.tippag and b.afecau<>'N') as j
	  where (compromiso like '%V_0%' and descripcion like '%V_1%' )
	  order by 1";

		$catalogo = array(
		    $sql,
		    array('Código de Causado','Descripcion del Causado'),
		    array($objhtml),
		    array('compromiso'),
		    500
		    );

	    return $catalogo;
	}

 	public static function catalogo_cpcompro($objhtml)
	{ $sql="select  compromiso, descripcion from(
	  select distinct(a.refcom ) as compromiso, a.descom as descripcion from cpcompro a,cpdoccom b where a.tipcom=b.tipcom and b.afecom<>'N'
	  union
	  select distinct(a.refcau ) as compromiso,a.descau as descripcion from cpcausad a ,cpdoccau b where a.tipcau=b.tipcau and b.afecom<>'N'
	  union
	  select distinct(a.refpag) as compromiso ,a.despag as descripcion from cppagos a, cpdocpag b where a.tippag=b.tippag and b.afecom<>'N') as j
	  where (compromiso like '%V_0%' and descripcion like '%V_1%' )
	  order by 1";

		$catalogo = array(
		    $sql,
		    array('Código de Compromiso','Descripcion de Compromiso'),
		    array($objhtml),
		    array('compromiso'),
		    500
		    );

	    return $catalogo;
	}

	public static function catalogo_cppertra($objhtml)
	{
		$sql="SELECT DISTINCT(PERTRA) as Periodo, destra as Descripcion FROM CPTRASLA where (pertra like '%V_0%' AND destra like '%V_1%' ) order by pertra asc";

		$catalogo = array(
		    $sql,
		    array('Código de Traslado','Descripcion de Traslado'),
		    array($objhtml),
		    array('Traslado'),
		    500
		    );

	    return $catalogo;
	}


	public static function catalogo_cptrasla($objhtml)
	{
		$sql="select distinct(reftra) as Traslado, destra as Descripcion from cptrasla where (reftra like '%V_0%' AND destra like '%V_1%' ) order by reftra asc";

		$catalogo = array(
		    $sql,
		    array('Código de Traslado','Descripcion de Traslado'),
		    array($objhtml),
		    array('Traslado'),
		    500
		    );

	    return $catalogo;
	}


 	public static function catalogo_cppagos($objhtml)
	{
		$sql="select distinct(refpag) as refpag, despag from cppagos where ( refpag like '%V_0%' AND despag like '%V_1%' ) order by refpag asc";

		$catalogo = array(
		    $sql,
		    array('Código de Pagado','Descripcion de Pagado'),
		    array($objhtml),
		    array('refpag'),
		    500
		    );

	    return $catalogo;
	}



public static function catalogo_cpdoccom($objhtml)
	{
	$sql="select tipo, nombre from (select distinct(tipcom) as tipo, upper(rtrim(nomabr)) as nombre from cpdoccom
	union select distinct(tipcau) as tipo, upper(rtrim(nomabr)) as nombre from cpdoccau where afecom<>'N'
	union select distinct(tippag) as tipo, upper(rtrim(nomabr)) as nombre from cpdocpag where afecom<>'N') as j where (j.tipo like '%V_0%' and nombre like '%V_1%' ) order by 1";
		$catalogo = array(
		    $sql,
		    array('Código de Tipo','Descripcion de Tipo'),
		    array($objhtml),
		    array('tipo'),
		    500
		    );

	    return $catalogo;
	}
	public static function catalogo_cpdocpag($objhtml)
	{
	$sql="select tipo, nombre from (select distinct(tippag) as tipo, upper(rtrim(nomabr)) as nombre from cpdocpag where afepag<>'N') as j where (j.tipo like '%V_0%' and nombre like '%V_1%' ) order by 1";
		$catalogo = array(
		    $sql,
		    array('Código de Tipo','Descripcion de Tipo'),
		    array($objhtml),
		    array('tipo'),
		    500
		    );

	    return $catalogo;
	}
	public static function catalogo_cpdoccau($objhtml)
	{
	$sql="select tipo, nombre from (select distinct(tipcau) as tipo, upper(rtrim(nomabr)) as nombre from cpdoccau where afecau<>'N'
	union select distinct(tippag) as tipo, upper(rtrim(nomabr)) as nombre from cpdocpag where afeprc='S') as j where (j.tipo like '%V_0%' and nombre like '%V_1%' ) order by 1";
		$catalogo = array(
		    $sql,
		    array('Código de Tipo','Descripcion de Tipo'),
		    array($objhtml),
		    array('tipo'),
		    500
		    );

	    return $catalogo;
	}

 	public static function catalogo_cpdocprc($objhtml)
	{
	$sql="select tipo, nombre from (select distinct(tipprc) as tipo, upper(rtrim(nomabr)) as nombre from cpdocprc
	union select distinct(tipcom) as tipo, upper(rtrim(nomabr)) as nombre from cpdoccom
	union select distinct(tipcau) as tipo, upper(rtrim(nomabr)) as nombre from cpdoccau where afeprc='S'
	union select distinct(tippag) as tipo, upper(rtrim(nomabr)) as nombre from cpdocpag where afeprc='S') as j where (j.tipo like '%V_0%' and nombre like '%V_1%' ) order by 1";
		$catalogo = array(
		    $sql,
		    array('Código de Tipo','Descripcion de Tipo'),
		    array($objhtml),
		    array('tipo'),
		    500
		    );

	    return $catalogo;
	}

 	public static function catalogo_cpprecom($objhtml)
	{ $sql="select  compromiso, descripcion from(
	  select distinct(a.refprc) as compromiso, a.desprc  as descripcion from cpprecom a,cpdocprc b where a.tipprc=b.tipprc
	  union
	  select distinct(a.refcom ) as compromiso, a.descom as descripcion from cpcompro a,cpdoccom b where a.tipcom=b.tipcom and b.afeprc='S'
	  union
	  select distinct(a.refcau ) as compromiso,a.descau as descripcion from cpcausad a ,cpdoccau b where a.tipcau=b.tipcau and b.afeprc='S'
	  union
	  select distinct(a.refpag) as compromiso ,a.despag as descripcion from cppagos a, cpdocpag b where a.tippag=b.tippag and b.afeprc='S') as j
	  where (compromiso like '%V_0%' and descripcion like '%V_1%' )
	  order by 1";

		$catalogo = array(
		    $sql,
		    array('Código de PreCompromiso','Descripcion de PreCompromiso'),
		    array($objhtml),
		    array('compromiso'),
		    500
		    );

	    return $catalogo;
	}

public static function catalogo_cpimpprc($objhtml)
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
	public static function catalogo_cpimpcom($objhtml)
	{

		$sql="select distinct(a.codpre) as Codigo, b.nompre as Nombre from CPIMPCOM A,CPDEFTIT B  WHERE A.CODPRE = B.CODPRE  and ( a.codpre like '%V_0%' AND b.nompre like '%V_1%' ) order by a.codpre";

		$catalogo = array(
		    $sql,
		    array('Código Presupuestario','Descripcion del Compromiso'),
		    array($objhtml),
		    array('codigo'),
		    500
		    );

	    return $catalogo;
	}




	public static function catalogo_numcom($objhtml)
		{
			//$sql="select * from cpniveles";

			/*
			 * SUBSTR(H.CODPRE,1,2) as SECTOR,
SUBSTR(H.CODPRE,4,2) as PROGRAMA,
SUBSTR(H.CODPRE,7,1) as SUBPROG,
SUBSTR(H.CODPRE,9,1) as PROYECTO,
SUBSTR(H.CODPRE,11,2) as ACTIVIDAD,
SUBSTR(H.CODPRE,14,3) as PARTIDA,
SUBSTR(H.CODPRE,18,2) as GENERICA,
SUBSTR(H.CODPRE,21,2) as ESPECIFICA,
SUBSTR(H.CODPRE,24,2) as SUBESPEC,
SUBSTR(H.CODPRE,27,2) as ADICIONAL,
			 * */
			//$sql="and  ( a.codcta like '%V_0%' and b.descta like '%V_1%') order by a.codcta";

			$sql="select * from cpniveles";
			$rs = $this->select($sql);
			$i=1;
			foreach($rs as $rsdatos)
			{
				$inicio = 1;
				$lon    = $rsdatos["lonniv"];
				$nombre = $rsdatos["nomext"];
				//print $sql=$inicio.",".$lon." as ".$nombre,$lon+$i." as ".$nombre;
				//$sql="substr(codpre)";
			}

		   // return $catalogo;
		}


	function ObtenerCodPreporNiveles($alias='B')
    {
    	$sql="select
    		  nomabr as nomabr,
    		  lonniv as lonniv
    		  from cpniveles as ".$alias." order by consec";

		$arrniveles=$this->select($sql);
	    $a=0;
		$acupos=1;
		$cadena="";
		while ($a<count($arrniveles))
		{
		  if ($a==0) $pripos=1;  else $pripos=$acupos;
		  $acupos=$acupos+$arrniveles[$a]['lonniv']+1;
	      $cadena=$cadena." substr(".$alias.".CODPRE,".$pripos.",".$arrniveles[$a]['lonniv'].") as ".$arrniveles[$a]['nomabr'].",";
	      $a++;
		}
		$cadena=substr($cadena,0,strlen($cadena)-1);
		return $cadena;
    }


	function ObtenerNombCodpreporNiveles($alias='B',$codigo)
    {
    	$sql="SELECT
    		  nomabr as nomabr,
    		  lonniv as lonniv
    		  FROM CPNIVELES as ".$alias." ORDER BY CONSEC";

		$arrniveles=$this->select($sql);

        $a = 1;
//		echo $codigo."<br>";
		$cuantos = substr_count($codigo,"-");;

			foreach($arrniveles as $arr)
			{
				//for($a=1;$a<$cuantos;$a++)
				//{
				if ($a<=$cuantos+1)
				{
			        if ($a==1){
			  	       $sum_lonniv = $arr["lonniv"];
			  	       $cadena="select ".$alias.".nompre from cpdeftit as ".$alias." where  ";
			  	       $sql1="codpre="."substr('".$codigo."',1,".$arr["lonniv"].")";
			           $sql=$cadena.$sql1;
			           //echo $sql."<br>";
			           $codigopre[]=$this->select($sql);

			         }else{
			         	$sum_lonniv = $sum_lonniv + $arr["lonniv"];
			         	$sql1=$cadena.$sql1."-"."substr('".$codigo."',".$sum_lonniv.",".$arr["lonniv"].")";
			         //	echo $sql1."<br>";
						$codigopre[]=$this->select($sql1);
			           //$sum_lonniv = $sum_lonniv + $arr["lonniv"];
			           //($codigo, $sum_lonniv, $arr["lonniv"]);

			         }
		    //break;
			$a++;
				}else{  break; }
			}
		return $codigopre;
    }

	function ObtenerNombCodpreporNiveles1($alias='B',$codigo)
    {
    	$sql="SELECT
    		  nomabr as nomabr,
    		  lonniv as lonniv
    		  FROM CPNIVELES as ".$alias." ORDER BY CONSEC";

		$arrniveles=$this->select($sql);
		//H::printR($arrniveles);
	    $a=0;
		$acupos=1;
		$cadena="";
		$cadena2="";
		//echo $codigo."<br>";
		$cuantos = H::instr($codigo,'-',0,1);
		//$cuantos = split($codigo,'-');
		//echo count($cuantos);
		while ($a<$cuantos)
		{
		  $sql="";
		  if ($a==0){
		  	  $cadena="select ".$alias.".nompre from cpdeftit as ".$alias." where  ";
			  $cadena2=$alias.".codpre="."substr('".$codigo."',1,".$arrniveles[$a]['lonniv'].")";
		  	  $sql=$cadena.$cadena2;
		      //$pripos=1;
		      $codigopre[]=$this->select($sql);

		      //$cadena='';

		  }else
		  {
		  		$pripos=$acupos;

		 // $acupos=$acupos+$arrniveles[$a]['lonniv']+1;
		  $acupos = $acupos + $arrniveles[$a]['lonniv'];
		  //$acuant=$acuant+$arrniveles[$a]['lonniv']-1;

	      //$sql=$cadena.$alias.".codpre=substr('".$codigo."',1,".$arrniveles[$a]['lonniv'].")||'".'-'."'||substr('".$codigo."',".$acupos.",".$arrniveles[$a]['lonniv'].")";
	      $sql=$cadena2."||'".'-'."'||substr('".$codigo."',1,".$arrniveles[$a]['lonniv'].")||'".'-'."'||substr('".$codigo."',".$acupos.",".$arrniveles[$a]['lonniv'].")";
	    //  echo $sql."<br>";
	     //  $codigopre[]=$this->select($sql);


		  }

	      $a++;
		}
		//$cadena=substr($cadena,0,strlen($cadena)-1);
		return $codigopre;
    }
	function ObtenerArregloCodPreporNiveles()
    {
    	//$this->bd=new basedatosAdo();
    	$sql="SELECT
    		  nomabr as nomabr,
    		  lonniv as lonniv
    		  FROM CPNIVELES as A ORDER BY consec";

		$arrniveles=$this->select($sql);
	    $a=0;

		$arre = array();
		foreach($arrniveles as $an)
		{
		  $arre[] = $an['lonniv'];
		}
		return $arre;
    }

   	public static function catalogo_cpprecom2($objhtml)
	{
		$sql="SELECT DISTINCT(refprc) as referencia, desprc as Descripcion FROM cpprecom where (refprc like '%V_0%' AND desprc like '%V_1%' ) order by refprc";

		$catalogo = array(
		    $sql,
		    array('Referencia del Precompromiso','Descripcion del Precompromiso'),
		    array($objhtml),
		    array('referencia'),
		    500
		    );

	    return $catalogo;
	}
}
?>