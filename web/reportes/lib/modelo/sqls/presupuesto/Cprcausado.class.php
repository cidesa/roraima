<?php
require_once("../../lib/modelo/baseClases.class.php");
class Cprcausado extends baseClases {

//   function Cprcausado() {
//    }

    public function sqlp($caudes,$cauhas){
    	$sql="SELECT A.REFCAU,
              A.TIPCAU,
              TO_CHAR(A.FECCAU,'dd/mm/yyyy') AS FECCAU,
              A.MONCAU,
              A.SALAJU,
              A.DESCAU,
              B.CODPRE,
              C.NOMPRE,
              B.MONIMP,
              D.CEDRIF,
              D.NOMBEN,
              B.MONAJU,
			  TO_CHAR(A.FECCAU,'yyyy') AS ANOPRE,
			  C.CODCTA
			  FROM CPCAUSAD A,CPIMPCAU B, CPDEFTIT C, OPBENEFI D
			  WHERE
              RTRIM(A.REFCAU)>=RTRIM('".$caudes."') AND
              RTRIM(A.REFCAU)<=RTRIM('".$cauhas."') AND
			  A.REFCAU = B.REFCAU AND
              B.CODPRE = C.CODPRE  AND
              A.CEDRIF=D.CEDRIF
			  ORDER BY A.REFCAU,B.CODPRE,A.FECCAU,A.TIPCAU";
		return $this->select($sql);
    }

    public function sql_contabb($causado,$codcta){
		$sql="SELECT
			  A.CODCTA,
			  SUM(B.MONIMP) AS TOTCTA,
			  C.DESCTA
			  FROM CPIMPCAU B, CPDEFTIT A, CONTABB C
			  WHERE
			  TRIM(B.REFCAU)=TRIM('".$causado."') AND
			  TRIM(A.CODCTA)=TRIM('".$codcta."') AND
			  TRIM(A.CODCTA)=TRIM(C.CODCTA) AND
			  A.CODPRE=B.CODPRE
			  GROUP BY A.CODCTA, C.DESCTA";
		return $this->select($sql);
    }

    function sql_cpniveles(){
    	$sql="SELECT
    		  CATPAR,
    		  CONSEC,
    		  NOMABR,
    		  NOMEXT,
    		  LONNIV,
    		  STANIV
    		  FROM CPNIVELES ORDER BY CONSEC";
		return $this->select($sql);
    }
}
?>