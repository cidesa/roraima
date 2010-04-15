<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprrelconc extends BaseClases {


    public function SQLp($codnom1, $codnom2, $codcondes, $codconhas, $tipcon, $especial, $tipnomesp,$nomminesp,$nommaxesp)
    {


	if($especial=='SI')
	{
		$sql = "SELECT DISTINCT(A.CODCON),A.NOMCON,A.CODNOM,A.NOMNOM,A.ASIDED,
			SUM(CASE WHEN A.SALDO=0 THEN 0 ELSE 1 END ) AS CANT,
			SUM(CASE WHEN A.ASIDED='A' THEN A.SALDO ELSE 0 END) AS ASIGNA ,
			SUM(CASE WHEN A.ASIDED='D' THEN A.SALDO ELSE 0 END) AS DEDUC  ,
			SUM(CASE WHEN A.ASIDED='P' THEN A.SALDO ELSE 0 END) AS APORTE ,

			B.IMPCPT,
			partidaconcepto(A.codcon,A.codnom,A.codcar) as CODPAR
			FROM NPNOMCAL A, NPDEFCPT B

			WHERE (CASE WHEN '".$tipcon."'='T' THEN 'T' ELSE A.ASIDED END)='".$tipcon."' AND
--			      (A.CODCON) <> '001' AND
			--	B.ORDPAG='S' AND
				(B.CODCON) = (A.CODCON) AND
				(A.CODCON) >= '".$codcondes."' AND
				(A.CODCON) <= '".$codconhas."' AND

					A.SALDO > 0 AND
				--	B.IMPCPT = 'S' AND

					A.ESPECIAL= CASE WHEN '".$especial."' = 'AMBAS' THEN A.ESPECIAL ELSE SUBSTR('".$especial."',1,1) END AND
					COALESCE(A.CODNOMESP,'XXX') = CASE WHEN '".$especial."' = 'SI' THEN COALESCE(A.CODNOMESP,'XXX') ELSE '' END AND

					(A.CODNOM) >= TRIM('".$codnom1."') AND
					(A.CODNOM) <= TRIM('".$codnom2."') AND
					(A.CODNOMESP) >= TRIM('".$nomminesp."') AND
					(A.CODNOMESP) <= TRIM('".$nommaxesp."')
					GROUP BY A.CODCON,A.NOMCON,A.CODNOM,A.NOMNOM,A.ASIDED, B.IMPCPT,partidaconcepto(A.codcon,A.codnom,A.codcar)
					ORDER BY asided,A.CODCON";
	}
	else
	{
		$sql = "SELECT DISTINCT(A.CODCON),A.NOMCON,A.CODNOM,A.NOMNOM,A.ASIDED,
			SUM(CASE WHEN A.SALDO=0 THEN 0 ELSE 1 END ) AS CANT,
			SUM(CASE WHEN A.ASIDED='A' THEN A.SALDO ELSE 0 END) AS ASIGNA ,
			SUM(CASE WHEN A.ASIDED='D' THEN A.SALDO ELSE 0 END) AS DEDUC  ,
			SUM(CASE WHEN A.ASIDED='P' THEN A.SALDO ELSE 0 END) AS APORTE ,

			B.IMPCPT,
			partidaconcepto(A.codcon,A.codnom,A.codcar) as CODPAR
			FROM NPNOMCAL A, NPDEFCPT B

			WHERE (CASE WHEN '".$tipcon."'='T' THEN 'T' ELSE A.ASIDED END)='".$tipcon."' AND
--			      (A.CODCON) <> '001' AND
			--	B.ORDPAG='S' AND
				(B.CODCON) = (A.CODCON) AND
				(A.CODCON) >= '".$codcondes."' AND
				(A.CODCON) <= '".$codconhas."' AND

					A.SALDO > 0 AND
				--	B.IMPCPT = 'S' AND

					A.ESPECIAL= CASE WHEN '".$especial."' = 'AMBAS' THEN A.ESPECIAL ELSE SUBSTR('".$especial."',1,1) END AND
					COALESCE(A.CODNOMESP,'XXX') = CASE WHEN '".$especial."' = 'SI' THEN '".$tipnomesp."' ELSE COALESCE(A.CODNOMESP,'XXX') END AND

					(A.CODNOM) >= TRIM('".$codnom1."') AND
					(A.CODNOM) <= TRIM('".$codnom2."')
					GROUP BY A.CODCON,A.NOMCON,A.CODNOM,A.NOMNOM,A.ASIDED, B.IMPCPT,partidaconcepto(A.codcon,A.codnom,A.codcar)
					ORDER BY asided,A.CODCON";

	}
				//	print '<pre>'; print $sql; exit;
       return $this->select($sql);

    }


    public function SQLNpnomcal($codnom)
    {

	 $sql= "SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";

       return $this->select($sql);

    }



}
?>