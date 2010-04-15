<?php

require_once("../../lib/modelo/baseClases.class.php");

class Carsolegrpre extends baseClases
{


function sqlp($codreqdes,$codreqhas)
  {
		$sql="SELECT distinct
				A.REQART as reqart,
				to_char(A.FECREQ,'dd/mm/yyyy') as fecreq,
				to_char(A.FECREQ,'yyyy') as ano,
				A.DESREQ as desreq,
				(CASE WHEN A.VALMON = 0 THEN A.MONREQ  ELSE A.MONREQ/A.VALMON END) as MONREQ,
				(CASE WHEN A.VALMON = 0 THEN A.MONDES  ELSE A.MONDES/A.VALMON END) as MONDES,
				A.MOTREQ as motreq,
				A.BENREQ as benreq,
				A.OBSREQ as obsreq,
				B.CODART as codart,
				B.CODCAT as codcat,
				D.NOMCAT as nomcat,
				B.CANREQ as canreq,
				(CASE WHEN A.VALMON = 0 THEN B.COSTO  ELSE B.COSTO/A.VALMON END) as COSTO,
				(CASE WHEN A.VALMON = 0 THEN B.MONRGO ELSE B.MONRGO/A.VALMON END) as MONRGO,
				(CASE WHEN A.VALMON = 0 THEN B.MONTOT ELSE B.MONTOT/A.VALMON END) as MONTOT,
				C.UNIMED as unimed,C.CODPAR AS CODPAR,
				C.DESART as desart,
				(CASE WHEN A.VALMON = 0 THEN 1  ELSE A.VALMON END) as VALMON,
				A.VALMON as valmon,
				A.TIPMON as tipmon,
				A.CODPRO
				--E.REFPRC as refprc,
				--E.CODPRE as codpre,
				--F.NOMPRE as nompre,
				--E.MONIMP as monimp
			FROM
				CASOLART A,
				CAARTSOL B,
				CAREGART C,
				NPCATPRE D,
				CPIMPPRC E,
				CPDEFTIT F
			WHERE
				A.REQART=B.REQART AND
				B.CODART=C.CODART AND
				E.CODPRE=F.CODPRE AND
				A.REQART=E.REFPRC AND
				RTRIM(B.CODCAT)=RTRIM(D.CODCAT) AND
				A.REQART >='".$codreqdes."' AND
				A.REQART <='".$codreqhas."'
				ORDER BY A.REQART,B.CODART";
				#H::PrintR($sql);exit;
	//print '<pre>';print $sql;exit;
   return $this->select($sql);
  }

  function sqlp1($codreqdes,$codreqhas)//este esta para hacer la prueba
  {
		$sql="SELECT
				A.REQART as reqart,
				to_char(A.FECREQ,'dd/mm/yyyy') as fecreq,
				to_char(A.FECREQ,'yyyy') as ano,
				A.DESREQ as desreq,
				(CASE WHEN A.VALMON = 0 THEN A.MONREQ  ELSE A.MONREQ/A.VALMON END) as MONREQ,
				(CASE WHEN A.VALMON = 0 THEN A.MONDES  ELSE A.MONDES/A.VALMON END) as MONDES,
				A.MOTREQ as motreq,
				A.BENREQ as benreq,
				A.OBSREQ as obsreq,
				B.CODART as codart,
				B.CODCAT as codcat,
				D.NOMCAT as nomcat,
				B.CANREQ as canreq,
				(CASE WHEN A.VALMON = 0 THEN B.COSTO  ELSE B.COSTO/A.VALMON END) as COSTO,
				(CASE WHEN A.VALMON = 0 THEN B.MONRGO ELSE B.MONRGO/A.VALMON END) as MONRGO,
				(CASE WHEN A.VALMON = 0 THEN B.MONTOT ELSE B.MONTOT/A.VALMON END) as MONTOT,
				C.UNIMED as unimed,
				C.DESART as desart,
				(CASE WHEN A.VALMON = 0 THEN 1  ELSE A.VALMON END) as VALMON,
				A.VALMON as valmon,
				A.TIPMON as tipmon,
				A.CODPRO,
				E.REFPRC as refprc,
				E.CODPRE as codpre,
				F.NOMPRE as nompre,
				E.MONIMP as monimp
			FROM
				CASOLART A,
				CAARTSOL B,
				CAREGART C,
				NPCATPRE D,
				CPIMPPRC E,
				CPDEFTIT F
			WHERE
				A.REQART=B.REQART AND
				B.CODART=C.CODART AND
				E.CODPRE=F.CODPRE AND
				A.REQART=E.REFPRC AND
				RTRIM(B.CODCAT)=RTRIM(D.CODCAT) AND
				A.REQART >='".$codreqdes."' AND
				A.REQART <='".$codreqhas."'
				ORDER BY A.REQART,B.CODART";
				//H::PrintR($sql);exit;
	//print $sql;exit;
   return $this->select($sql);
  }

  function sql_nompre($codcat)
  {
   $sql="select a.nompre as nombre
	from cpdeftit a
	where rtrim(a.codpre)=rtrim('".$codcat."')";
   return $this->select($sql);
  }

  function sql_cpniveles($tip='C')
  {
   $sql="select nomabr, nomext from cpniveles where catpar like '".$tip."' and staniv='A' order by consec";
   return $this->select($sql);
  }

  function sql_codpre($reqart)
  {
   $sql="select distinct codpre from cadisrgo where reqart='".$reqart."'";
   return $this->select($sql);

//print $sql;
  }



}
?>
