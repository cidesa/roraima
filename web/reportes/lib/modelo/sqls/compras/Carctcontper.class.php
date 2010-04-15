<?php

require_once("../../lib/modelo/baseClases.class.php");


class Carctcontper extends baseClases
{


function sqlp($codorddes,$codordhas,$codprodes,$codprohas,$fechamin,$fechamax)
  {
  	  $sql="select
					to_char(c.fecrcp,'dd/mm/yyyy')	as fecha,
					a.ordcom as ordcom,
					b.nompro as nompro
		   from
					carcpart c, caordcom a left join caprovee b on a.codpro=b.codpro
	       where
					A.ORDCOM=C.ORDCOM AND
					A.ORDCOM >= ('".$codorddes."') AND
					A.ORDCOM <= ('".$codordhas."') AND
					A.CODPRO >= ('".$codprodes."') AND
					A.CODPRO <= ('".$codprohas."') AND
					A.FECORD >= to_date('".$fechamin."','dd/mm/yyyy') AND
					A.FECORD <= to_date('".$fechamax."','dd/mm/yyyy')
					ORDER BY A.ORDCOM
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

  function empresa()
{
	$sql = "select nomemp, diremp, tlfemp from empresa where codemp = '001'";
        return $this->select($sql);
}

}
?>