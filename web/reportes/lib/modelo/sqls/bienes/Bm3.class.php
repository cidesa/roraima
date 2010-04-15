<?php
require_once("../../lib/modelo/baseClases.class.php");

class Bm3 extends baseClases
{
    function SQLp($ubiorides,$ubiorihas,$fecdes,$fechas,$codactmin,$codactmax, $codmuemin, $codmuemax,$coddisdes,$coddishas,$nrodismuemin,$nrodismuemax)
    {
    	$sql="select
    		 a.codubiori,
    		 a.codubides,
    		 c.desubi as desubiori,
    		 d.desubi as desubides,a.detdismue as detdismue,
    		 trim(a.codact) as codact,
    		 e.desdis,
    		 trim(a.codmue) as codmue,
    		generar_descripcion(A.CODMUE) as desmue,e.desinc as desinc,
    		 case when e.transpaso='N' then a.mondismue else 0 end as incorp,
    		 case when e.transpaso='S' then a.mondismue else 0 end as desinc, a.nrodismue as nro, substr(tipdismue,0,7) as tip
    		 from
    		 bndismue a left outer join bnregmue f on (a.codmue=f.codmue and a.codact=f.codact)
    		 left outer join bndefact b on(a.codact=b.codact)
    		 left outer join bnubibie c on(a.codubiori=c.codubi)
    		 left outer join bnubibie d on(a.codubides=d.codubi),
    		 bndisbie e
    		 where
    		 a.codubiori>='".$ubiorides."' and
    		 a.codubiori<='".$ubiorihas."' and
    		 a.codact>='".$codactmin."' and
    		 a.codact<='".$codactmax."' and
    		 a.codmue>='".$codmuemin."' and
    		 a.codmue<='".$codmuemax."' and
    		 substr(a.tipdismue,0,7)>='".$coddisdes."' and  substr(a.tipdismue,0,7)<='".$coddishas."' and
    		 a.nrodismue>='".$nrodismuemin."' and
    		 a.nrodismue<='".$nrodismuemax."' and
    		 a.fecdismue>=to_date('".$fecdes."','dd/mm/yyyy') and
    		 a.fecdismue<=to_date('".$fechas."','dd/mm/yyyy') and
    		 substring(a.tipdismue,0,7) = e.coddis
    		 order by a.codubiori, a.codubides, a.fecdismue, a.codact, a.codmue";
    	//H::printR($sql);exit;
    	return $this->select($sql);
    }


     function sqlestado($codubi)
	  {
        $sql="SELECT substr(a.codubi,1,2) as estado,(select desubi from bnubibie where codubi=substr(a.codubi,1,2)) as nomest,
        	substr(a.codubi,1,5) as munic,(select desubi from bnubibie where codubi=substr(a.codubi,1,5)) as nommun,
        	substr(a.codubi,1,8) as parrq,(select desubi from bnubibie where codubi=substr(a.codubi,1,8)) as nompar,
        	substr(a.codubi,1,12) as codunid,(select desubi from bnubibie where codubi=substr(a.codubi,1,12)) as nomunid,
        	a.codubi as codunit,desubi as nomunit,
        	dirubi
			FROM
			BNUBIBIE A
			WHERE
			(A.CODubi) = ('".$codubi."')";

	  	print $sql;exit;
	  	return $this->select($sql);}

	 function sqldatos()
	  {
	  	$sql = "select nomins, dirins, edoins, munins, paqins from bndefins where codins = '001'";
	  	return $this->select($sql);

	  }

	  	  function sqlp2($acodubi)
	  {
	  	$sql="select DESUBI, dirubi from BNUBIBIE where  RTRIM(CODUBI) ='".$acodubi."'";
	         //  print '<pre>'; print $sql; exit;
	  	return $this->select($sql);
	  }
 }
?>