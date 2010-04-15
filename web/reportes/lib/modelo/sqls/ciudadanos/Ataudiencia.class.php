<?php
require_once("../../lib/modelo/baseClases.class.php");
class Ataudiencia extends baseClases
{
	function Sqlp($iddes,$idhas,$fechades,$fechahas,$cedula){
		$sql="select a.id,b.cedciu,b.nomciu,b.telhab,a.observacion,c.desuni,a.lugar,
            to_char(a.fechaa,'dd/mm/YYYY') as fechaa,to_char(a.fechar,'dd/mm/YYYY') as fechar from ataudiencias a
            ,atciudadano b, atunidades c where a.fechar>=to_date('$fechades','dd/mm/YYYY') and
            a.fechar<=to_date('$fechahas','dd/mm/YYYY') and b.cedciu like '$cedula%'
            and	a.atunidades_id=c.id and a.id>='".$iddes."' and a.id<='".$idhas."'";
		return $this->select($sql);
	}
}