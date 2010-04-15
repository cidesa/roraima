<?php

require_once("../../lib/modelo/baseClases.class.php");


class Cardphpre extends baseClases
{


function sqlp($coddphdes,$coddphhas,$coddesde,$codhasta,$fechadesde,$fechahasta,$sta1,$sta2)
  {
   $sql="SELECT
							A.DPHART as DPHACT,
							'DP'||SUBSTR(A.DPHART,3,6) as CODDEPPRE,
							'DP'||SUBSTR(A.DPHART,3,6) as CODDEPCON,
							to_char(A.FECDPH,'dd/mm/yyyy') as fecdph,
							A.REQART,g.desubi AS UBICACION,
							A.NUMCOM,
							D.DESREQ,
							A.DESDPH,
							(CASE WHEN A.STADPH='A' THEN 'Activo' WHEN A.STADPH='N' THEN 'Anulado' ELSE '' END) as STADPH ,
							B.CODART,
							B.CANDPH,
							B.CANDEV,
							B.CANTOT,
							B.CODCAT,
							C.DESART,
							C.COSULT,
							B.CANDPH*C.COSULT as PRETOT,
							F.CANREQ
						FROM CADPHART A, CAARTDPH B, CAREGART C, CAREQART D, CAARTREQ F, bnubibie G
						WHERE
							RTRIM(A.DPHART) = RTRIM(B.DPHART) AND
							RTRIM(B.CODART) = RTRIM(C.CODART) AND
							RTRIM(A.REQART) = RTRIM(D.REQART) AND
							RTRIM(A.REQART) = RTRIM(F.REQART) AND
							RTRIM(B.CODART) = RTRIM(F.CODART) AND
							RTRIM(G.CODUBI)=RTRIM(A.CODORI) AND
							RTRIM(A.DPHART) >= RTRIM('".$coddphdes."') AND
							RTRIM(A.DPHART) <= RTRIM('".$coddphhas."') AND
							RTRIM(B.CODART) >= RTRIM('".$coddesde."') AND
							RTRIM(B.CODART) <= RTRIM('".$codhasta."') AND
							A.FECDPH >= to_date('".$fechadesde."','dd/mm/yyyy') AND
							A.FECDPH <= to_date('".$fechahasta."','dd/mm/yyyy') AND
							( RTRIM(upper(STADPH))   = RTRIM('".$sta1."') OR
  							RTRIM(upper(STADPH))   = RTRIM('".$sta2."') )
						ORDER BY A.DPHART";
 					//H::PrintR($sql);exit;

   return $this->select($sql);
  }

  function otros()
  {
   $sql="SELECT NOMEMP as nombre,DIREMP as dir,TLFEMP as telf FROM EMPRESA";
 						//print $sql;exit;

   return $this->select($sql);
  }
}
?>