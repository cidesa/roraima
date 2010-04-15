<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atlisaud extends baseClases
{

    function SQLp($ceddes,$cedhas,$comboestados)
    {
    	$sql="select
				a.cedula,
				a.nombre,
				a.tipo,
				a.sexo,
				a.fechan,
				a.estadoc,
				a.telefono,
				a.profesion,
				a.ciudad,
				a.caserio,
				a.direccion,
				a.consejoc,
				a.cargocc,
				e.desest,
				m.desmun,
				p.despar
			from
				atsolici as a,
				atestados as e,
				atmunicipios as m,
				atparroquias as p
			where
				a.cedula >= '$ceddes' and
				a.cedula <= '$cedhas' and
				a.atestados_id = '$comboestados' and
				a.atestados_id = e.id and
				a.atmunicipios_id = m.id and
				a.atparroquias_id = p.id
			order by
				a.cedula, a.nombre,e.desest, m.desmun, p.despar";
//H::printr($sql);
    	return $this->select($sql);
    }
 }
?>