<?php

require_once("../../lib/modelo/baseClases.class.php");

class Bnrinvbiemuebase extends baseClases
{
	function sqlp($codactdes, $codacthas,$codmuedes,$codmuehas,$fecdes,$fechas)
	  {
		$sql="SELECT distinct
	  			A.CODUBI  as acodubi,
	  			SUBSTR(A.CODACT,1,10) as acodact,
	  			A.CODMUE as acodmue,
	  			generar_descripcion(A.CODMUE) as adesmue,
	  			A.FECCOM as afeccom,
	  			A.FECREG as afecreg,
	  			A.VALINI as avalini,
	  			A.VIDUTI as aviduti,
				A.DIRMUE as adirmue,
				A.STAMUE as astamue,
				A.ORDCOM as aordcom,
				A.MARMUE as amarmue,
				A.SERMUE as asermue,
				A.DETMUE as adetmue,
				B.DESUBI as bdesubi

			FROM
				BNREGMUE A,
				BNUBIBIE B
			WHERE
				RTRIM(A.CODUBI)  = RTRIM(B.CODUBI) AND
				RTRIM(A.CODACT) >= RTRIM('".$codactdes."') AND
				RTRIM(A.CODACT) <= RTRIM('".$codacthas."') AND
				RTRIM(A.CODMUE) >= RTRIM('".$codmuedes."') AND
				RTRIM(A.CODMUE) <= RTRIM('".$codmuehas."') AND
				to_date(RTRIM(A.FECREG),'yyyy-mm-dd') >= to_date(RTRIM('".$fecdes."'),'dd/mm/yyyy') AND
				to_date(RTRIM(A.FECREG),'yyyy-mm-dd') <= to_date(RTRIM('".$fechas."'),'dd/mm/yyyy')
	";

	  	return $this->select($sql);
	  }
}
?>