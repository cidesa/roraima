<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprsuelbas extends baseClases {

    function SQLp($especial,$codnomhas,$codempdes,$codemphas,$codcardes,$codcarhas) {
    	$sql = "select distinct
				a.codemp,
				a.saldo as suecar, cast (a.codcar as int ) as codcarord,
				c.nomemp,
				c.cedemp,to_char(a.fecnom,'dd/mm/yyyy') as fecnom,to_char(a.fecnomdes,'dd/mm/yyyy') as fecnomdes
			from
				npnomcal a right outer join
				npconsueldo b on (a.codcon = b.codcon),
				nphojint c,
				npdefcpt e, npnomina d
			where
				a.codnom = '$codnomhas' and
				a.especial='$especial' and
				a.codnom = b.codnom and
				a.codemp=c.codemp and
				a.codnom=d.codnom and
			    e.impcpt='S'
				order by codcarord, a.codemp ";

//print $sql;exit;

        return $this->select($sql);
    }



}
?>