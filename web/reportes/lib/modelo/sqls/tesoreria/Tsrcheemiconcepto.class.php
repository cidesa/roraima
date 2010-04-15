<?php
require_once("../../lib/modelo/baseClases.class.php");

class Tsrcheemiconcepto extends baseClases {

  function sqlp($numchedes,$numchehas,$numcuedes,$numcuehas,$bendes,$benhas,$fecdes,$fechas,$tipdes,$tiphas,$status)
  {

  	 if (strtoupper($status)=='T')
	 {

		$sql="SELECT distinct A.TIPDOC as atipdoc, A.NUMCHE as anumche, B.NOMCUE as anomcue, B.VALCHE as avalche,
					C.NOMBEN as anomben, D.NUMORD as anumord, D.NUMCHE as anumche,A.NUMCUE as anumcue, A.FECEMI as afecemi, A.FECANU as afecanu,
					A.FECENT as afecent, A.MONCHE as amonche,E.deslib as deslib,  A.STATUS as stache FROM TSCHEEMI A, TSDEFBAN B, OPBENEFI C,TSMOVLIB E,
					OPORDPAG D WHERE (A.CEDRIF = C.CEDRIF) AND (A.NUMCUE = B.NUMCUE) AND (A.NUMCHE = D.NUMCHE) AND (trim(a.numcue) = trim(e.numcue))
					and (trim(a.numche) = trim(e.reflib))
					and a.fecemi = e.feclib and
					trim(A.NUMCHE) >= trim('".$numchedes."') AND trim(A.NUMCHE) <= trim('".$numchehas."') AND
					A.TIPDOC >= trim('".$tipdes."') AND A.TIPDOC <= trim('".$tiphas."') AND
					C.NOMBEN >= '".$bendes."' AND C.NOMBEN <= '".$benhas."' AND
					to_date(A.FECEMI,'yyyy-mm-dd') >= to_date('".$fecdes."','dd/mm/yyyy') AND to_date(A.FECEMI,'yyyy-mm-dd') <= to_date('".$fechas."','dd/mm/yyyy') AND
					trim(A.NUMCUE) >= trim('".$numcuedes."') AND trim(A.NUMCUE) <= trim('".$numcuehas."') ORDER BY A.NUMCUE, A.FECEMI, A.NUMCHE";
   	}
	else
	{
		$sql="SELECT distinct A.TIPDOC as atipdoc, A.NUMCHE as anumche, B.NOMCUE as anomcue, B.VALCHE as avalche,
					C.NOMBEN as anomben, D.NUMORD as anumord, D.NUMCHE as anumche,A.NUMCUE as anumcue, A.FECEMI as afecemi, A.FECANU as afecanu,
					A.FECENT as afecent, A.MONCHE as amonche,E.deslib as deslib,  A.STATUS as stache FROM TSCHEEMI A, TSDEFBAN B, OPBENEFI C,TSMOVLIB E,
					OPORDPAG D WHERE (A.CEDRIF = C.CEDRIF) AND (A.NUMCUE = B.NUMCUE) AND (A.NUMCHE = D.NUMCHE) AND (trim(a.numcue) = trim(e.numcue))
					and (trim(a.numche) = trim(e.reflib))
					and a.fecemi = e.feclib and
					trim(A.NUMCHE) >= trim('".$numchedes."') AND trim(A.NUMCHE) <= trim('".$numchehas."') AND
					A.TIPDOC >= trim('".$tipdes."') AND A.TIPDOC <= trim('".$tiphas."') AND
					C.NOMBEN >= '".$bendes."' AND C.NOMBEN <= '".$benhas."' AND
					to_date(A.FECEMI,'yyyy-mm-dd') >= to_date('".$fecdes."','dd/mm/yyyy') AND to_date(A.FECEMI,'yyyy-mm-dd') <= to_date('".$fechas."','dd/mm/yyyy') AND
					trim(A.NUMCUE) >= trim('".$numcuedes."') AND trim(A.NUMCUE) <= trim('".$numcuehas."') and
					A.STATUS = upper('".$status."') ORDER BY A.NUMCUE, A.FECEMI, A.NUMCHE";
	}

   return $this->select($sql);
  }
}
?>
