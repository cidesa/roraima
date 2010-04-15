<?php
require_once("../../lib/modelo/baseClases.class.php");

class Precom extends baseClases{
 function sqlp($fecprc1,$fecprc2,$tipprc1,$tipprc2,$pre1,$pre2,$codpre1,$codpre2,$comodin,$estatus)
  {
  	  if($estatus=="T"){

  	   	$stacom="";
  	  	$stacau="";
  	  	$stapag="";
  	  }
  	  else if ($estatus=="A"){

  	   	$stacom="AND A.STACOM='".$estatus."'";
  	  	$stacau="AND A.STACAU='".$estatus."'";
  	  	$stapag="AND A.STAPAG='".$estatus."'";
  	  }
  	  else if($estatus=="N"){
  	   	$stacom="AND A.STACOM='".$estatus."'";
  	  	$stacau="AND A.STACAU='".$estatus."'";
  	  	$stapag="AND A.STAPAG='".$estatus."'";
  	  }

  	  if ($comodin=="")
  	  {
  	  	$filtro = "";
  	  }
  	  else
  	  {
  	  	$filtro = "".$filtro;
  	  }





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
			   Mon_Aju, monto
               FROM (SELECT
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
				(B.monimp-B.monaju)as Mon_Aju, c.nomben,   	  a.moncom as monto
				FROM
				CPCOMPRO as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
				CPIMPCOM as B,
				CPDOCCOM as D
				WHERE
				A.TIPCOM=D.TIPCOM AND RTRIM(D.AFECOM)='S'
				AND A.REFCOM = B.REFCOM
				AND (A.FECCOM >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECCOM <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (RTRIM(A.TIPCOM) >= RTRIM('".$tipprc1."') AND RTRIM(A.TIPCOM) <= RTRIM('".$tipprc2."'))
				AND (A.REFCOM)>=RTRIM('".$pre1."')  AND (A.REFCOM) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))
				".$filtro.$stacom."
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
				(B.monimp-B.monaju) as Mon_Aju, c.nomben, a.moncau as monto
				FROM
				CPCAUSAD as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
				CPIMPCAU as B,
				CPDOCCAU as D
				WHERE
				A.TIPCAU=D.TIPCAU AND RTRIM(D.AFECOM)='S'
                AND A.REFCAU = B.REFCAU
                AND (A.FECCAU >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECCAU <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (RTRIM(A.TIPCAU) >=  RTRIM('".$tipprc1."') AND RTRIM(A.TIPCAU) <=  RTRIM('".$tipprc2."'))
				AND (A.REFCAU)>=RTRIM('".$pre1."') AND (A.REFCAU) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))
				".$filtro.$stacau."
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
				(B.monimp-B.monaju) as Mon_Aju, c.nomben, a.monpag as monto
				FROM
				CPPAGOS as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
				CPIMPPAG as B,
				CPDOCPAG as D
				WHERE
				A.TIPPAG=D.TIPPAG
				AND RTRIM(D.AFECOM)='S'
                AND A.REFPAG = B.REFPAG
                AND (A.FECPAG >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECPAG <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (A.TIPPAG >=  RTRIM('".$tipprc1."') AND RTRIM(A.TIPPAG) <=  RTRIM('".$tipprc2."'))
				AND (A.REFPAG)>=RTRIM('".$pre1."') AND (A.REFPAG) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))
				".$filtro.$stapag."ORDER BY fecha,referencia asc,codigo,estat
			    ) as J left outer join CPDEFTIT P on (RTRIM(J.CODIGO)=RTRIM(P.CODPRE))";
                //H::printR($sql); exit;
 return $this->select($sql);
	}
}
?>