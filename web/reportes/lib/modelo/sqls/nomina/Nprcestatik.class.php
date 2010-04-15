<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprcestatik extends baseClases {

    function SQLp($especial,$codnomhas,$codcondes,$tipnomesp) {

    	 if ($especial == 'S')
            {
            	$especial = " a.especial = 'S' AND 		(A.CODNOMESP) = TRIM('".$tipnomesp."') AND  ";
            }
            else
            {
            	if ($especial == 'N')       	$especial = " a.especial = 'N' AND"; else
            	if ($especial == 'T')         $especial = "";
            }


	    	$sql="select b.cedemp, b.nomemp ,a.saldo
						from
						NPNOMCAL a,NPHOJINT B
						where
						B.CODEMP = A.CODEMP and $especial
						a.codcon='".$codcondes."' and A.CODNOM = '".$codnomhas."'
						order by cast(REPLACE(b.cedemp,'.', '') as int ) ";


 	  //  H::PrintR($sql);exit;

        return $this->select($sql);
    }
}
?>