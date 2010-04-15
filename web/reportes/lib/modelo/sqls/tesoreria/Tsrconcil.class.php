<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tsrconcil extends baseClases {

  function sqlano()
  {
  	  $sql="select obtener_ano_cierre() as anofis";

  	  $ano=$this->select($sql);
  	  //H::printR($ano[0]["anofis"]);exit;
  	  return $ano[0]["anofis"];
  }

  function sqlpb($mes,$ano)
  {
	$sql="select to_char(b.fechas,'dd/mm/yyyy') as fecha
							from contaba a, contaba1 b
							where a.fecini=b.fecini and
							a.feccie=b.feccie and
							b.fecdes=to_date('01/'||'".$mes."'||'/'||'".$ano."','dd/mm/yyyy')";
	//H::printR($sql);exit;
	return $this->select($sql);
  }

  function sqlp($ctades,$ctahas,$fecha)
  {
  	$sql="select z.*,coalesce(x.nomben,z.desmov) as desmov from (
  			SELECT
			RTRIM(A.NUMCUE) AS NUMCUE,b.nomcue,b.desenl,
			A.REFERE,
			to_char(CASE WHEN A.MONLIB=0 THEN FECBAN ELSE A.FECLIB END,'dd/mm/yyyy') AS FECMOV,
			CASE WHEN A.MONLIB=0 THEN A.MOVBAN ELSE A.MOVLIB END AS TIPMOV,
			RTRIM(a.desref) AS DESMOV,
			COALESCE(CASE WHEN C.DEBCRE='D' THEN A.MONLIB ELSE 0 END,0) AS LIBROSDEB,
			COALESCE(CASE WHEN C.DEBCRE='C' THEN A.MONLIB ELSE 0 END,0) AS LIBROSCRE,
			COALESCE(CASE WHEN C.DEBCRE='C' THEN A.MONBAN ELSE 0 END,0) AS BANCOSDEB,
			COALESCE(CASE WHEN C.DEBCRE='D' THEN A.MONBAN ELSE 0 END,0) AS BANCOSCRE,
			CASE WHEN A.MONLIB=0 THEN A.MONBAN ELSE A.MONLIB END AS MONMOV,
			A.RESULT,
			C.DEBCRE
			FROM TSCONCIL A  left outer join  TSDEFBAN B on (a.numcue=b.numcue) ,TSTIPMOV C
			WHERE
			CASE WHEN A.MONLIB=0 THEN A.MOVBAN ELSE A.MOVLIB END =C.CODTIP AND
			A.NUMCUE >= RTRIM('$ctades') AND
			A.NUMCUE <= RTRIM('$ctahas') AND
			CASE WHEN A.MONLIB=0 THEN A.FECBAN ELSE A.FECLIB END <= TO_DATE('$fecha','DD/MM/YYYY')
			ORDER BY RTRIM(A.NUMCUE),A.FECLIB,trim(A.REFERE),A.MOVLIB) Z
			left outer join tscheemi y on (y.numche=z.refere and y.numcue=z.numcue)
			 left outer join opbenefi x on (y.cedrif=x.cedrif)";

			 //H::printR($sql);exit;

  	return $this->select($sql);
  }

    function sqlsaldosenero($cuenta)
  {
  	 $sql="select antban as salban,antlib as sallib from tsdefban where numcue='$cuenta'";
  	// H::PrintR($sql);exit;
  	 return $this->select($sql);
  }

  function sqlsaldos($cuenta,$fecha)
  {
  	 $sql="select disponibilidadbanco('$cuenta','$fecha','L') as sallib,disponibilidadbanco('$cuenta','$fecha','B') as salban from empresa";
  	 //H::printR($sql);exit;

  	 return $this->select($sql);
  }

  function sqlerror($numcue,$fecha)
  {
  	  $sql="select coalesce(sum((CASE WHEN a.debcre='D' THEN b.monmov ELSE 0 END)),0) as debbanpos,
						 coalesce(sum((CASE WHEN a.debcre='C' THEN b.monmov ELSE 0 END)),0) as crebanpos
					     from tstipmov a, tsmovban b
					     where rtrim(a.codtip) = rtrim(b.tipmov) and
						 rtrim(b.numcue) = rtrim('".$numcue."') and
						 b.fecban<=to_date('".$fecha."','dd/mm/yyyy') and b.stacon1 is not null";

	  return $this->select($sql);
  }

  function sqlresumen($ctades,$ctahas,$fecha)
  {
  	$sql="SELECT
			sum(COALESCE(CASE WHEN C.DEBCRE='D' THEN A.MONLIB ELSE 0 END,0)) AS LIBROSDEB,
			sum(COALESCE(CASE WHEN C.DEBCRE='C' THEN A.MONLIB ELSE 0 END,0)) AS LIBROSCRE,
			sum(COALESCE(CASE WHEN C.DEBCRE='C' THEN A.MONBAN ELSE 0 END,0)) AS BANCOSDEB,
			sum(COALESCE(CASE WHEN C.DEBCRE='D' THEN A.MONBAN ELSE 0 END,0)) AS BANCOSCRE,
			sum(CASE WHEN A.MONLIB=0 THEN A.MONBAN ELSE A.MONLIB END) AS MONMOV,
			case when substr(c.codtip,1,2)='CH' then 'CH' else c.codtip end as tipo,
			case when substr(c.codtip,1,2)='CH' then 'CHEQUES EN TRANSITO' else upper(c.destip)||' EN TRANSITO' end as destip
			FROM TSCONCIL A left outer join TSDEFBAN B on (a.numcue=b.numcue) ,TSTIPMOV C
			WHERE
			CASE WHEN A.MONLIB=0 THEN A.MOVBAN ELSE A.MOVLIB END =C.CODTIP
			AND A.NUMCUE >= RTRIM('$ctades') AND A.NUMCUE <= RTRIM('$ctahas')
			AND CASE WHEN A.MONLIB=0 THEN A.FECBAN ELSE A.FECLIB END <= TO_DATE('$fecha','DD/MM/YYYY')
			AND RTRIM(A.RESULT) <> 'CONCILIADO'
			group by a.numcue,case when substr(c.codtip,1,2)='CH' then 'CH' else c.codtip end,
			case when substr(c.codtip,1,2)='CH' then 'CHEQUES EN TRANSITO' else upper(c.destip)||' EN TRANSITO' end ";
	return $this->select($sql);
  }

  function sqlcuenta($numcue)
  {
  		$sql="select nomcue from tsdefban where numcue='$numcue'";

  		$arr=$this->select($sql);
  		return $arr[0]["nomcue"];
  }
}
?>