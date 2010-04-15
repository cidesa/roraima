<?php

require_once("../../lib/modelo/baseClases.class.php");

class Bnrrescuebie extends baseClases
{
	function sqlp($codubides,$codubihas,$codmuedes,$codmuehas,$codinmdes,$codinmhas,$fecdes,$fechas,$fecdesinm,$fechasinm)
	  {
        /*$sql="SELECT distinct
	 			a.codubi as acodubi,'M' as tipo,
				sum(case when c.desinc ='S' then b.mondismue else 0 end) as des,
				sum(case when c.desinc ='N' then b.mondismue else 0 end) as inc,
				d.desubi
			FROM
				BNREGMUE A,
				BNDISMUE B,
				BNDISBIE C,
				BNUBIBIE D
			WHERE
				(A.CODubi) >= rpad('".$codubides."',30,' ') AND
				(A.CODubi) <= rpad('".$codubihas."',30,' ') AND
				(A.CODMUE) >= rpad('".$codmuedes."',20,' ') AND
				(A.CODMUE) <= rpad('".$codmuehas."',20,' ') AND
				to_date(RTRIM(A.FECCOM),'yyyy-mm-dd') >= to_date(RTRIM('".$fecdes."'),'dd/mm/yyyy') AND
				to_date(RTRIM(A.FECCOM),'yyyy-mm-dd') <= to_date(RTRIM('".$fechas."'),'dd/mm/yyyy') AND
				(A.CODACT)=(B.CODACT) and
			    (A.CODMUE)=(B.CODMUE) and
			    (A.CODUBI)=(D.CODUBI) and
			    trim(substr(b.tipdismue,1,6))=trim(c.coddis)
			    group by a.codubi,d.desubi
			UNION
			    SELECT distinct
	 			a.codubi as acodubi, 'I' as tipo,
				0 as des,
				0 as inc,
				d.desubi
			FROM
				BNREGINM A,
				BNDISINM B,
				BNUBIBIE D
			WHERE
				(A.CODubi) >= rpad('".$codubides."',30,' ') AND
				(A.CODubi) <= rpad('".$codubihas."',30,' ') AND
				(A.CODINM) >= rpad('".$codinmdes."',20,' ') AND
				(A.CODINM) <= rpad('".$codinmhas."',20,' ') AND
				to_date(RTRIM(A.FECCOM),'yyyy-mm-dd') >= to_date(RTRIM('".$fecdesinm."'),'dd/mm/yyyy') AND
				to_date(RTRIM(A.FECCOM),'yyyy-mm-dd') <= to_date(RTRIM('".$fechasinm."'),'dd/mm/yyyy') AND
				(A.CODACT)=(B.CODACT) and
			    (A.CODINM)=(B.CODMUE) and
			    (A.CODUBI)=(D.CODUBI)
			    group by a.codubi,d.desubi

			 order by tipo
	";*/

		$sql="select distinct d.codubi as acodubi,'M' as tipo,
			sum(case when c.desinc ='S' then b.mondismue else 0 end) as des,
			sum(case when c.desinc ='N' then b.mondismue else 0 end) as inc,d.desubi from
			(bnubibie d left outer join bndismue b on (d.codubi=b.codubiori)) left outer join bndisbie c on (substring(b.tipdismue,1,6)=c.coddis)
			where trim(d.CODubi) >= '".$codubides."' AND
				trim(d.CODubi) <= '".$codubihas."'
				/*and substring(b.tipdismue,1,6)=c.coddis AND
				trim(b.CODMUE) >= '".$codmuedes."' AND
				trim(b.CODMUE) <= '".$codmuehas."' AND
				to_date(RTRIM(A.FECCOM),'yyyy-mm-dd') >= to_date(RTRIM('".$fecdes."'),'dd/mm/yyyy') AND
				to_date(RTRIM(A.FECCOM),'yyyy-mm-dd') <= to_date(RTRIM('".$fechas."'),'dd/mm/yyyy') AND
				(A.CODACT)=(B.CODACT) */
				group by d.codubi,d.desubi,b.codubiori,b.tipdismue
				UNION
			    SELECT distinct
	 			d.codubi as acodubi, 'I' as tipo,
				0 as des,
				0 as inc,
				d.desubi
				FROM
				BNREGINM A,
				BNDISINM B,
				BNUBIBIE D
				WHERE
				trim(d.CODubi) >= '".$codubides."' AND
				trim(d.CODubi) <= '".$codubihas."'
				group by d.codubi,d.desubi

			 	order by tipo";
		//H::printR($sql);exit;
	  	return $this->select($sql);
	  }

	  	function sqlexistencia($codubi,$fecdes)
	  {
 	 	$sql="SELECT distinct( sum(  a.valini )) as existencia_ant
			FROM
				BNREGMUE A,
				BNDISMUE B,
				BNDISBIE C
			WHERE
				(A.CODubi) = ('".$codubi."') AND
				to_date(RTRIM(A.FECCOM),'yyyy-mm-dd') < to_date(RTRIM('".$fecdes."'),'dd/mm/yyyy') AND
				(A.CODACT)=(B.CODACT) and
			    (A.CODMUE)=(B.CODMUE) and
			    trim(substr(b.tipdismue,1,6))=trim(c.coddis)";

	  	return $this->select($sql);
	  }

}
?>