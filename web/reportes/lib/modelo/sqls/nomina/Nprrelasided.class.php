<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprrelasided extends BaseClases {


public function SQLp($codempdes,$codemphas, $ano)
    {

	   $sql = "select b.codemp, to_char(b.fecnom,'mm') as mes,to_char(b.fecnom,'yyyy') as ano,sum(b.monto) as suma
	from npconsueldo a, nphiscon b 
	where 
		a.codnom=b.codnom and 
		a.codcon=b.codcon and 
		b.codemp>=('".$codempdes."') and
		b.codemp<=('".$codemphas."') and 
		to_char(b.fecnom,'yyyy')='".$ano."'
	group by b.codemp,to_char(b.fecnom,'mm'),to_char(b.fecnom,'yyyy') 
	order by b.codemp";
//print $sql; 
       return $this->select($sql);

    }

public function SQLv($codempdes, $codemphas)
    {

	   $sql = "select distinct b.codemp, a.nomemp, a.cedemp, a.dirhab
	from nphojint a, nphiscon b 
	where 
		a.codemp=b.codemp and 
		b.codemp>=('".$codempdes."') and
		b.codemp<=('".$codemphas."') 
	order by b.codemp";
//print $sql;
       return $this->select($sql);

    }
	
public function SQLx($codempdes,$codemphas, $ano)
    {	
		$sql = "select a.codtipapo,a.destipapo,c.codemp,sum(c.monto) as suma,
       to_char(c.fecnom,'yyyy') as ano
	from nptipaportes a, npcontipaporet b, nphiscon c
	where
		b.codnom=c.codnom and
		b.codcon=c.codcon and
		a.codtipapo=b.codtipapo and
		b.tipo='R' and
		c.codemp>=('".$codempdes."') and
		c.codemp<=('".$codemphas."') and 
		to_char(c.fecnom,'yyyy')='".$ano."'
group by a.codtipapo,a.destipapo,c.codemp,to_char(c.fecnom,'yyyy')
order by a.codtipapo";
	
//print $sql;
	return $this->select($sql);

    }
	

public function SQLy($codempdes,$codemphas, $ano)
    {

	   $sql = "select b.codemp, to_char(b.fecnom,'yyyy') as ano,sum(b.monto) as suma, b.nomcon 
	from npconarc a, nphiscon b 
	where 
		a.codnom=b.codnom and 
		a.codcon=b.codcon and 
		b.codemp>=('".$codempdes."') and
		b.codemp<=('".$codemphas."') and 
		to_char(b.fecnom,'yyyy')='".$ano."'
	group by b.codemp,to_char(b.fecnom,'yyyy'), b.nomcon  
	order by b.codemp";
//print $sql;
       return $this->select($sql);

    }

public function empresa()
    {
	$sql="select nomemp, diremp, tlfemp from empresa where codemp = '001'";
	return $this->select($sql);
    }
}
?>