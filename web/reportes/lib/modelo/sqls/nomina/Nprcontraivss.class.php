<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprcontraivss extends BaseClases {

    function sqlp($codemp) {

    	$sql="select a.nomemp,a.cedemp,a.nacemp,to_char(a.fecing,'dd/mm/yyyy') as fecing,
		to_char(a.fecret,'dd/mm/yyyy') as fecret, b.codnom
		from nphojint a, npasicaremp b
		where a.codemp like '".($codemp)."%' and a.codemp=b.codemp";//H::PrintR($sql);exit;

    	return $this->select($sql);
    }

    function sqlempresa(){
    	$sql="select * from empresa";

    	return $this->select($sql);
    }

    function sqlsalario($codemp,$ano){
    	$sql="select
				case when to_char(fecnom,'mm')='01' then 'ENERO'
				when to_char(fecnom,'mm')='02' then 'FEBRERO'
				when to_char(fecnom,'mm')='03' then 'MARZO'
				when to_char(fecnom,'mm')='04' then 'ABRIL'
				when to_char(fecnom,'mm')='05' then 'MAYO'
				when to_char(fecnom,'mm')='06' then 'JUNIO'
				when to_char(fecnom,'mm')='07' then 'JULIO'
				when to_char(fecnom,'mm')='08' then 'AGOSTO'
				when to_char(fecnom,'mm')='09' then 'SEPTIEMBRE'
				when to_char(fecnom,'mm')='10' then 'OCTUBRE'
				when to_char(fecnom,'mm')='11' then 'NOVIEMBRE'
				else 'DICIEMBRE' end as mes,sum(a.monto) as monto
				from nphiscon a, npconsueldo b
				where a.codnom=b.codnom and a.codcon=b.codcon and a.codemp like '".($codemp)."%' and
				to_char(fecnom,'yyyy')='$ano'
				group by to_char(fecnom,'mm')
				order by to_char(fecnom,'mm')";//H::PrintR($sql);exit;

    	return $this->select($sql);
    }
    function sqlmes($codemp){
    	$sql="select
				case when to_char(fecnom,'mm')='01' then 'ENERO'
				when to_char(fecnom,'mm')='02' then 'FEBRERO'
				when to_char(fecnom,'mm')='03' then 'MARZO'
				when to_char(fecnom,'mm')='04' then 'ABRIL'
				when to_char(fecnom,'mm')='05' then 'MAYO'
				when to_char(fecnom,'mm')='06' then 'JUNIO'
				when to_char(fecnom,'mm')='07' then 'JULIO'
				when to_char(fecnom,'mm')='08' then 'AGOSTO'
				when to_char(fecnom,'mm')='09' then 'SEPTIEMBRE'
				when to_char(fecnom,'mm')='10' then 'OCTUBRE'
				when to_char(fecnom,'mm')='11' then 'NOVIEMBRE'
				else 'DICIEMBRE' end as mes
				from nphiscon a, npconsueldo b
				where a.codnom=b.codnom and a.codcon=b.codcon and a.codemp like '".($codemp)."%'
				group by to_char(fecnom,'mm')
				order by to_char(fecnom,'mm')";//H::PrintR($sql);exit;

    	return $this->select($sql);
    }

    function sqlanos($codemp,$codnom,$fecing){

    	$sql="select * from (
		select distinct to_char(a.fecnom,'yyyy') as ano from nphiscon a
		where a.codemp like '".($codemp)."%' and a.codnom='$codnom' and
		a.fecnom>=to_date('$fecing','dd/mm/yyyy')
		order by to_char(a.fecnom,'yyyy')
		limit 8)a order by ano
		";

    	return $this->select($sql);
    }
}
?>