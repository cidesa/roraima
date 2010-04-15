<?php
require_once("../../lib/modelo/baseClases.class.php");
class Cprpagado extends baseClases {

//   function Cprpagado() {
//    }

    public function sqlp($pagdes,$paghas){
    	$sql="SELECT A.REFPAG,
              A.TIPPAG,
              TO_CHAR(A.FECPAG,'dd/mm/yyyy') AS FECPAG,
              A.MONPAG,
              A.SALAJU,
              A.DESPAG,
              B.CODPRE,
              C.NOMPRE,
              B.MONIMP,
              D.CEDRIF,
              D.NOMBEN,
              B.MONAJU,
			  TO_CHAR(A.FECPAG,'yyyy') AS ANOPRE,
			  C.CODCTA
			  FROM CPPAGOS A,CPIMPPAG B, CPDEFTIT C, OPBENEFI D
			  WHERE
              RTRIM(A.REFPAG)>=RTRIM('".$pagdes."') AND
              RTRIM(A.REFPAG)<=RTRIM('".$paghas."') AND
			  A.REFPAG = B.REFPAG AND
              B.CODPRE = C.CODPRE  AND
              A.CEDRIF=D.CEDRIF
			  ORDER BY A.REFPAG,B.CODPRE,A.FECPAG,A.TIPPAG";
		return $this->select($sql);
    }

    public function sql_contabb($pagado,$codcta){
		$sql="SELECT
			  A.CODCTA,
			  SUM(B.MONIMP) AS TOTCTA,
			  C.DESCTA
			  FROM CPIMPPAG B, CPDEFTIT A, CONTABB C
			  WHERE
			  TRIM(B.REFPAG)=TRIM('".$pagado."') AND
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