<?php
require_once("../../lib/modelo/baseClases.class.php");

class Bm4 extends baseClases
{
    function SQLp($ubiorides,$ubiorihas,$ubidesdes,$ubideshas,$fecdes,$fechas)
    {
    	$sql="select
    		 a.codubiori,
    		 a.codubides,
    		 c.desubi as desubiori,
    		 d.desubi as desubides,
    		 trim(a.codact) as codact,
    		 trim(a.codmue) as codmue,
    		 trim(a.motdismue) as motdismue,
    		 a.tipdismue,
    		 case when e.desinc='N' then formatonum(a.mondismue) else formatonum(0) end as incorp,
    		 case when e.desinc='S' then formatonum(a.mondismue) else formatonum(0) end as desinc
    		 from
    		 bndismue a
    		 left outer join bndefact b on(a.codact=b.codact)
    		 left outer join bnubibie c on(a.codubiori=c.codubi)
    		 left outer join bnubibie d on(a.codubides=d.codubi),
    		 bndisbie e
    		 where
    		 a.codubiori>='".$ubiorides."' and
    		 a.codubiori<='".$ubiorihas."' and
    		 a.codubides>='".$ubidesdes."' and
    		 a.codubides<='".$ubideshas."' and
    		 a.fecdismue>=to_date('".$fecdes."','dd/mm/yyyy') and
    		 a.fecdismue<=to_date('".$fechas."','dd/mm/yyyy') and
    		 a.tipdismue = e.coddis
    		 order by a.codubiori, a.codubides, a.fecdismue, a.codact, a.codmue";
      	print $sql;exit;
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

	  	//print $sql;exit;
	  	return $this->select($sql);
	  }


	 function sqldatos()
	  {
	  	$sql = "select nomins, dirins, edoins, munins, paqins from bndefins where codins = '001'";
	  	return $this->select($sql);

	  }
 }
?>