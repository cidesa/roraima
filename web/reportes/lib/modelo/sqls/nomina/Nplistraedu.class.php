<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nplistraedu extends BaseClases {

  public function sqlp($ced1,$ced2,$codn1,$codn2,$codp1,$codp2)
    {
	    $sql= "select
			a.cedemp,a.nomemp,
			b.desniv,c.codprofes,
			c.nomtit,c.descur,
			c.instit,c.durcur,
			c.anocul
			from
			nphojint a,npnivedu b , npinfcur c
			where
			a.codnivedu=b.codniv and
			a.codemp=c.codemp and
			cast(a.CODEMP as int )>='".$ced1."' and
			cast(a.CODEMP as int )<='".$ced2."' and
			a.codnivedu>='".$codn1."' and
			a.codnivedu<='".$codn2."' and
			c.codprofes>='".$codp1."' and
			c.codprofes<='".$codp2."'
			Order by cast(a.CODEMP as int )";
      //  print '<pre>'; print $sql;exit;
	      return $this->select($sql);

    }


}
?>