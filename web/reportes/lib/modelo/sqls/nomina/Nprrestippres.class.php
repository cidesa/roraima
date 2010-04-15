<?php

require_once("../../lib/modelo/baseClases.class.php");

class Nprrestippres extends baseClases
{

 function sqlp($codtipdes,$codtiphas)
  {
			$sql="  select distinct a.codtippre,a.destippre from nptippre a,npasiconemp b
					where a.codcon=b.codcon and  a.codtippre>='".$codtipdes."' and a.codtippre<='".$codtiphas."'";

					//H::printR($sql);exit;

	return $this->select($sql);
  }

   function sqldet($codtippre)
  {
			$sql="	Select Distinct(A.CodEmp) as codemp,to_char(a.fecini,'dd/mm/yyyy') as fecini,B.NomEmp as nomemp,sum(A.Monto) as monto,sum(A.Cantidad) as cuota,
					Sum(A.Acumulado) as acumulado, a.id as id From NPAsiConEmp A,NpHojInt B,npasicaremp c,nptippre d
					where a.codcar=c.codcar and a.codemp=c.codemp and A.CodEmp=B.CodEmp
					and A.CodCon=d.codcon and d.codtippre='".$codtippre."'
					and B.StaEmp = 'A' and c.status='V' Group by a.id,a.Codemp,B.NomEmp,a.fecini Order By A.CodEmp";

					//H::printR($sql);exit;

	return $this->select($sql);
  }



  function sqlmonto($codemp,$codtippre){

  	//$sql="select codemp,monpre,saldo,to_char(fechispre,'dd/mm/yyyy') as fechispre from nphispre where codemp='11943020' order by fechispre asc";

	$sql="select to_char(a.fechispre,'dd/mm/yyyy') as fechispre,a.saldo as saldo,a.monpre as cuota from nphispre a where a.codemp='".$codemp."' and a.codtippre='".$codtippre."' order by a.fechispre";
	//H::printR($sql);
  	return $this->select($sql);

  }

  function sqlsaldo($codemp,$codtippre){

  	//$sql="select monpre,saldo from nphispre where codemp='".$codemp."' order by fechispre ASC";
	$sql="select to_char(a.fechispre,'dd/mm/yyyy') as fechispre,a.saldo
	from nphispre a where a.codemp='".$codemp."' and a.codtippre='".$codtippre."' order by a.fechispre asc";

  	return $this->select($sql);


  }


}
?>