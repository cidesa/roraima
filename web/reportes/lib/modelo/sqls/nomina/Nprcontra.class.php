<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprcontra extends BaseClases {

    function sqlp($codemp) {

    	$sql="select upper(a.nomemp) as nomemp,
    	--case when length((a.cedemp))='8' then (substr(a.cedemp,1,2)||'.'||substr(a.cedemp,3,3)||'.'||substr(a.cedemp,6,3))
    	--when length((a.cedemp))='8' then (substr(a.cedemp,1,1)||'.'||substr(a.cedemp,2,3)||'.'||substr(a.cedemp,5,3))
    	--else (substr(a.cedemp,1,3)||'.'||substr(a.cedemp,4,3)) end as cedemp,
    	a.cedemp,
    	a.nacemp,
    	to_char(a.fecing,'dd/mm/yyyy') as fecing,
		c.nomcar, d.desniv, c.suecar
		from nphojint a, npasicaremp b, npcargos c, npestorg d
		where a.codemp like '".($codemp)."%' and
		a.codemp=b.codemp and
		b.codcar=c.codcar and
		(a.codniv)=(d.codniv) ";

    	return $this->select($sql);
    }

    function sqlempresa(){
    	$sql="select * from empresa";

    	return $this->select($sql);
    }
    function sqlnumeros($pos,$num){
    	$sql="SELECT
			(select NOMNUM from numeros where pos=$pos and num=$num) AS NUMEROS;";

		return $this->select($sql);
    }

}
?>