<?php
require_once("../../lib/modelo/baseClases.class.php");
class Precatpag extends baseClases
{
function sqlp($tippag1,$tippag2)
  {
  	 $sql="SELECT tippag as tipo,nomext as nombre,nomabr as abrev,
					(CASE WHEN refier='A' THEN 'Si' WHEN refier='N' THEN 'No' ELSE ' ' END) as refier,
				    (CASE WHEN afeprc='S' THEN 'Suma' WHEN afeprc='N' THEN 'No Afecta' ELSE '' END) as afeprc,
					(CASE WHEN afecom='S' THEN 'Suma' WHEN afecom='R' THEN 'Resta' WHEN afecom='N' THEN 'No Afecta' ELSE '' END) as afecom,
					(CASE WHEN afecau='S' THEN 'Suma' WHEN afecau='R' THEN 'Resta' WHEN afecau='N' THEN 'No Afecta' ELSE '' END) as afecau,
					(CASE WHEN afepag='S' THEN 'Suma' WHEN afepag='R' THEN 'Resta' WHEN afepag='N' THEN 'No Afecta' ELSE '' END) as afepag,
			        (CASE WHEN afedis='S' THEN 'Suma' WHEN afedis='R' THEN 'Resta' WHEN afedis='N' THEN 'No Afecta' ELSE '' END) as afedis
					FROM CPDOCPAG
					WHERE ( tippag >='".$tippag1."' AND tippag <='".$tippag2."' )
					ORDER BY tippag";
   return $this->select($sql);
  }
}
?>