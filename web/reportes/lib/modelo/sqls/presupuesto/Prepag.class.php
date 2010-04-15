<?php
require_once("../../lib/modelo/baseClases.class.php");

class Prepag extends baseClases{
 function sqlp($fecprc1,$fecprc2,$tipprc1,$tipprc2,$pre1,$pre2,$codpre1,$codpre2,$comodin,$estatus)
  {
  	  if($estatus=="T"){

  	   	$stacom="";
  	  	$stacau="";
  	  	$stapag="";
  	  }
  	  else if ($estatus=="A"){

  	   $stapag="AND A.STAPAG='".$estatus."'";
  	  }
  	  else if($estatus=="N"){
  	   $stapag="AND A.STAPAG='".$estatus."'";
  	  }

  	  if ($comodin ==""){

  	  	$strcomodin = "";
  	  	  	  }
  	  else
  	  {
  	  	$strcomodin = "AND B.CODPRE LIKE RTRIM('".$comodin."')";
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
			   Mon_Aju, status, monto
               FROM (
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
				(B.monimp-B.monaju) as Mon_Aju, B.staimp AS status, c.nomben,   	  a.monpag as monto
				FROM
				CPPAGOS as A left outer join opbenefi C on A.CEDRIF=C.CEDRIF,
				CPIMPPAG as B,
				CPDOCPAG as D
				WHERE
				A.TIPPAG=D.TIPPAG
				AND RTRIM(D.AFEPAG)<>'N'
                AND A.REFPAG = B.REFPAG
                AND (A.FECPAG >=to_date('".$fecprc1."','dd/mm/yyyy') AND A.FECPAG <=to_date('".$fecprc2."','dd/mm/yyyy'))
				AND (A.TIPPAG >=  RTRIM('".$tipprc1."') AND RTRIM(A.TIPPAG) <=  RTRIM('".$tipprc2."'))
				AND (A.REFPAG)>=RTRIM('".$pre1."') AND (A.REFPAG) <=RTRIM('".$pre2."')
				AND (B.CODPRE >=RTRIM('".$codpre1."') AND B.CODPRE<=RTRIM('".$codpre2."'))".
				$strcomodin.$stapag." ORDER BY fecha,referencia desc,codigo,estat
			     ) as J left outer join CPDEFTIT P on (RTRIM(J.CODIGO)=RTRIM(P.CODPRE))";
        //       H::printR($sql); exit;
 return $this->select($sql);
	}
}
?>