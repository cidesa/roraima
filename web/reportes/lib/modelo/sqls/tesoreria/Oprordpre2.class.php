<?php

require_once("../../lib/modelo/baseClases.class.php");

class Oprordpre2 extends baseClases
{

 function sqlp1($numorddes,$numordhas)
  {
  	  $sql="SELECT A.NUMORD as ORDEN, A.NUMORD as NUMORD, A.CEDAUT, A.NOMPER1, A.ANOPRE,
			 A.CEDRIF, A.CTABAN, A.TIPCAU, A.ANOPRE, A.NOMBEN, A.DESORD, A.CEDAUT,
			 A.MONORD, A.MONRET, to_char(A.FECEMI,'dd/mm/yyyy') as fecemi, to_char(A.FECEMI,'yyyy') as ano,A.NUMCOM,
			 A.PERAUT, A.NUMTIQ, (A.MONORD-A.MONRET-A.MONDES) as NETO,
			(CASE WHEN A.STATUS='I' THEN 'Pagadas' WHEN A.STATUS='N' THEN 'Pendiente por Pagar' WHEN A.STATUS='A' THEN 'Anuladas' WHEN A.STATUS='C' THEN 'Contraloría' WHEN A.STATUS='E' THEN 'Elaborada' END) as STAORD,D.NOMEXT
		FROM OPORDPAG as A,CPDOCCAU as D
		WHERE
			trim(A.NUMORD) >= trim('".$numorddes."')
			AND trim(A.NUMORD) <= trim('".$numordhas."')
			AND A.TIPCAU = D.TIPCAU
			AND A.STATUS <> 'A'
		ORDER BY RTRIM(A.NUMORD)";
//print '<pre>'; print $this->sqlp; exit;
	return $this->select($sql);
  }


 function sqlp2($numorddes,$numordhas,$bendes,$benhas,$fechades,$fechahas,$tipcaudes,$tipcauhas)
  {
  	  $sql="SELECT A.NUMORD as ORDEN, A.NUMORD as NUMORD, A.CEDAUT, A.NOMPER1, A.ANOPRE,
			 A.CEDRIF, A.CTABAN, A.TIPCAU, A.ANOPRE, A.NOMBEN, A.DESORD, A.CEDAUT,
			 A.MONORD, A.MONRET, to_char(A.FECEMI,'dd/mm/yyyy') as fecemi, to_char(A.FECEMI,'yyyy') as ano,A.NUMCOM,
			 A.PERAUT, A.NUMTIQ, (A.MONORD-A.MONRET-A.MONDES) as NETO,
			(CASE WHEN A.STATUS='I' THEN 'Pagadas' WHEN A.STATUS='N' THEN 'Pendiente por Pagar' WHEN A.STATUS='A' THEN 'Anuladas' WHEN A.STATUS='C' THEN 'Contraloría' WHEN A.STATUS='E' THEN 'Elaborada' END) as STAORD,D.NOMEXT
		FROM OPORDPAG as A,CPDOCCAU as D
		WHERE
			trim(A.NUMORD) >= trim('".$numorddes."')
			AND trim(A.NUMORD) <= trim('".$numordhas."')
			AND trim(A.CEDRIF) >= trim('".$bendes."')
			AND trim(A.CEDRIF) <= trim('".$benhas."')
			AND (A.FECEMI) >= to_date('".$fechades."','dd-mm-yyyy')
			AND (A.FECEMI) <= to_date('".$fechahas."','dd-mm-yyyy')
			AND (A.TIPCAU) >= ('".$tipcaudes."')
			AND (A.TIPCAU) <= ('".$tipcauhas."')
			AND A.TIPCAU = D.TIPCAU
			AND A.STATUS <> 'A'
		ORDER BY RTRIM(A.NUMORD)";
 //print '<pre>'; print $sql; exit;
	return $this->select($sql);
  }







}
?>
