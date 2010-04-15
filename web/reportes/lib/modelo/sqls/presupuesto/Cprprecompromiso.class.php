<?php
require_once("../../lib/modelo/baseClases.class.php");
class Cprprecompromiso extends baseClases {

//   function Cprprecompromiso() {
//    }

    public function sqlp($precomdes,$precomhas){
    	$sql="SELECT A.REFPRC,
              A.TIPPRC,
              TO_CHAR(A.FECPRC,'dd/mm/yyyy') AS FECPRC,
              A.MONPRC,
              A.SALAJU,
              A.DESPRC,
              B.CODPRE,
              C.NOMPRE,
              B.MONIMP,
              D.CEDRIF,
              D.NOMBEN,
              B.MONAJU,
			  TO_CHAR(A.FECPRC,'yyyy') AS ANOPRE,
			  C.CODCTA
			  FROM CPPRECOM A,CPIMPPRC B, CPDEFTIT C, OPBENEFI D
			  WHERE
              RTRIM(A.REFPRC)>=RTRIM('".$precomdes."') AND
              RTRIM(A.REFPRC)<=RTRIM('".$precomhas."') AND
			  A.REFPRC = B.REFPRC AND
              B.CODPRE = C.CODPRE  AND
              A.CEDRIF=D.CEDRIF
			  ORDER BY A.REFPRC,B.CODPRE,A.FECPRC,A.TIPPRC";
		return $this->select($sql);
    }

    public function sql_contabb($precompromiso,$codcta){
		$sql="SELECT
			  A.CODCTA,
			  SUM(B.MONIMP) AS TOTCTA,
			  C.DESCTA
			  FROM CPIMPPRC B, CPDEFTIT A, CONTABB C
			  WHERE
			  TRIM(B.REFPRC)=TRIM('".$precompromiso."') AND
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