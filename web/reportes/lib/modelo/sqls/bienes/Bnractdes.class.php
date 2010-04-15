<?php

require_once("../../lib/modelo/baseClases.class.php");


class Bnractdes extends baseClases
{


function sqlp($coddisdes,$coddishas,$codubides,$codubihas,$codubides2,$codubihas2,$codbiemin,$codbiemax,$cod)
  {
  	  $sql="select
			a.codubiori as codubi,
			a.codubides as codubi2,
			b.desubi as desubi,
			c.desmue as desmue,
			c.marmue as marmue,
			c.sermue as sermue,
			c.codmue as codmue , substr(a.tipdismue,1,6) as tipo ,a.nrodismue as num
			from
			bndismue a , bnubibie b, bnregmue c
			where
			a.codubiori=b.codubi and
			a.codmue=c.codmue and
			TRIM(a.nrodismue ) >= RTRIM('".$coddisdes."') and
			RTRIM(a.nrodismue) <= RTRIM('".$coddishas."') and
			RTRIM(a.codubiori ) >= RTRIM('".$codubides."') and
			RTRIM(a.codubiori) <= RTRIM('".$codubihas."') and
			RTRIM(a.codubides ) >= RTRIM('".$codubides2."') and
			RTRIM(a.codubides) <= RTRIM('".$codubihas2."') and
			RTRIM(a.codmue)>= RTRIM('".$codbiemin."') and
			RTRIM(a.codmue)<= RTRIM ('".$codbiemax."')
			";
//print '<pre>';  print $sql; exit;
	return $this->select($sql);
  }




  function sqlp2($cod)
  {
  	  $sql="select desdis FROM bndisbie where coddis=RTRIM('".$cod."')";
//print '<pre>';  print $sql; exit;
	return $this->select($sql);
  }


  function sqlp3($cod)
  {
  	  $sql="select b.desubi as des from bndismue a , bnubibie b where a.codubides=b.codubi and  a.nrodismue=RTRIM('".$cod."')";
//print '<pre>';  print $sql; exit;
	return $this->select($sql);
  }

}
?>