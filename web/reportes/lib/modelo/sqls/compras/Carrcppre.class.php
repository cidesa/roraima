<?php

require_once("../../lib/modelo/baseClases.class.php");

class Carrcppre extends baseClases
{

function sqlp($codrcpdes,$codrcphas,$codprodes,$codprohas,$codesde,$codhasta,$fechadesde,$fechahasta,$sta1,$sta2)
  {
   $sql="SELECT
							A.RCPART as rcpart,
							to_char(A.FECRCP,'dd/mm/yyyy') as fecrcp,
							A.CODPRO as codpro,
							E.NOMPRO as nompro,
							E.RIFPRO as rifpro,
							A.DESRCP as desrcp,
							A.NUMFAC as numfac,
							A.MONRCP as monrcp,
							A.NUMCOM as numcom,
							(CASE WHEN A.STARCP='A' THEN 'Activo' WHEN A.STARCP='N' THEN 'Anulado' ELSE ' ' END) as STARCP,
							B.CODART as codart,
							B.ORDCOM as ordcom,
							B.CANREC as canrec,
							B.CANDEV as candev,
							B.CANTOT as cantot,
							B.MONTOT as montot,
							RTRIM(C.DESART) as DESART,
							C.COSULT as cosult,
							D.CANTOT as CANORD,
							to_char(F.FECORD,'dd/mm/yyyy') as fecord
						FROM
							CARCPART A,
							CAARTRCP B,
							CAREGART C,
							CAARTORD D,
							CAPROVEE E,
							CAORDCOM F
						WHERE
							RTRIM(A.RCPART)  =  RTRIM(B.RCPART) AND
							RTRIM(A.CODPRO)  =  RTRIM(E.CODPRO) AND
							RTRIM(B.CODART)  =  RTRIM(C.CODART) AND
							RTRIM(B.ORDCOM) =  RTRIM(F.ORDCOM)  AND
							RTRIM(B.ORDCOM) =  RTRIM(D.ORDCOM)  AND
							RTRIM(B.CODART)  =  RTRIM(D.CODART) AND
							RTRIM(A.RCPART) >= RTRIM('".$codrcpdes."') AND
							RTRIM(A.RCPART) <= RTRIM('".$codrcphas."') AND
							RTRIM(A.CODPRO) >= RTRIM('".$codprodes."') AND
							RTRIM(A.CODPRO) <= RTRIM('".$codprohas."') AND
							RTRIM(B.CODART) >= RTRIM('".$codesde."') AND
							RTRIM(B.CODART) <= RTRIM('".$codhasta."') AND
							A.FECRCP  >= to_date('".$fechadesde."','dd/mm/yyyy') AND
							A.FECRCP  <= to_date('".$fechahasta."','dd/mm/yyyy') AND
							(upper(STARCP) = '".$sta1."' OR
 							upper(STARCP)  = '".$sta2."' )
						ORDER BY A.RCPART,B.CODART";

   //print $sql;exit;
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