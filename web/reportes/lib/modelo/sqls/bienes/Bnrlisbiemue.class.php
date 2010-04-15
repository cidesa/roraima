<?php

require_once("../../lib/modelo/baseClases.class.php");

class Bnrlisbiemue extends baseClases
{
	function sqlp($codactdes, $codacthas)
	  {
	 	$sql="
SELECT
	  			A.CODUBI  as acodubi,
	  			SUBSTR(A.CODACT,1,10) as acodact,
	  			A.CODMUE as acodmue,
	  			A.DESMUE as adesmue,
	  			A.FECCOM as afeccom,
	  			A.FECREG as afecreg,
	  			A.VALINI as avalini,
	  			A.VIDUTI as aviduti,
				A.MODMUE as amodmue,
				A.STAMUE as astamue,
				A.ORDCOM as aordcom,
				A.MARMUE as amarmue,
				A.SERMUE as asermue,
				A.DETMUE as adetmue,
				B.DESUBI as bdesubi,
				C.DESACT as cdesact

			FROM
				BNUBIBIE B LEFT OUTER JOIN BNREGMUE A ON (A.CODUBI = B.CODUBI) 
				left join bndefact c on (a.codact=c.codact)
				WHERE
				RTRIM(A.CODACT) >= RTRIM('".$codactdes."') AND
				RTRIM(A.CODACT) <= RTRIM('".$codacthas."')
			ORDER BY
				A.CODUBI,
				A.CODACT";
//H::PrintR ($sql);exit; 

	  	return $this->select($sql);
	  }
}
?>