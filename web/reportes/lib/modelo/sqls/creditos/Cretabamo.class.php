<?php
require_once("../../lib/modelo/baseClases.class.php");

class Cretabamo extends baseClases {

 function sqlp($fecprc1,$fecprc2,$cedrif1,$cedrif2)
  {
  	     $sql= "
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
				(B.monimp-B.monaju) as Mon_Aju
				FROM
				CPPAGOS as A,
				CPIMPPAG as B,
				CPDOCPAG as D";
              // H::printR($sql); exit;
     return $this->select($sql);
	}
}
?>