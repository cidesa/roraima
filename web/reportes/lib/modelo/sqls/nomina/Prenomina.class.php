<?php
require_once("../../lib/modelo/baseClases.class.php");

class Prenomina extends baseClases {

    function SQLp($especial,$codnomhas,$codempdes,$codemphas,$codcardes,$codcarhas) {
    	$sql = "select distinct
				a.codemp,
				substr(b.nomcar,0,36) as nomcar,
				c.nomemp, to_char(c.fecing,'dd/mm/yyyy') as fecing,
				c.cedemp
			from
				npnomcal a,
				npcargos b,
				nphojint c,
				npdefcpt e
			where
				a.codnom = rpad('".$codnomhas."',3,'') and
				a.especial='".$especial."' and
				a.codcar=b.codcar and
				a.codemp=c.codemp and
			    e.impcpt='S'
				order by c.cedemp";

 	    print $sql;exit;

        return $this->select($sql);
    }

    function sql_asig($especial,$nomina)
    {
    	$sql="select distinct
					a.codcon,
				    a.nomnom,
					b.nomcon
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					b.impcpt='S' and
					a.asided='A' and
					a.especial='".$especial."'and
					a.codnom='".$nomina."'
				order by a.codcon";
//print $sql;exit;
    	return $this->select($sql);
    }

    function sql_datos($especial,$cod,$codcon,$codnom)
    {
    	$sql="select
    			    a.codemp,
    			    a.codcon,
					a.saldo
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					a.asided='A' and
					b.impcpt='S' and
					a.especial='".$especial."' and
					trim(a.codemp)=trim('".$cod."') and
					trim(a.codcon)=trim('".$codcon."') and
					trim(a.codnom)=('".$codnom."')";

//print $sql;exit;

    	return $this->select($sql);
    }

    function sql_dtos($especial,$cod,$codnom)
    {
    	$sql="select
					sum(a.saldo) as saldo
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					b.impcpt='S' and
					a.asided='D' and
					a.especial='".$especial."' and
					trim(a.codemp)=trim('".$cod."') and
					trim(a.codnom)=('".$codnom."')";

//print $sql;exit;

    	return $this->select($sql);

    }

 function sql_total($especial,$cod,$codnom)
    {
    	$sql="select
					sum(a.saldo) as saldo
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					b.impcpt='S' and
					a.asided='A' and a.especial='".$especial."' and
					trim(a.codcon)=trim('".$cod."') and
					trim(a.codnom)=('".$codnom."')";

//print $sql;exit;

    	return $this->select($sql);


    }


}
?>