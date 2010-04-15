<?php
require_once("../../lib/modelo/baseClases.class.php");

class Pretra2 extends baseClases{

 function sqlp($codtrades,$codtrahas,$pertrades,$pertrahas,$fecdes,$fechas,$estatus)
  {

   if
			($estatus=="A")
				{
				$this->stacom="A";
				$t=" (AND A.STATRA='".$this->stacom."' OR (A.STATRA='N' AND A.FECANU>to_date('".$this->fectra2."','dd/mm/yyyy')))";
				}
			elseif ($estatus=="N")
			{ 	$this->stacom="N";
				$t="AND A.STATRA='".$this->stacom."'and A.FECANU <= to_date('".$this->fectra2."','dd/mm/yyyy')";
			}
            else
            {
            	$t="";
            }
  	$sql="SELECT A.PerTra as periodo,c.tipo,
							A.RefTra as referencia,
							to_char(A.FecTra,'dd/mm/yyyy') as fecha, a.reftra,
							a.statra,
							a.fecanu,
							(case when a.statra='A' then 'Activo' when a.statra='N' then 'Anulado' else '' end) as status2,
							RTRIM(A.DesTra) as destra
							FROM cpsoltrasla C right outer join CPTRASLA  A on (a.reftra=c.reftra)
			WHERE
                			(
								A.PERTRA >= '".$pertrades."' AND
								A.PERTRA <= '".$pertrahas."'
							)
							AND
                			(
								A.REFTRA >= '".$codtrades."'  AND
								A.REFTRA <= '".$codtrahas."'
							)
							AND
                			(
								A.FECTRA >= to_date('".$fecdes."','dd/mm/yyyy')  AND
								A.FECTRA <= to_date('".$fechas."','dd/mm/yyyy')
							)
							".$t;
						// print '<pre>';print $sql;exit;

						 return $this->select($sql);
						//}


  	 /* if($estatus=="T"){
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
                (  B.CODORI LIKE rtrim('".$comodin."') )".$stapag."      order by Fecha         		";*/
            // H::printR($sql); exit;

	}

	function codori ($codigo)
	{
		$sql = "SELECT CODORI AS origen, MONMOV AS monto FROM CPMOVTRA WHERE REFTRA = '".$codigo."'";
        //print '<pre>';print $sql;exit;

        return $this->select($sql);

	}

	function coddes ($codigo)
	{
		$sql = "SELECT CODDES as destino, MONMOV AS monto FROM CPMOVTRA WHERE REFTRA = '".$codigo."'";
        return $this->select($sql);

	}
}
?>