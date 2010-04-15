<?php
require_once("../../lib/modelo/baseClases.class.php");
class Precatcom extends baseClases
{
function sqlp($tipcom1,$tipcom2)
  {
  	 $sql="SELECT tipcom as tipo,nomext as nombre,nomabr as abrev,
					(CASE WHEN refprc='S' THEN 'Si' WHEN refprc='N' THEN 'No' ELSE ' ' END) as refier,
				    (CASE WHEN afeprc='S' THEN 'Suma' WHEN afeprc='N' THEN 'No Afecta' ELSE '' END) as afeprc,
					(CASE WHEN afecom='S' THEN 'Suma' WHEN afecom='R' THEN 'Resta' WHEN afecom='N' THEN 'No Afecta' ELSE '' END) as afecom,
			        (CASE WHEN afedis='S' THEN 'Suma' WHEN afedis='R' THEN 'Resta' WHEN afedis='N' THEN 'No Afecta' ELSE '' END) as afedis
					FROM CPDOCCOM
					WHERE ( tipcom >='".$tipcom1."' AND tipcom <='".$tipcom2."' )
					ORDER BY tipcom";
   return $this->select($sql);
  }
}
?>