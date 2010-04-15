<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprautvac extends baseClases {

  function sqlp($empdes,$emphas)
  {
	$sql="SELECT DISTINCT
			A.CODEMP,
			B.CEDEMP,
			B.NOMEMP,
			B.FECING,
			A.FECDES,
			A.FECHAS,
			A.FECVAC
			FROM
			NPVACSALIDAS A,
			NPHOJINT B
			WHERE
			A.CODEMP>='$empdes' AND
			A.CODEMP<='$emphas' AND
			A.CODEMP=B.CODEMP
			ORDER BY A.CODEMP,A.FECVAC";
   //H::PrintR($sql);exit;
   return $this->select($sql);
  }

  function sqlp2($empdes)
  {
	$sql="SELECT
			C.PERINI,
			C.PERFIN,
			C.DIASVAC
			FROM
			NPVACSALIDAS_DET C
			WHERE
			C.CODEMP='$empdes'
			ORDER BY C.PERINI,
			C.PERFIN";
 //  H::PrintR($sql);exit;
   return $this->select($sql);
  }
}
?>