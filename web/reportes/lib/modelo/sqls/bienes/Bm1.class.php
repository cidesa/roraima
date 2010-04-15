<?php
require_once("../../lib/modelo/baseClases.class.php");

class Bm1 extends baseClases
{

    function SQLp($ubides,$ubihas)
    {
    	$sql="select
    		  a.codubi as codubi,
    		  trim(a.codact),
    		  trim(a.codmue),
    		  '1' as cantidad,
    		  a.desmue,
    		  '' as cond,
    		  formatonum(a.valini) as valest,
    		  formatonum(a.valini) as valtot
    		  from
    		  bnregmue a
    		  left outer join bndefact b on(a.codact=b.codact),
    		  bnubibie c
    		  where
    		  a.codubi>='".$ubides."' and
    		  a.codubi<='".$ubihas."' and
    		  a.codubi=c.codubi
    		  order by a.codubi, a. codact, a.codmue";
       // print $sql;exit;
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

	  	return $this->select($sql);
	  }
	      function sqlestado2($codubi)
	  {
        $sql="select (select desubi from bnubibie where codubi=substr(a.codubi,1,12)) as nomunid, desubi as nomunit , dirubi from BNUBIBIE where length(codubi)=14	and		(A.CODubi) = ('".$codubi."')";

	  	return $this->select($sql);
	  }
 }
?>