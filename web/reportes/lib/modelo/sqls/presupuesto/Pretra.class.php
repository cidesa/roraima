<?php
require_once("../../lib/modelo/baseClases.class.php");

class Pretra extends baseClases{

 function sqlp($codtrades,$codtrahas,$pertrades,$pertrahas,$codpredes,$codprehas,$fecdes,$fechas,$comodin,$estatus)
  {
  	  if($estatus=="T"){
 	  	$stapag="";
  	  }
  	  else if ($estatus=="A"){

  	   $stapag="AND A.statra='".$estatus."'";
  	  }
  	  else if($estatus=="N"){
  	   $stapag="AND A.statra='".$estatus."'";
  	  }

  	   $sql= " SELECT
  	   		A.PerTra as Periodo,
			A.RefTra as Referencia,
			A.FecTra as Fecha,
			A.statra as estatus,
			A.fecanu as fecanu,
			A.statra as status,
			RTRIM(A.DesTra) as Destra ,
			RTRIM(B.CodOri )as Origen  ,
			RTRIM(B.CodDes )as  Destino,
			B.MonMov as mon_aju
			FROM CPTRASLA  A,
			CPMOVTRA B
			WHERE
			(A.REFTRA = B.REFTRA)
			AND
			((RTRIM(b.CODORI) >= RTRIM('".$codpredes."')    AND   RTRIM(b.CODORI) <= RTRIM('".$codprehas."'))   OR
                  (RTRIM(b.CODDES) >= RTRIM('".$codpredes."')    AND    RTRIM(b.CODDES) <= RTRIM('".$codprehas."')))   AND
                (  A.PERTRA >= '".$pertrades."' AND     A.PERTRA <= '".$pertrahas."' ) AND
                (  A.REFTRA >= '".$codtrades."'  AND      A.REFTRA <= '".$codtrahas."') AND
                (  to_char(A.FECTRA,'dd/mm/YYYY') >= '".$fecdes."'             AND     to_char(A.FECTRA,'dd/mm/YYYY') <= '".$fechas."' )      AND
                (  B.CODORI LIKE rtrim('".$comodin."') )".$stapag."      order by Fecha         		";
            // H::printR($sql); exit;
 return $this->select($sql);
	}
}
?>