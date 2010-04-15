<?php

require_once("../../lib/modelo/baseClases.class.php");

class Carcatart extends baseClases
{


function SQLp($art1,$art2,$comodin)
  {
    $sql="SELECT a.codart, trim(a.desart), trim(a.codpar), a.ramart, b.nomram, a.tipo, substr(a.codartsnc,1,2) as codfam, substr(a.codartsnc,4,2) as codgru
      FROM CAREGART A, caramart B
      WHERE
        a.ramart=b.ramart AND
        (A.CODART) >= trim('".$art1."') AND
        (A.CODART) <= trim('".$art2."') AND
        a.codart like '%".$comodin."%'
      GROUP BY a.codart, a.desart, a.codpar, a.ramart, b.nomram, a.tipo, substr(a.codartsnc,1,2), substr(a.codartsnc,4,2)
      order by a.codart";

//print $sql; exit();

   return $this->select($sql);
  }
}
?>