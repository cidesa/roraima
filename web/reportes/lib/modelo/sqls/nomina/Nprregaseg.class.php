<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprregaseg extends BaseClases {

    function sqlp($codemp) {

    	$sql="select a.nomemp,a.cedemp,a.nacemp,a.fecnac,to_char(a.fecing,'dd/mm/yyyy') as fecing,to_char(a.fecnac,'dd') as dia,to_char(a.fecnac,'mm') as mes,to_char(a.fecnac,'yyyy') as ano,
		to_char(a.fecret,'dd/mm/yyyy') as fecret, b.codnom, c.codcar,c.nomcar,formatonum(c.suecar/4) as suecar,a.derzur,
		to_char(a.fecing,'dd') as dian,to_char(a.fecing,'mm') as mesn,to_char(a.fecing,'yyyy') as anon, a.sexemp, a.dirhab,a.codemp
		from nphojint a, npasicaremp b, npcargos c
		where a.codemp like '".($codemp)."%' and a.codemp=b.codemp and b.codcar=c.codcar";
 // print '<pre>'; print $sql;

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
				order by to_char(fecnom,'mm')";

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
				order by to_char(fecnom,'mm')";

    	return $this->select($sql);
    }

    function sqlanos($codemp,$codnom,$fecing){

    	$sql="select distinct to_char(a.fecnom,'yyyy') as ano from nphiscon a
		where a.codemp like '".($codemp)."%' and a.codnom='$codnom' and
		a.fecnom>=to_date('$fecing','dd/mm/yyyy')
		order by to_char(a.fecnom,'yyyy')";

    	return $this->select($sql);
    }

    function sueldomanual($codemp,$codnom){

	    	$sql="select formatonum(sum(b.monto)/4) as monto from npasiconemp b ,npconsueldo c
	              where b.codcon=c.codcon and b.codemp='".($codemp)."' and c.codnom='".($codnom)."'";

	           //  print '<pre>'; print $sql;

	return $this->select($sql);
    }

 function familiar($codemp,$codnom){


    		$sql="select DISTINCT b.codemp,a.cedfam,a.nomfam,
			B.CEDEMP as cedemp,
			B.NOMEMP as nomemp,to_char(B.FECNAC,'dd/mm/yyyy') as fecnac1,  B.EDAEMP as edademp,
			(CASE WHEN B.SEXEMP ='F' THEN 'F' ELSE 'M' END)  as sexemp,
			A.CEDFAM as cedfam,
			A.NOMFAM as nomfam,
		    A.SEXFAM as sexfam,
			to_char(A.FECNAC,'dd/mm/yyyy') as fecnac,to_char(A.FECNAC,'dd') as dia,to_char(A.FECNAC,'mm') as mes,to_char(A.FECNAC,'yyyy') as ano,
			A.EDAFAM as edafam,
			A.PARFAM as parfam,
			(CASE WHEN A.SEGHCM ='S' THEN 'SI' WHEN A.SEGHCM ='N' THEN 'NO' END) as seghcm,
			(select C.DESPAR from NPTIPPAR C where A.PARFAM = C.TIPPAR) as despar
			from NPASICAREMP C, nphojint b left outer join npinffam a on (a.codemp=b.codemp)
			WHERE C.CODEMP=B.CODEMP AND C.CODNOM='$codnom'  AND
			trim(B.CODEMP) = trim('".($codemp)."') and b.staemp='A'
			ORDER BY to_char(A.FECNAC,'dd/mm/yyyy') desc,B.CODEMP

							 ";
				//		  print '<pre>'; print $sql;

							 return $this->select($sql);
    }
}
?>