<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atregdiar extends baseClases
{
	function sqlp($expdes,$exphas,$fechades,$fechahas){
		$sql=  "select DISTINCT to_char(a.fecsol,'dd/mm/YYYY') as fecha,b.nomciu as nombre, b.apeciu as apellido, b.sexo as sexo,
        			  b.cedciu as cedula,extract(year from age(now(),b.fecnac)) as edad, b.ciudad as localidad,
      				  b.telhab as telefono,a.nroexp as expediente,c.desayu as descripcion, d.desrub as motivo,a.monayu as presupuesto,
      				   CASE WHEN b.tipo='P' THEN 'Particular' WHEN b.tipo='C' THEN 'Concejo Comunal'
      				   WHEN b.tipo='E' THEN 'Empresa' WHEN b.tipo='O' THEN 'Organismo del Estado' END as tipo,
      				   ( select desinsref from  atinsrefier where b.atinsrefier_id=id) as organismo
                  from
                    atayudas a, atciudadano b, attipayu c, atrubros d

                  WHERE
                   a.attipayu_id = c.id and
                   a.atrubros_id = d.id and

                   a.nroexp >= '".$expdes."' and

                   a.nroexp <= '".$exphas."' and

                   a.fecsol >=to_date('$fechades','dd/mm/YYYY') and

                   a.fecsol <=to_date('$fechahas','dd/mm/YYYY')
                    order by fecha,cedula";// H::PrintR($sql);exit;
		
		return $this->select($sql);
	}
}