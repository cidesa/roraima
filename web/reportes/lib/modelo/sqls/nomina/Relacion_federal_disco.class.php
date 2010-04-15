<?php
require_once("../../lib/modelo/baseClases.class.php");
class Federal extends BaseClases {

	public function sqlp($coddes,$codhas,$codespdes,$codesphas,$banco,$especial)
    {



		if ($especial == 'S')
		{
					$sql="select cedemp, nomemp, cuenta_banco, sum(monto) as monto  from (
		(SELECT DISTINCT A.CODEMP AS CODEMP, cast(A.codemp as int) AS CODEMPORD,SUM (A.SALDO) AS monto,
					B.CEDEMP as cedemp, B.NOMEMP as nomemp, B.NUMCUE AS cuenta_banco
					FROM NPNOMCAL A left OUTER JOIN NPHOJINT B ON (A.CODEMP = B.CODEMP), NPBANCOS C
					WHERE A.ESPECIAL = 'S' and a.asided = 'A'
					AND B.CODBAN = C.CODBAN
					AND A.CODNOM>=RPAD('".$coddes."',3,' ')
					AND A.CODNOM<=RPAD('".$codhas."',3,' ')
					AND A.CODNOMESP>=RPAD('".$codespdes."',3,' ')
					AND A.CODNOMESP<=RPAD('".$codesphas."',3,' ')
					AND C.CODBAN = '".$banco."'
					AND B.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S')
					AND A.SALDO>0
					AND RTRIM(COALESCE(B.NUMCUE,' '))<>''
					GROUP BY CODEMPORD, A.CODEMP, B.CEDEMP, B.NOMEMP,B.NUMCUE
					order by CODEMPORD)
		union

		(SELECT DISTINCT A.CODEMP AS CODEMP, cast(A.codemp as int) AS CODEMPORD,(SUM (A.SALDO))*-1 AS monto,
					B.CEDEMP as cedemp, B.NOMEMP as nomemp, B.NUMCUE AS cuenta_banco
					FROM NPNOMCAL A left OUTER JOIN NPHOJINT B ON (A.CODEMP = B.CODEMP), NPBANCOS C
					WHERE A.ESPECIAL = 'S' and a.asided = 'D'
					AND B.CODBAN = C.CODBAN
					AND A.CODNOM>=RPAD('".$coddes."',3,' ')
					AND A.CODNOM<=RPAD('".$codhas."',3,' ')
					AND A.CODNOMESP>=RPAD('".$codespdes."',3,' ')
					AND A.CODNOMESP<=RPAD('".$codesphas."',3,' ')
					AND C.CODBAN = '".$banco."'
					AND B.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S')
					AND A.SALDO>0
					AND RTRIM(COALESCE(B.NUMCUE,' '))<>''
					GROUP BY CODEMPORD, A.CODEMP, B.CEDEMP, B.NOMEMP,B.NUMCUE
					order by CODEMPORD)) a group by cedemp, nomemp, cuenta_banco, codempord
					order by codempord";

		}

		else
		{
			$sql= "select distinct a.codemp, a.codcar,cast(a.codemp as int) AS cedemp,
					(sum(CASE WHEN a.asided='A' THEN coalesce(a.saldo,0) ELSE 0 END) - sum(CASE WHEN a.asided='D' THEN coalesce(a.saldo,0) ELSE 0 END)) AS monto,
					c.nomemp, c.numcue as cuenta_banco
					from
					npnomcal a, nphojint c
					where
                   			a.codnom >=trim('".$coddes."') and a.codnom <= trim('".$codhas."')  and c.codban = '".$banco."' and
					c.codemp=a.codemp and
					A.ESPECIAL = '".$especial."'  AND C.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S')
					group by  a.codemp,a.codcar, c.nomemp, c.numcue order by a.codcar,cedemp";
//print $sql; 
		}

		//H::PrintR($sql);exit;
	    return $this->select($sql);

    }


    public function nomina($coddes,$codhas,$banco,$especial,$codespdes,$codesphas)
    {

	if ($especial == 'S')
		{
			$sql= "SELECT sum (a.monto) as nomina from(SELECT A.NACEMP,
		       SUBSTR(A.CODEMP,2,8) as CODEMP,
		       A.cedemp as cedemp,
		       A.FECNAC,A.NOMEMP,
		       A.NUMCUE as cuenta_banco,
		       A.TIPCUE,
		       COALESCE(E.SALDO,0) as montox,
			(sum(CASE WHEN e.asided='A' THEN coalesce(e.saldo,0) ELSE 0 END) - sum(CASE WHEN e.asided='D' THEN coalesce(e.saldo,0) ELSE 0 END)) AS monto,
		       B.CODNOM
			FROM
			   NPHOJINT A,
			   NPASICAREMP B,
			   NPCARGOS C,
			   NPBANCOS D,
			   NPNOMCAL	E
			WHERE
			   B.CODNOM>=RPAD('".$coddes."',3,' ')  AND
			   B.CODNOM<=RPAD('".$codhas."',3,' ')  AND
			   A.CODBAN=D.CODBAN AND
			   B.CODEMP = A.CODEMP AND
			   B.CODCAR=C.CODCAR AND
			   D.CODBAN='".$banco."' AND A.codemp = E.codemp and E.especial = '".$especial."' AND
			   E.CODNOMESP>=RPAD('".$codespdes."',3,' ') AND
			   E.CODNOMESP<=RPAD('".$codesphas."',3,' ') AND
			   STATUS='V' AND
			   A.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S') AND
			   MONTONOMINA>0
			   AND RTRIM(COALESCE(A.NUMCUE,' '))<>''
			GROUP BY B.CODNOM,D.CODBAN,A.CEDEMP,A.CODEMP,SUBSTR(A.CODEMP,2,8),A.NOMEMP,B.CODCAR,C.NOMCAR,A.NUMCUE,A.TIPCUE,A.NACEMP,A.FECNAC,E.SALDO
			ORDER BY RTRIM(A.cedemp)) a";

		}
		else
		{
			$sql= "SELECT sum (a.monto) as nomina from(SELECT A.NACEMP,
		       SUBSTR(A.CODEMP,2,8) as CODEMP,
		       A.cedemp as cedemp,
		       A.FECNAC,A.NOMEMP,
		       A.NUMCUE as cuenta_banco,
		       A.TIPCUE,
		       COALESCE(B.MONTONOMINA,0) as montox,
			(sum(CASE WHEN e.asided='A' THEN coalesce(e.saldo,0) ELSE 0 END) - sum(CASE WHEN e.asided='D' THEN coalesce(e.saldo,0) ELSE 0 END)) AS monto,
		       B.CODNOM
			FROM
			   NPHOJINT A,
			   NPASICAREMP B,
			   NPCARGOS C,
			   NPBANCOS D,
			   NPNOMCAL	E
			WHERE
			   B.CODNOM>=RPAD('".$coddes."',3,' ')  AND
			   B.CODNOM<=RPAD('".$codhas."',3,' ')  AND
			   A.CODBAN=D.CODBAN AND
			   B.CODEMP = A.CODEMP AND
			   B.CODCAR=C.CODCAR AND
			   D.CODBAN='".$banco."' AND A.codemp = E.codemp and E.especial = '".$especial."' AND
			   STATUS='V' AND
			   A.STAEMP IN (SELECT CODSITEMP FROM NPSITEMP WHERE CALNOM='S') AND
			   MONTONOMINA>0
			   AND RTRIM(COALESCE(A.NUMCUE,' '))<>''
			GROUP BY B.CODNOM,D.CODBAN,A.CEDEMP,A.CODEMP,SUBSTR(A.CODEMP,2,8),A.NOMEMP,B.CODCAR,C.NOMCAR,A.NUMCUE,A.TIPCUE,A.NACEMP,A.FECNAC,MONTONOMINA
			ORDER BY RTRIM(A.cedemp)) a";
		}

		//H::PrintR($sql);exit;
	    return $this->select($sql);

    }
}
?>