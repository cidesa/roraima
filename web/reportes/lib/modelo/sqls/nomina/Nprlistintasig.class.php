<?php
require_once("../../lib/modelo/baseClases.class.php");

class Prenomina extends baseClases {

    function SQLp($especial,$codnomhas,$codempdes,$codemphas,$codcardes,$codcarhas) {
    	$sql = "select distinct
				a.codemp,
				to_char(c.fecing,'dd/mm/yyyy') as fecing,
				substr(b.nomcar,0,36) as nomcar,
				c.nomemp,
				c.cedemp,to_char(a.fecnom,'dd/mm/yyyy') as fecnom,to_char(a.fecnomdes,'dd/mm/yyyy') as fecnomdes
			from
				npnomcal a,
				npcargos b,
				nphojint c,
				npdefcpt e, npnomina d
			where
				a.codnom = '$codnomhas' and
				a.especial='$especial' and
				a.codcar=b.codcar and
				a.codemp=c.codemp and
				a.codnom=d.codnom and
			    e.impcpt='S'
				order by a.codemp ";

//print $sql;exit;

        return $this->select($sql);
    }

    function sql_asig($nomina)//asignaciones de la nomina
    {
    	$sql="select distinct
					a.codcon,
					b.nomcon
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					b.impcpt='S' and
					a.asided = 'A' and
					a.codnom='$nomina'
				order by a.codcon";
//print $sql;exit;
    	return $this->select($sql);
    }

    function sql_datos($cod,$codnom, $especial,$nomina)//busca las asignaciones de un empleado
    {

        $rs1 = $this->select("SELECT distinct codcon as codcon, sum(monto) as monto FROM NPASICONEMP WHERE codemp = '".$cod."' and asided = 'A'
    	group by codcon order by codcon");
    	$n1 = count ($rs1);

    	$rs2 = $this->select ("select distinct
					a.codcon,
					b.nomcon
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					b.impcpt='S' and
					a.asided = 'A' and
					a.codnom='$nomina'
				order by a.codcon");

    	$n2 = count ($rs2);
    	//print $n1; print $n2;


    	if ($n1 == $n2)
        {
           $sql= "select a.codcon, a.saldo from (SELECT distinct codcon, sum(saldo) as saldo
          FROM NPNOMCAL WHERE codemp = '".$cod."' and asided = 'A'
    	group by codcon order by codcon) a left outer join (select distinct
					a.codcon,
					b.nomcon
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					b.impcpt='S' and
					a.asided = 'A' and
					a.codnom='$nomina'
				order by a.codcon) b on (a.codcon = b.codcon)";

        }

        else
        {
        	$sql= "select a.codcon, a.saldo from (SELECT distinct codcon, sum(saldo) as saldo
            FROM NPNOMCAL WHERE codemp = '".$cod."' and asided = 'A'
    	group by codcon order by codcon) a right outer join (select distinct
					a.codcon,
					b.nomcon
				from
					npnomcal a,
					npdefcpt b
				where
					a.codcon=b.codcon and
					b.impcpt='S' and
					a.asided = 'A' and
					a.codnom='$nomina'
				order by a.codcon) b on (a.codcon = b.codcon)";

        }


//print $sql;exit;

    	return $this->select($sql);
    }


}
?>