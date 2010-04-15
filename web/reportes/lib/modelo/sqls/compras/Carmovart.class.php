<?php

require_once("../../lib/modelo/baseClases.class.php");

class Carmovart extends baseClases 
{

function sqlp($forma,$codart1,$codart2)
  {
  	 $sql="SELECT A.CODART as acodart, A.DESART as adesart, A.EXITOT as aexitot FROM CAREGART A WHERE
						     LENGTH(RTRIM(CODART))=Trim(LenGTH(Trim('".$forma."')))	AND A.CODART >= '".$codart1."'
						     AND A.CODART <= '".$codart2."' ORDER BY CODART";
						//print $sql;exit;

   return $this->select($sql);
  }
  
function sql_caordcom($codart)
  {
  	 $sql= "SELECT A.CODART as artcom, B.ORDCOM, to_char(B.FECORD,'dd/mm/yyyy') as fecord, B.DESORD, A.CODCAT, C.NOMCAT  as nomcatord,
							 A.PREART,A.CANORD FROM  CAARTORD A,CAORDCOM B, NPCATPRE C
							 WHERE A.ORDCOM=B.ORDCOM AND
							 A.CODART='".$codart."' AND
							 A.CODCAT=C.CODCAT ORDER BY A.CODART, B.FECORD";

						//print $sql;

   return $this->select($sql);
  }

function sql_carcpart($codart)
  {
    $sql= "SELECT A.CODART as artrcp, A.RCPART,A.ORDCOM as ordrcp, to_char(B.FECRCP,'dd/mm/yyyy') as fecrcp,B.DESRCP,(A.MONTOT/A.CANREC) as cosrec,A.CANREC
							 FROM  CAARTRCP A,CARCPART B
							 WHERE A.RCPART=B.RCPART AND
							 A.CODART='".$codart."'
							 ORDER BY A.CODART, B.FECRCP";

//						print $sql;

   return $this->select($sql);
  }
function sql_careqart($codart)
  {

   $sql= "SELECT A.REQART, A.CODART as artreq,to_char(B.FECREQ,'dd/mm/yyyy') as fecreq,B.DESREQ,(A.MONTOT/A.CANREQ) as cosreq,A.CANREQ,A.CODCAT as carreq,C.NOMCAT as nomcatreq
							  FROM  CAARTREQ A,CAREQART B, NPCATPRE C
							  WHERE A.REQART=B.REQART AND
							  A.CODART='".$codart."' AND
							  A.CODCAT=C.CODCAT ORDER BY A.CODART, B.FECREQ";
	//					print $sql;

   return $this->select($sql);

  }

function sql_npcatpre($codart)
  {

   $sql="SELECT A.CODART as artdph,A.CANDPH,B.DPHART,to_char(B.FECDPH,'dd/mm/yyyy') as fecdph,B.DESDPH,A.CODCAT,C.NOMCAT as nomcatdph
							 FROM CAARTDPH A, CADPHART B, NPCATPRE C
							 WHERE A.DPHART=B.DPHART AND
							 A.CODART='".$codart."' AND
							 A.CODCAT=C.CODCAT ORDER BY A.CODART, B.FECDPH";
						//print $sql;exit;

   return $this->select($sql);

  }


function sql_cadefart()
  {
  	 $sql="SELECT FORART as formatoart FROM CADEFART";
						//print $sql;

   return $this->select($sql);
  }

}
?>