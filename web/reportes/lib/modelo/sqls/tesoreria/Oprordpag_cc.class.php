<?php
require_once("../../lib/modelo/baseClases.class.php");
require_once("../../lib/general/funciones.php");

class Oprordpag_cc extends baseClases
{

 function sqlp($numorddes,$numordhas,$bendes,$benhas,$fechades,$fechahas)
  {
	$sql="select
						numord as numord,
						count(numord) as cont,
						cedrif,
						nomben,
						desord, 
						fecemi as fecemi,
						monord,
						monret,
						mondes,
						coduni,
						numche,
						(case when status='I' then 'pagadas'
						  when status='N' then 'pendiente por pagar'
						  when status='A' then 'anuladas'
						  when status='E' then 'causadas'
						  when status='M' then 'en direc. de administracion'
						  when status='D' then 'en servicios financieros' end) as status
					from
						opordpag
					where
						trim(numord)>= trim('".$numorddes."') and
						trim(numord) <= trim('".$numordhas."') and
						trim(cedrif) >= trim('".$bendes."') and
						trim(cedrif) <= trim('".$benhas."') and
						fecemi >= to_date('".$fechades."','dd/mm/yyyy') and
						fecemi <= to_date('".$fechahas."','dd/mm/yyyy') 
						group by numord,cedrif, nomben, desord, fecemi, monord, monret, mondes,
							 coduni, numche, status
						order by numord";
/*echo '<pre>';
print_r($sql);exit;*/

   	return $this->select($sql);
  }

  function empresa()
      {
	$sql = "select nomemp, diremp, tlfemp from empresa where codemp = '001'";
	return $this->select($sql);
      }
}
?>
