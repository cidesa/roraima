<?php
require_once("../../lib/modelo/baseClases.class.php");

class PrePrc extends baseClases{
 function sqlp($fecprc1,$fecprc2,$tipprc1,$tipprc2,$pre1,$pre2,$codpre1,$codpre2,$comodin,$estatus,$estatus2)
  {
  	  if($estatus=="T"){

  	  	$staprc="";
  	  	$stacom="";
  	  	$stacau="";
  	  	$stapag="";
  	  }
  	  else if ($estatus=="A"){

  	  	$staprc= "AND A.STAPRC='".$estatus."'";
  	  	$stacom="AND A.STACOM='".$estatus."'";
  	  	$stacau="AND A.STACAU='".$estatus."'";
  	  	$stapag="AND A.STAPAG='".$estatus."'";
  	  }
  	  else if($estatus=="N"){
  	  	$staprc= "AND A.STAPRC='".$estatus."'";
  	  	$stacom="AND A.STACOM='".$estatus."'";
  	  	$stacau="AND A.STACAU='".$estatus."'";
  	  	$stapag="AND A.STAPAG='".$estatus."'";
  	  }

  	  if ($comodin ==""){

  	  	$strcomodin = "";
  	  	  	  }
  	  else
  	  {
  	  	$strcomodin = "AND B.CODPRE LIKE RTRIM('".$comodin."')";
  	  }
////////////////////////////////////////////////////////////7
  	  if($estatus2=="T"){

  	  	$comprometido="";
  	  	$causado="";
  	  	$pagado="";
  	  }
  	  else if ($estatus2=="R"){

		$imputado="B.monimp=0 and";
  	  	$comprometido= "B.MonCom=0 AND";
  	  	$causado="B.moncau=0 and";
  	  	$pagado="B.monpag=0 and";

  	  }
  	  else if($estatus2=="O"){
  	  	$imputado="B.monimp>0 and";
  	  	$comprometido= "B.MonCom>0 AND";
  	  	$causado="B.moncau=0 and";
  	  	$pagado="B.monpag=0 and";
  	  }
  	  else if($estatus2=="C"){
  	  	$imputado="B.monimp>0 and";
  	  	$comprometido= "B.MonCom>0 AND";
  	  	$causado="B.moncau>0 and";
  	  	$pagado="B.monpag=0 and";
  	  }
  	  else if($estatus2=="P"){
  	  	$imputado="B.monimp>0 and";
  	  	$comprometido= "B.MonCom>0 AND";
  	  	$causado="B.moncau>0 and";
  	  	$pagado="B.monpag0 and";
  	  }

//print $estatus2;exit;
/////////////////////////////////////////////////////////////7777777

  	   $sql= " SELECT
               P.nompre,
               referencia,
               descripcion,
               tipo,
               fecha,
               cedrif,nomben,
               estat,
			   codigo,
			   imputado,
			   comprometido,
			   causado,
			   pagado,
			   Ajuste,
			   Mon_Aju
               FROM (SELECT
               A.REFPRC as referencia,
               A.DESPRC as descripcion,
               A.TIPPRC as tipo,
               to_char(A.FECPRC,'dd/mm/yyyy') as fecha,
               A.CEDRIF as cedrif,
               A.staprc as estat,
			   B.CODPRE as codigo,
			   B.MONIMP as imputado,
			   B.MonCom as comprometido,
			   B.MonCau as causado,
			   B.MonPag as pagado,
			   B.MonAju as Ajuste,
			   (B.MonImp-B.MonAju) as Mon_Aju, c.nomben
			    FROM
			    CPPRECOM as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
			    CPIMPPRC as B
				WHERE
  	  			".$comprometido."
  	  			".$causado."
		  	  	".$pagado."
				A.REFPRC = B.REFPRC
				AND (A.FECPRC >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECPRC <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (RTRIM(A.TIPPRC) >= RTRIM('".$tipprc1."') AND RTRIM(A.TIPPRC)<= RTRIM('".$tipprc2."'))
				AND (A.REFPRC)>=RTRIM('".$pre1."') AND (A.REFPRC) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))".
				$strcomodin.$staprc."
				UNION
				SELECT
				A.refcom as referencia,
				RTRIM(A.descom) as descripcion,
				A.tipcom as tipo,
				to_char(A.feccom,'dd/mm/yyyy') as fecha,
				A.CEDRIF as cedrif,
				a.stacom as estat,
				RTRIM(B.CodPre) as codigo,
				B.monimp as imputado,
				B.monimp as comprometido,
				B.moncau as causado,
				B.monpag as pagado,
				B.monaju as Ajuste,
				(B.monimp-B.monaju)as Mon_Aju, c.nomben
				FROM
				CPCOMPRO as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
				CPIMPCOM as B,
				CPDOCCOM as D
				WHERE
				".$imputado."
  	  			".$causado."
		  	  	".$pagado."
				A.TIPCOM=D.TIPCOM AND RTRIM(D.AFEPRC)='S'
				AND A.REFCOM = B.REFCOM
				AND (A.FECCOM >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECCOM <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (RTRIM(A.TIPCOM) >= RTRIM('".$tipprc1."') AND RTRIM(A.TIPCOM) <= RTRIM('".$tipprc2."'))
				AND (A.REFCOM)>=RTRIM('".$pre1."')  AND (A.REFCOM) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))".
				$strcomodin.$stacom."
				UNION
				SELECT
				A.refcau as referencia,
				RTRIM(A.descau)as descripcion,
				A.tipcau as tipo,
				to_char(A.feccau,'dd/mm/yyyy') as fecha,
				A.CEDRIF as cedrif,
				a.stacau as estat,
				RTRIM(B.CodPre ) as codigo,
				B.monimp as imputado,
				B.monimp as comprometido,
				B.monIMP as causado,
				B.monpag as pagado,
				B.monaju as Ajuste,
				(B.monimp-B.monaju) as Mon_Aju, c.nomben
				FROM
				CPCAUSAD as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
				CPIMPCAU as B,
				CPDOCCAU as D
				WHERE
				".$imputado."
		  	  	".$pagado."
				A.TIPCAU=D.TIPCAU AND RTRIM(D.AFEPRC)='S'
                AND A.REFCAU = B.REFCAU
                AND (A.FECCAU >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECCAU <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (RTRIM(A.TIPCAU) >=  RTRIM('".$tipprc1."') AND RTRIM(A.TIPCAU) <=  RTRIM('".$tipprc2."'))
				AND (A.REFCAU)>=RTRIM('".$pre1."') AND (A.REFCAU) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))".
				$strcomodin.$stacau."
				UNION
				SELECT
				A.refpag as referencia,
				RTRIM(A.despag)as descripcion,
				A.tippag as tipo,
				to_char(A.fecpag,'dd/mm/yyyy') as fecha,
				A.CEDRIF as cedrif,
				a.stapag as estat,
				RTRIM(B.CodPre ) as codigo,
				B.monimp as imputado,
				B.monimp as comprometido,
				B.monIMP as causado,
				B.monIMP as pagado,
				B.monaju as Ajuste,
				(B.monimp-B.monaju) as Mon_Aju, c.nomben
				FROM
				CPPAGOS as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
				CPIMPPAG as B,
				CPDOCPAG as D
				WHERE
				".$imputado."
				A.TIPPAG=D.TIPPAG
				AND RTRIM(D.AFEPRC)='S'
                AND A.REFPAG = B.REFPAG
                AND (A.FECPAG >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECPAG <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (A.TIPPAG >=  RTRIM('".$tipprc1."') AND RTRIM(A.TIPPAG) <=  RTRIM('".$tipprc2."'))
				AND (A.REFPAG)>=RTRIM('".$pre1."') AND (A.REFPAG) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))".
				$strcomodin.$stapag."ORDER BY fecha,referencia desc,codigo,estat
			     ) as J left outer join CPDEFTIT P on (RTRIM(J.CODIGO)=RTRIM(P.CODPRE))";
                //H::printR($sql); exit;
 return $this->select($sql);
	}
}
?>