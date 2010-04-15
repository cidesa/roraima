<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprlistconc extends BaseClases {

    public function SQLp($codempdes, $codemphas, $codcardes, $codcarhas, $codnomdes, $codnomhas, $codcondes, $codconhas, $codcatdes, $codcathas, $fechadesde, $fechahsta, $tipcon, $especial, $tipnomesp,$EST1, $EST2, $EST3)
    {


			$sql="SELECT DISTINCT
				A.CODEMP,
				D.NOMCON,
				A.CODCON,
				A.CODCAR,
				E.CODCAT,
				RTRIM(F.NOMCAT) AS NOMCAT,
				A.SALDO,
				A.CODNOM,
				C.NOMEMP,
				C.CEDEMP,
				B.NOMCAR,
				D.OPECON,
				D.IMPCPT
				FROM NPNOMCAL A, NPCARGOS B, NPHOJINT C, NPDEFCPT D, NPASICAREMP E, NPCATPRE F
				WHERE
				A.CODNOM>='".$codnomdes."' AND
				A.CODNOM<='".$codnomhas."'
				AND
                A.ESPECIAL='".$especial."' AND
				TRIM(A.CODEMP) >= TRIM('".$codempdes."') AND
				TRIM(A.CODEMP) <= TRIM('".$codemphas."') AND
				TRIM(A.CODCAR) >= TRIM('".$codcardes."') AND
				TRIM(A.CODCAR) <= TRIM('".$codcarhas."') AND
				TRIM(A.CODCON) >= TRIM('".$codcondes."') AND
				TRIM(A.CODCON) <= TRIM('".$codconhas."') AND
				A.CODCON=D.CODCON AND
				A.CODEMP=C.CODEMP AND
				A.CODCAR=B.CODCAR AND
				A.CODEMP=E.CODEMP AND
				A.CODCAR=E.CODCAR AND
				A.CODNOM=E.CODNOM AND
				E.CODCAT=F.CODCAT AND
				A.SALDO<>0.00 AND
				D.CONACT='S' AND
				D.IMPCPT='S' AND
				TRIM(E.CODCAT) >= TRIM('".$codcatdes."') AND
				TRIM(E.CODCAT) <= TRIM('".$codcathas."') AND
				E.STATUS='V' AND
				(D.OPECON = '".$EST1."'  OR
				 D.OPECON = '".$EST2."'  OR
				 D.OPECON = '".$EST3."')
				ORDER BY A.CODCON,A.CODEMP
				";
       //print $sql;exit;
       return $this->select($sql);

    }


    public function SQLNpnomcal($codnom)
    {

	 $sql= "SELECT COUNT(DISTINCT(CODEMP)) as numero FROM NPNOMCAL WHERE (CODNOM)=('".$codnom."')";

     return $this->select($sql);

    }



}
?>