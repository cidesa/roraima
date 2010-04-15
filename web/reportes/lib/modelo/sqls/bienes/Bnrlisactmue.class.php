<?php

require_once("../../lib/modelo/baseClases.class.php");

class Bnrlisactmue extends baseClases
{

 function sqlp($codact1,$codact2,$codubides,$codubihas)
  {
  	 $sql="SELECT c.CODMUE,
				generar_descripcion(c.CODMUE) as DESMUE,
				to_char(c.feccom,'dd/mm/yyyy') as feccom,
				c.valini,
				to_char(c.fecreg,'dd/mm/yyyy') as fecreg,
				c.stamue,c.detmue,trim(c.codact) as codact,
				b.desact,
				c.viduti,
				c.codubi,
				a.desubi
				FROM bnregmue c, bnubibie as a, bndefact as b
				whERE RTRIM(c.codubi) >= RTRIM('".trim($codubides)."')AND
				RTRIM(c.CODUBI) <= RTRIM('".trim($codubihas)."') and
 				rtrim(c.codact)>= RTRIM('".trim($codact1)."') and
 				rtrim(c.codact)<= RTRIM('".trim($codact2)."') and
 				c.codubi=a.codubi and
 				c.codact=b.codact ORDER BY c.codubi, c.codact
						";
   //    print '<pre>'; print $sql; exit;

   return $this->select($sql);
  }
}
?>