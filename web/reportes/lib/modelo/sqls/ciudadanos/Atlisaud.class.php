<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atlisaud extends baseClases
{

    function SQLp($ceddes,$cedhas,$unides,$unihas,$fechades,$fechahas,$fechaades,$fechaahas,$fechardes,$fecharhas,$combostatus,$combofecha) {
    	/* echo $sql="select
    			a.motaud,
    			a.persona,
    			a.status,
    			a.fecha,
    			a.fechaa,
    			a.fechar,
    		    a.lugar,
    		    a.observacion,
    		    b.cedula,
    		    b.nombre,
    		    c.coduni,
    		    c.desuni
    		from
    			ataudiencias a,
    			atsolici b,
    			atunidades c
    		where
    			a.status >= '$combostatus' and
				a.coduni >= '$unides' and
				a.coduni <= '$unihas' and
				a.fecha  >= to_date('$fechades','dd/mm/yyyy') and
				a.fecha  <= to_date('$fechahas','dd/mm/yyyy') and
				a.fechaa >= to_date('$fechaades','dd/mm/yyyy') and
				a.fechaa <= to_date('$fechaahas','dd/mm/yyyy') and
				a.fechar >= to_date('$fechardes','dd/mm/yyyy') and
				a.fechar <= to_date('$fecharhas','dd/mm/yyyy') and
				b.cedula >= '$ceddes' and
				b.cedula <= '$cedhas' and
				a.atsolici_id = b.id and
				a.atunidades_id = c.id
			order by
				a.atsolici_id";
*/
//[AU=>Audiencia, AT=>Atención, R=>Registro]
		if ($combofecha=='AU')
		{
			$fecha = "a.fecha  >= to_date('$fechades','dd/mm/yyyy') and
				      a.fecha  <= to_date('$fechahas','dd/mm/yyyy') and";

		}elseif ($combofecha=='AT')
		{
			$fecha = "a.fechaa  >= to_date('$fechades','dd/mm/yyyy') and
				      a.fechaa  <= to_date('$fechahas','dd/mm/yyyy') and";

		}elseif ($combofecha=='R')
		{
			$fecha = "a.fechar  >= to_date('$fechades','dd/mm/yyyy') and
				      a.fechar  <= to_date('$fechahas','dd/mm/yyyy') and";
		}


    	$sql="select
    		    b.cedula,
    		    b.nombre,
    		    c.coduni,
    		    c.desuni,
    		    a.persona,
    		    a.status,
    		    to_char(a.fecha,'dd/mm/yyyy') as fecha,
		        to_char(a.fechaa,'dd/mm/yyyy') as fechaa,
		        to_char(a.fechar,'dd/mm/yyyy') as fechar,
		        a.motaud,
    		    a.lugar,
    		    a.observacion
    		from
    			ataudiencias a,
    			atsolici b,
    			atunidades c
    		where
    			a.status = '$combostatus' and
				c.coduni >= '$unides' and
				c.coduni <= '$unihas' and
				b.cedula >= '$ceddes' and
				b.cedula <= '$cedhas' and
				$fecha
				a.atsolici_id = b.id and
				a.atunidades_id = c.id
			order by
				b.cedula, c.coduni";
//H::printr($sql);
    	return $this->select($sql);
    }
 }
?>