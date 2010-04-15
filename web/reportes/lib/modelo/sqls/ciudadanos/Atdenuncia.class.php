<?php
require_once("../../lib/modelo/baseClases.class.php");

class Atdenuncia extends baseClases
{
	function Sqlp($iddes,$idhas,$fechades,$fechahas,$cedula)
	{
		$sql="select a.id,b.cedciu,b.nomciu,b.telhab,a.desden,c.desuni,
              to_char(a.fechaa,'dd/mm/YYYY') as fechaa,to_char(a.fechar,'dd/mm/YYYY') as
              fechar,a.respuesta from atdenuncias a,atciudadano b,atunidades c where a.id>='".$iddes."'
              and a.id<='".$idhas."' and b.cedciu like'".$cedula."%' and a.fechar>=to_date('$fechades','dd/mm/YYYY')
              and a.fechar<=to_date('$fechahas','dd/mm/YYYY') and a.atsolici=b.id and a.atunidades_id=c.id";

            /*   print '<pre>';
						print_r(  $sql);
						 prin*/
			 return $this->select($sql);
	}
}