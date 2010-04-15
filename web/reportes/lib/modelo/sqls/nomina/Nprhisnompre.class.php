<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprhisnompre extends BaseClases {

  public function SQLp($codempdes,$codemphas,$tipnomdes,$tipnomhas,$especial,$codnomesp,$codcondes,$codconhas,$pernomdes,$pernomhas)
    {
    $sql= " SELECT distinct A.CODPRE,a.codnom,b.nompre,C.CODCTA,coalesce(C.DESCTA,'CUENTA INVALIDA') as DESCTA,A.ASIGNA as ASIGNA,A.DEDUCI as DEDUCI, A.APORTE as APORTE FROM
    (SELECT trim(RTRIM(A.CODCAT)||'-'||RTRIM(A.CODPAR)) as  CODPRE,
    a.codnom as codnom,
    SUM(case when c.opecon = 'A' then A.monto else 0 end) as ASIGNA,
    SUM(case when c.opecon = 'D' then A.monto else 0 end ) as DEDUCI,
    SUM(case when c.opecon = 'P' then A.monto else 0 end) as APORTE
    FROM NPHISCON A,NPDEFCPT C
    WHERE
    A.CODCON=C.CODCON AND
    trim(A.CODEMP) >= trim('".$codempdes."') AND
    trim(A.CODEMP) <= trim('".$codemphas."') AND
    trim(A.CODCON) >= trim('".$codcondes."') AND
    trim(A.CODCON) <= trim('".$codconhas."') AND
    A.CODNOM >= ('".$tipnomdes."') AND
    A.CODNOM <= ('".$tipnomhas."') AND
    A.ESPECIAL=(case when substr('".$especial."',1,1)='A' then A.ESPECIAL else SUBSTR('".$especial."',1,1) end)  AND
    coalesce(A.CODNOMESP,'XXX')=(case when substr('".$especial."',1,1)='S' then '".$codnomesp."' else coalesce(A.CODNOMESP,'XXX') end)  AND
    C.ORDPAG<>'N' AND
    A.MONTO>0
    and to_date(FecNom,'yyyy-mm-dd')>=to_date('".$pernomdes."','dd/mm/yyyy')
    and to_date(FecNom,'yyyy-mm-dd')<=to_date('".$pernomhas."','dd/mm/yyyy')
    And A.CODCON NOT IN
    (SELECT CODCON FROM npconceptoscategoria)
    GROUP BY trim(RTRIM(A.CODCAT)||'-'||RTRIM(A.CODPAR)),a.codnom
    UNION
    SELECT trim(RTRIM(A.CODCAT)||'-'||RTRIM(A.CODPAR)) as  CODPRE,
    a.codnom as codnom,
    SUM(case when c.opecon = 'A' then A.monto else 0 end) as ASIGNA2,
    SUM(case when c.opecon = 'D' then A.monto else 0 end ) as DEDUCI2,
    SUM(case when c.opecon = 'P' then A.monto else 0 end) as APORTE2
    FROM NPHISCON A,NPDEFCPT C,
    npconceptoscategoria D
    WHERE
    A.CODCON=C.CODCON AND
    C.CODCON=D.CODCON AND
    A.CODCON=D.CODCON AND
    A.ESPECIAL=(case when substr('".$especial."',1,1)='A' then A.ESPECIAL else SUBSTR('".$especial."',1,1) end)  AND
    coalesce(A.CODNOMESP,'XXX')=(case when substr('".$especial."',1,1)='S' then '".$codnomesp."' else coalesce(A.CODNOMESP,'XXX') end)  AND
    trim(A.CODEMP) >= trim('".$codempdes."') AND
    trim(A.CODEMP) <= trim('".$codemphas."') AND
    trim(A.CODCON) >= trim('".$codcondes."') AND
    trim(A.CODCON) <= trim('".$codconhas."') AND
    A.CODNOM >= ('".$tipnomdes."') AND
    A.CODNOM <= ('".$tipnomhas."') AND
    A.MONTO>0
    and to_date(FecNom,'yyyy-mm-dd')>=to_date('".$pernomdes."','dd/mm/yyyy')
    and to_date(FecNom,'yyyy-mm-dd')<=to_date('".$pernomhas."','dd/mm/yyyy')
    GROUP BY trim(RTRIM(A.CODCAT)||'-'||RTRIM(A.CODPAR)), a.codnom
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