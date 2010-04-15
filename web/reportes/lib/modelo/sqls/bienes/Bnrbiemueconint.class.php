<?php

require_once("../../lib/modelo/baseClases.class.php");

class Bnrbiemueconint extends baseClases
{
	function sqlp($codactdes, $codacthas,$codmuedes,$codmuehas)
	  {
		$sql="SELECT
				a.codubi as acodubi,
				count(a.codact) as cant,
				c.desact,
				formatonum(a.valini) as valini, a.valini as valini2
				FROM
				BNREGMUE A,BNDEFACT C,
				BNUBIBIE B
				WHERE
				(A.CODUBI)  = (B.CODUBI) AND
				(A.CODACT)  = (C.CODACT) AND
				(A.CODACT) >= ('".$codactdes."') AND
				(A.CODACT) <= ('".$codacthas."') AND
				(A.CODMUE) >= ('".$codmuedes."') AND
				(A.CODMUE) <= ('".$codmuehas."')
			group by
				 a.codubi,a.codact,c.desact,
				(a.valini)
	";
	//print '<pre>'; print $sql;

	  	return $this->select($sql);
	  }
	 function sqlestado($codubi)
	  {
        $sql="SELECT substr(a.codubi,1,2) as estado,(select desubi from bnubibie where codubi=substr(a.codubi,1,2)) as nomest,
        	substr(a.codubi,1,5) as munic,(select desubi from bnubibie where codubi=substr(a.codubi,1,5)) as nommun,
        	substr(a.codubi,1,8) as parrq,(select desubi from bnubibie where codubi=substr(a.codubi,1,8)) as nompar,
        	substr(a.codubi,1,12) as codunid,(select desubi from bnubibie where codubi=substr(a.codubi,1,14)) as nomunid,
        	a.codubi as codunit,desubi as nomunit,
        	dirubi
			FROM
			BNUBIBIE A
			WHERE
			(A.CODubi) = ('".$codubi."')";
//print '<pre>'; print $sql;
	  	return $this->select($sql);
	  }

}
?>