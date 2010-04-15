<?php

require_once("../../lib/modelo/baseClases.class.php");

class Bnrlisactmuecat extends baseClases
{

 function sqlp($codact1,$codact2,$codubides,$codubihas,$codmue1,$codmue2)
  {
  	 $sql="SELECT c.CODMUE,
				generar_descripcion(c.CODMUE) as DESMUE,
				c.marmue,
				c.modmue,
				c.sermue,
				to_char(c.feccom,'dd/mm/yyyy') as feccom,
				formatonum(c.valini) as valini,
				to_char(c.fecreg,'dd/mm/yyyy') as fecreg,
				c.stamue,c.detmue,trim(c.codact) as codact,
				b.desact,
				c.viduti, (c.valini) as valini2
				FROM bnregmue c, bndefact as b
				whERE RTRIM(c.codubi) >= RTRIM('".trim($codubides)."')AND
				RTRIM(c.CODUBI) <= RTRIM('".trim($codubihas)."') and
 				rtrim(c.codact)>= RTRIM('".trim($codact1)."') and
 				rtrim(c.codact)<= RTRIM('".trim($codact2)."') and
 				rtrim(c.codmue)>= RTRIM('".trim($codmue1)."') and
 				rtrim(c.codmue)<= RTRIM('".trim($codmue2)."') and
 				c.codact=b.codact ORDER BY  c.codact
						";
   //   print '<pre>'; print $sql; exit;

   return $this->select($sql);
  }
}
?>