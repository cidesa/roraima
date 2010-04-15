<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprnompre extends BaseClases {

  public function SQLp($codempdes,$codemphas,$tipnomdes,$tipnomhas,$codcardes,$codcarhas,$especial,$codnomesp,$codcondes,$codconhas,$cod1)
    {
    	    if ($especial == 'SI')
            {
            	$especialc = " a.especial = 'S' AND (A.CODNOMESP) = TRIM('".$cod1."') AND ";
            }
       else
            {
            	if ($especial == 'NO')       	$especialc = " a.especial = 'N' AND"; else
            	if ($especial == 'AMBAS')      $especialc = "";
            }
    $sql= "SELECT distinct A.CODPRE,a.codnom,b.nompre,C.CODCTA,coalesce(C.DESCTA,'CUENTA INVALIDA') as DESCTA,A.ASIGNA as ASIGNA,A.DEDUCI as DEDUCI, A.APORTE as APORTE FROM
        (
        SELECT (TRIM(B.CODCAT)||'-'||TRIM(C.CODPAR)) as CODPRE,
        a.codnom as codnom,
        SUM(case when A.ASIDED = 'A' then A.SALDO else 0 end) as ASIGNA,
        SUM(case when A.ASIDED = 'D' then A.SALDO else 0 end ) as DEDUCI,
        SUM(case when A.ASIDED = 'P' then A.SALDO else 0 end) as APORTE
        FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C
        WHERE
        A.CODNOM >= ('".$tipnomdes."') AND
        A.CODNOM <= ('".$tipnomhas."') AND
        trim(B.CODEMP)=trim(A.CODEMP) AND
        trim(B.CODCAR)=trim(A.CODCAR) AND
        B.CODNOM=A.CODNOM AND
        C.CODCON=A.CODCON AND ".$especialc."
        B.STATUS='V' AND
        trim(A.CODCAR) >= trim('".$codcardes."') AND
        trim(A.CODCAR) <= trim('".$codcarhas."') AND
        trim(A.CODEMP) >= trim('".$codempdes."') AND
        trim(A.CODEMP) <= trim('".$codemphas."') AND
        trim(A.CODCON) >= trim('".$codcondes."') AND
        trim(A.CODCON) <= trim('".$codconhas."') AND
        A.SALDO>0 AND
        A.CODCON<>'001'  AND
        C.ORDPAG='S'
        And A.CODCON NOT IN
        (SELECT CODCON FROM npconceptoscategoria)
        GROUP BY  (TRIM(B.CODCAT)||'-'||TRIM(C.CODPAR)),a.codnom
        UNION
        SELECT trim(RTRIM(D.CODCAT)||'-'||RTRIM(C.CODPAR)) as CODPRE,
        a.codnom as codnom,
        SUM(case when A.ASIDED='A' then A.SALDO else 0 end) as ASIGNA,
        SUM(case when A.ASIDED='D' then A.SALDO else 0 end) as DEDUCI,
        SUM(case when A.ASIDED='P' then A.SALDO else 0 end) as APORTE
        FROM NPNOMCAL A,NPASICAREMP B,NPDEFCPT C,
        npconceptoscategoria D
        WHERE
        A.CODNOM >= ('".$tipnomdes."') AND
        A.CODNOM <= ('".$tipnomhas."') AND
        trim(B.CODEMP)=trim(A.CODEMP) AND
        trim(B.CODCAR)=trim(A.CODCAR) AND
        B.CODNOM=A.CODNOM AND
        C.CODCON=A.CODCON AND
        C.CODCON=D.CODCON AND
        D.CODCON=A.CODCON AND ".$especialc."
        B.STATUS='V' AND
        trim(A.CODCAR) >= trim('".$codcardes."') AND
        trim(A.CODCAR) <= trim('".$codcarhas."') AND
        trim(A.CODEMP) >= trim('".$codempdes."') AND
        trim(A.CODEMP) <= trim('".$codemphas."') AND
        trim(A.CODCON) >= trim('".$codcondes."') AND
        trim(A.CODCON) <= trim('".$codconhas."') AND
        A.SALDO>0 AND
        A.CODCON<>'001'
        GROUP BY trim(RTRIM(D.CODCAT)||'-'||RTRIM(C.CODPAR)),a.codnom
        ) A left outer join  CPDEFTIT B on (trim(A.CODPRE)=trim(B.CODPRE))  left outer join CONTABB C  on (trim(B.CODCTA)=trim(C.CODCTA)) order by a.codnom,a.codpre";

      return $this->select($sql);
    }

    public function SQLnpnomesptipos($codnomesp)
    {
      $sql="SELECT FECNOMDES as FECHADEL,FECNOMHAS as FECHAHAS FROM NPNOMESPTIPOS WHERE CODNOMESP=RPAD('".$codnomesp."',3,' ')";

      return $this->select($sql);
    }

    public function SQLnomnom($codnom)
    {
      $sql="select nomnom from npnomina where codnom='".$codnom."' ";

      return $this->select($sql);
    }

}
?>