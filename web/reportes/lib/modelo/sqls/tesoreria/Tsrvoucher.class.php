<?php

require_once("../../lib/modelo/baseClases.class.php");
require_once("../../lib/general/funciones.php");

class Tsrvoucher extends baseClases
{

 function sqlp($numchedes,$numchehas)
  {
	$sql="select distinct (a.numche) as numche,a.fecemi,rtrim(c.nomben) as nomben,a.numcue,a.monche,
		to_char(a.fecemi,'dd') as dia,
		to_char(a.fecemi,'mm') as mes,
		to_char(a.fecemi,'yyyy') as ano,
		formatonum(a.monche) as monchestr,
		c.cedrif,b.nomcue,d.deslib as descon,d.numcom, b.desenl
		--,e.numord,e.desord, e. monret
		from tsdefban b, opbenefi c, tsmovlib d,tscheemi a
		--left join opordpag e on rtrim(a.numche)=rtrim(e.numche)
		where
		rtrim(a.numche)=rtrim('".$numchedes."') and
		--rtrim(a.numche)<=rtrim('".$numchehas."') and
		(a.numcue)=(b.numcue) and
		(a.numche)=(d.reflib) and
		(a.numcue)=(d.numcue) and
		(a.cedrif)=(c.cedrif)
		order by a.numche";
//echo '<pre>'; print_r($sql);exit;

   	return $this->select($sql);
  }




function sqlpx($numchedes,$numchehas)
  {
	$sql="select a.numord,c.deslib, b.numche
		from opordche a, tscheemi b, tsmovlib c
		where
		rtrim(a.numche)=('".$numchedes."') and
	--	rtrim(a.numche)<=('".$numchehas."') and
		rtrim(a.numche)=rtrim(b.numche) and
		(b.numche)=(c.reflib)
		order by a.numord";
//print $sql;

   	return $this->select($sql);
  }




function sqlp2($numchedes,$numchehas)
  {
	$sql="select a.numche as numche,d.numcom,
		f.desasi,f.monasi,f.debcre, f.codcta
		from contabc1 f, tsmovlib d, tscheemi a
		where
		rtrim(a.numche)=('".$numchedes."') and
	--	rtrim(a.numche)<=('".$numchehas."') and
		rtrim(a.numche)=rtrim(f.numcom) and
		rtrim(a.numche)=rtrim(d.reflib) and
		(a.numcue)=(d.numcue)
		order by a.numche";
//print $sql;

   	return $this->select($sql);
  }

  function sqlpz($numchedes,$numchehas)
  {
  	$sql="select z.numche, z.numord,coalesce(z.numcom,' ') as numcom,z.desord,coalesce(substr(w.codpre,7),' ') as codpre,coalesce(nombrepresup(w.codpre),coalesce(tiporetencion(numord)),z.desord) as nompre, coalesce(monimp,monpag) as montopag from
(
select a.numche,b.numcue,a.monpag,b.refpag,a.numord,c.numcom,c.desord from opordche a,tsmovlib b,opordpag c where a.numche=b.reflib
and a.codcta=b.numcue and a.numord=c.numord and a.numche=('".$numchedes."')
) Z left outer join cpimppag w on (z.refpag=w.refpag and z.numord=w.refere)
where z.numche=('".$numchedes."') order by codpre desc,numord";

//print '<pre>'; print $sql;

   	return $this->select($sql);
  }




}
?>
