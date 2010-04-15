<?php
require_once("../../lib/modelo/baseClases.class.php");
require_once("../../lib/general/funciones.php");

class Tsrmovimiento_cc extends baseClases
{

 function sqlp($numchedes,$numchehas,$bendes,$benhas,$fechades,$fechahas,$numcuedes,$numcuehas)
  {
	$sql="select
				a.reflib, a.feclib as feclib,a.tipmov,
				b.numche,b.cedrif,c.nomben, d.codtip,
				d.debcre, e.codpre, e.monimp,substr(e.codpre,10,12) as partida,
				(CASE WHEN d.debcre='C' THEN a.monmov ELSE 0 END) as haber,
				(CASE WHEN d.debcre='D' THEN a.monmov ELSE 0 END) as deber,
				b.numcue, f.nomcue
				from
				tsmovlib a, tscheemi b left outer join tsdefban f on f.numcue=b.numcue , opbenefi c, tstipmov d, cpimppag e
				where
				trim(b.numche)>= trim('".$numchedes."') and
				trim(b.numche) <= trim('".$numchehas."') and
				trim(b.numcue)>= trim('".$numcuedes."') and
				trim(b.numcue) <= trim('".$numcuehas."') and
				trim(c.cedrif) >= trim('".$bendes."') and
				trim(c.cedrif) <= trim('".$benhas."') and
				fecemi >= to_date('".$fechades."','dd/mm/yyyy') and
				fecemi <= to_date('".$fechahas."','dd/mm/yyyy') and
				a.reflib=b.numche and
				b.cedrif=c.cedrif and
				a.tipmov=d.codtip and
				trim(a.refpag)=e.refpag
		 order by a.feclib,a.reflib";

//echo '<pre>';print_r($sql);exit;

   	return $this->select($sql);
  }

  function empresa()
      {
	$sql = "select nomemp, diremp, tlfemp from empresa where codemp = '001'";
	return $this->select($sql);
      }
}
?>
