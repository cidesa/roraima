<?php
require_once("../../lib/modelo/baseClases.class.php");

class Npvac_solicitud extends baseClases {

  function sqlp($empdes,$emphas,$fecdes,$fechas,$nomina)
  {
	$sql="SELECT
			C.CODEMP,A.CODNOM,H.NOMNOM as NOMINA,C.NOMEMP,C.FECING,C.FECRET,C.CEDEMP,C.CODNIV,D.DESNIV,A.CODCAR ,
			B.NOMCAR,B.CODCAT,E.NOMCAT,A.FECHASALIDA,A.FECHAENTRADA,A.DIADIS,PERINI,PERFIN, DIASBONO,
			C.CODREGPAI,C.CODREGEST,C.CODREGCIU,
			formatonum((select sum(r.monto)
			from nphiscon r, npconsueldo s
			where
			To_char(r.fecnom,'mm/yyyy')=to_char((select max(fecnom) from nphiscon),'mm/yyyy') and
			r.codnom=s.codnom and
			r.codcon=s.codcon and
			r.codemp=c.codemp
			)) as sueldo
			FROM  NPNOMINA H,NPCATPRE E,
			(SELECT Z.CODNOM,Z.CODEMP,Z.CODCAR,X.FECDES as FECHASALIDA,X.FECHAS as FECHAENTRADA,
			Y.DIASVAC as DIADIS ,Y.PERINI,Y.PERFIN, 0 as DIASBONO, 'N'::char as STAVAC
			FROM NPVACSALIDAS X, NPVACSALIDAS_DET Y, NPASICAREMP Z
			WHERE X.CODEMP=Y.CODEMP
			AND X.FECVAC=Y.FECVAC
			AND Z.CODEMP=X.CODEMP
			AND Z.STATUS='V') A,
			NPHOJINT C, NPASICAREMP B, NPESTORG D
			WHERE
			B.CODNOM = '$nomina' AND
			B.CODNOM=A.CODNOM AND
			B.CODNOM=H.CODNOM AND
			RTRIM(B.CODCAT)=RTRIM(E.CODCAT) AND
			B.CODCAR=A.CODCAR AND
			B.CODEMP=C.CODEMP AND
			B.CODEMP=A.CODEMP AND
			C.CODNIV=D.CODNIV AND
			B.CODEMP >= '$empdes' AND
			B.CODEMP <= '$emphas' AND
			FECHASALIDA >= to_date('$fecdes','dd/mm/yyyy') AND
			FECHASALIDA <= to_date('$fechas','dd/mm/yyyy') AND
			B.STATUS='V' AND
			A.STAVAC='N'
			ORDER BY
			C.CODEMP,
			A.FECHAENTRADA,
			A.PERINI";
   //H::PrintR($sql);exit;
   return $this->select($sql);
  }

  function sqlvacvencidas($codemp,$fecsal)
  {
  	$sql="SELECT A.CODEMP as CODEMPVAC,
			A.PERINI as PERINIVAC,
			A.PERFIN as PERFINVAC
			FROM NPVACDISFRUTE A,(SELECT A.CODEMP,B.ANO as PERINI, SUM(coalesce(A.DIASVAC,0)) as DISFRUTADO
			FROM NPVACSALIDAS_DET A left outer join NPANOS B on
			(a.codemp like '$codemp%' and a.fecvac<=to_date('$fecsal','yyyy-mm-dd') and a.perini=b.ano)
			GROUP BY B.ANO,A.CODEMP,A.PERINI)B
			WHERE
			a.codemp='$codemp' and
			A.PERINI=B.PERINI AND
			B.DISFRUTADO<A.DIASDISFUTAR  AND
			TO_NUMBER(PERFIN,'9999')<=TO_NUMBER(TO_CHAR(to_date('$fecsal','yyyy-mm-dd'),'YYYY'),'9999')
			ORDER BY B.PERINI";
	//print "<pre>".$sql;exit;
	return $this->select($sql);
  }

}
?>