<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprhisrelconc extends BaseClases {


    public function SQLp($codnom1, $codnom2, $codcondes, $codconhas, $tipcon, $especial, $tipnomesp, $fechadesde, $fechahasta)
    {

   $sql = "SELECT DISTINCT(A.CODCON),
               A.NOMCON,A.CODNOM, OPECON as ASIDED,
      COUNT(CODEMP) AS CANT,
      SUM(CASE WHEN OPECON='A' THEN MONTO ELSE 0 END) AS ASIGNA ,
      SUM(CASE WHEN OPECON='D' THEN MONTO ELSE 0 END) AS DEDUC  ,
      SUM(CASE WHEN OPECON='P' THEN MONTO ELSE 0 END) AS APORTE ,

      B.IMPCPT,
      partidaconcepto(A.codcon,A.codnom,A.codcar) as CODPAR

      FROM NPHISCON A, NPDEFCPT B

      WHERE

      B.ORDPAG='S' AND
      (B.CODCON) = (A.CODCON) AND
          (A.CODCON) >= TRIM('".$codcondes."') AND
      (A.CODCON) <= TRIM('".$codconhas."') AND

        (CASE WHEN A.ESPECIAL = 'N' THEN A.FECNOM WHEN A.ESPECIAL = 'S' THEN A.FECNOMESPHAS END) >= to_date('".$fechadesde."','dd/mm/yyyy') AND
      (CASE WHEN A.ESPECIAL = 'N' THEN A.FECNOM WHEN A.ESPECIAL = 'S' THEN A.FECNOMESPHAS END) <= to_date('".$fechahasta."','dd/mm/yyyy') AND

      A.MONTO > 0 AND
      B.IMPCPT = 'S' AND

      A.ESPECIAL = CASE WHEN '".$especial."' = 'AMBAS' THEN A.ESPECIAL ELSE SUBSTR('".$especial."',1,1) END AND
      COALESCE(A.CODNOMESP,'XXX') = CASE WHEN '".$especial."' = 'SI' THEN '".$tipnomesp."' ELSE COALESCE(A.CODNOMESP,'XXX') END AND

      (A.CODNOM) >= TRIM('".$codnom1."') AND
      (A.CODNOM) <= TRIM('".$codnom2."')
      GROUP BY A.CODCON,A.NOMCON,A.CODNOM,B.OPECON, B.IMPCPT,
      b.codpar,
      --partidaconcepto(A.codcon,A.codnom,A.codcar)
      ORDER BY B.OPECON,A.CODCON";

       return $this->select($sql);

    }


    public function SQLNpnomcal($codnom)
    {

   $sql= "SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";

       return $this->select($sql);

    }



}
?>