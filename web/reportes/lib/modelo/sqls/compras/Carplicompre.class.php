<?php

require_once("../../lib/modelo/baseClases.class.php");

class Carplicompre extends baseClases
{
function SQLp($reqmin,$rifpro)
  {
        $sql="SELECT
        		 B.CANREQ as canreq, C.UNIMED as unimed, C.DESART as desart,
					       A.REQART as reqart, to_char(A.FECREQ,'dd/mm/yyyy') as fecreq,
					       D.codpro as codpro, D.nompro as nompro, D.rifpro as rifpro,
					       D.dirpro as dirpro, D.telpro as telpro,  a.obsreq,D.faxpro as faxpro
					FROM
					      CASOLART A, CAARTSOL B, CAREGART C, caprovee D
					WHERE
					      A.REQART=B.REQART AND B.CODART=C.CODART AND  (A.REQART) =trim('".$reqmin."')
					     AND  D.rifpro=trim('".$rifpro."')
					 ";

//print '<pre>';print $sql; exit();

   return $this->select($sql);
  }
}
?>
