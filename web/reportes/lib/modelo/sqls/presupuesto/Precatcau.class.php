<?php
require_once("../../lib/modelo/baseClases.class.php");
class Precatcau extends baseClases
{
function sqlp($tipcau1,$tipcau2)
  {
  	 $sql="SELECT tipcau as tipo,nomext as nombre,nomabr as abrev,
					(CASE WHEN refier='C' THEN 'Compromiso' WHEN refier='N' THEN 'No Refiere' WHEN refier='P' THEN 'Precompromiso' ELSE ' ' END) as refier,
				    (CASE WHEN afeprc='S' THEN 'Suma' WHEN afeprc='R' THEN 'Resta' WHEN afeprc='N' THEN 'No Afecta' ELSE '' END) as afeprc,
					(CASE WHEN afecom='S' THEN 'Suma' WHEN afecom='R' THEN 'Resta' WHEN afecom='N' THEN 'No Afecta' ELSE '' END) as afecom,
					(CASE WHEN afecau='S' THEN 'Suma' WHEN afecau='R' THEN 'Resta' WHEN afecau='N' THEN 'No Afecta' ELSE '' END) as afecau,
			        (CASE WHEN afedis='S' THEN 'Suma' WHEN afedis='R' THEN 'Resta' WHEN afedis='N' THEN 'No Afecta' ELSE '' END) as afedis
					FROM CPDOCCAU
					WHERE ( tipcau >='".$tipcau1."' AND tipcau <='".$tipcau2."' )
					ORDER BY tipcau";
   return $this->select($sql);
  }
}
?>