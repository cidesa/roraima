<?php

require_once("../../lib/modelo/baseClases.class.php");

class Nprpresemp extends baseClases
{

 function sqlp($codempdes,$codemphas)
  {
			$sql="	select a.codtippre,b.destippre,to_char(a.fechispre,'dd/mm/yyyy') as fechispre,
					a.deshispre,a.codemp,c.nomemp,a.monpre,a.saldo from nphispre a, nptippre b,
					nphojint c where a.codtippre=b.codtippre and a.codemp=c.codemp and a.codemp>='".$codempdes."'
					and a.codemp<='".$codemphas."' order by a.codemp,a.codtippre,a.fechispre";

					//H::printR($sql);exit;

	return $this->select($sql);
  }

   function sqldet($codtippre,$codemp)
  {
			$sql="	Select Distinct(A.CodEmp) as codemp,to_char(a.fecini,'dd/mm/yyyy') as fecini,B.NomEmp as nomemp,sum(A.Monto) as monto,sum(A.Cantidad) as cuota,
					Sum(A.Acumulado) as acumulado, a.id as id From NPAsiConEmp A,NpHojInt B,npasicaremp c,nptippre d
					where a.codcar=c.codcar and a.codemp=c.codemp and A.CodEmp=B.CodEmp
					and A.CodCon=d.codcon and d.codtippre='".$codtippre."' and a.codemp='".$codemp."'
					and B.StaEmp = 'A' and c.status='V' Group by a.id,a.Codemp,B.NomEmp,a.fecini Order By A.CodEmp";

					//H::printR($sql);exit;

	return $this->select($sql);
  }


}
?>