<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprvacacionespen extends baseClases {

  function sqlp($empdes,$emphas,$nomdes,$nomhas,$rel)
  {
	$sql="SELECT distinct
			B.CODEMP,
			C.CODNOM,d.nomnom,
			B.NOMEMP,
			B.Fecing,
			A.PERFIN AS ANO,
			To_Char(FecIng,'DD/MM/')||A.PERFIN as FECINI,
			TRUNC(Months_between(TO_DATE(To_Char(FecIng,'DD/MM/')||A.PERFIN,'DD/MM/YYYY'),FECING)/12) as TIEMPO,
			coalesce(A.DIASDISFUTAR,0) as DIADIS,
			coalesce(A.DIASDISFRUTADOS,0) as DIADISFRU
			FROM NPVACDISFRUTE A, NPHOJINT B,NPasicaremp C, npnomina d WHERE
			c.codnom=d.codnom and
			B.CODEMP=C.CODEMP AND
			C.STATUS='V' AND
			B.CODEMP>='$empdes'
			AND B.CODEMP<='$emphas'
			AND C.CODNOM>='$nomdes'
			AND C.CODNOM<='$nomhas'
			AND A.CODEMP=B.CODEMP and b.staemp='A' and (coalesce(A.DIASDISFUTAR,0)<>coalesce(A.DIASDISFRUTADOS,0))
			ORDER BY B.CODEMP,C.CODNOM,A.PERFIN";
//print "<pre>".$sql;exit;
   return $this->select($sql);
  }

  function sqlp2($empleado)
  {
  	 $sql="SELECT DISTINCT CODEMP,
			to_char(FECDES,'dd/mm/yyyy') AS FECHASALIDA,
			to_char(FECHAS,'dd/mm/yyyy') AS FECHAENTRADA,
			DIASDISFRUTAR as DISFRUTE
			FROM NPVACSALIDAS
			where codemp='$empleado'";
//print "<pre>".$sql;exit;
	 return $this->select($sql);
  }

}
?>