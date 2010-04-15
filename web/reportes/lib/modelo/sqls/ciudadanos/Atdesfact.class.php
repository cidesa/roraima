<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atdesfact extends baseClases
{
	function Sqlp($codexpdes,$codexphas)
	{
		$sql="select b.nroexp,a.nrospd,c.nompro,a.numfac,a.basimp,a.iva,a.total,a.exentos from atfacturas a,
              atayudas b,caprovee c where a.atayudas_id=b.id and b.caprovee_id=c.id and b.nroexp>='".$codexpdes."'
              and b.nroexp<='".$codexphas."' order by b.nroexp asc";
		/* print '<pre>';
						print_r($sql);
						 print '</pre>';
			exit;*/
		return $this->select($sql);
	}
}