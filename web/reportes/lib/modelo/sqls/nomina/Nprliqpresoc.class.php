<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprliqpresoc extends baseClases {

  function sqlp($empdes,$emphas)
  {
	/*$sql="SELECT DISTINCT
			A.CODEMP as codemp,A.CEDEMP as cedemp,A.NOMEMP as nombre,
			to_char(A.FECING,'dd/mm/yyyy') as fecing,to_char(A.FEcret,'dd/mm/yyyy') as fecret,B.NOMCAR as nomcar,
			C.DESNIV as desniv,B.SUELDO as sueldo,B.SUELDO/30 AS DIARIO,
			D.NOMEMP as empresa
			FROM
			NPHOJINT A,NPASICAREMP B,NPESTORG C,EMPRESA D
			WHERE
			A.CODEMP=B.CODEMP AND A.CODNIV=C.CODNIV AND
			D.CODEMP='001' AND A.STAEMP='E' AND
			A.CODEMP>='".$empdes."' AND
			A.CODEMP<='$emphas.'";*/

		$sql="	select distinct a.codemp,b.nomemp as nombre,b.cedemp,to_char(g.fechaingreso,'dd/mm/yyyy') as fecing,
				to_char(b.fecret,'dd/mm/yyyy') as fecret,d.nomcar,e.desniv as ubicacion,f.nomemp as empresa,
				g.anoefectivo as ano,g.mesefectivo as mes,g.diasefectivo as dia,g.anticipos,h.suecar,d.codnom,d.codcar from npliquidacion_det a,nphojint b,
				npasicaremp d,npestorg e,empresa f,npliquidacion g,npcargos h
				where a.codemp=b.codemp and a.codemp=d.codemp and e.codniv=b.codniv and d.codcar=h.codcar and f.codemp='001' and a.codemp=g.cedula
				and a.codemp>='".$empdes."' and a.codemp<='".$emphas."'";
			//H::printR($sql);exit;

   return $this->select($sql);
  }

   function asigna ($codemp,$i)
   {
   	  if ($i=="1")
   	  {
   	  	$sql = "SELECT sum(diaart108) as dias,sum(valart108) as monto FROM NPIMPPRESOC WHERE CODEMP = '".$codemp."' ";
   	  }
   	  else
   	  {
   	  	$sql = "SELECT concepto,dias,monto FROM NPLIQUIDACION_DET WHERE CODEMP = '".$codemp."' AND
				ASIDED = 'A'";
   	  }
   	  //H::PrintR($sql);exit;
   	  return $this->select($sql);
   }

   function deduc($codemp,$i)
   {
   	   if ($i ==1)
   	   {
   	   	  $sql="SELECT sum(monto) as monto FROM NPLIQUIDACION_DET WHERE CODEMP = '".$codemp."' AND
                ASIDED = 'D' AND CONCEPTO LIKE 'ANTICIPO%' ";
   	   }
   	   elseif ($i ==2)
   	   {
   	   	  $sql="SELECT sum(monto) as monto  FROM NPLIQUIDACION_DET WHERE CODEMP = '".$codemp."' AND
               ASIDED = 'D' AND CONCEPTO LIKE 'APORTES%' ";
   	   }
	   else
	   {
	   	  $sql="SELECT sum(monto) as monto  FROM NPLIQUIDACION_DET WHERE CODEMP = '".$codemp."' AND
               ASIDED = 'D'  ";
	   }
   	   return $this->select($sql);
   }

  function sqlm($codemp){

  	$sql="		select sum(a.diaart108) as diaart,b.monto108 as monto108,b.int108 as int108 from npimppresoc a,npliquidacion b where a.codemp='".$codemp."' and b.cedula='".$codemp."'
				group by b.monto108,b.int108";

  	return $this->select($sql);


  }

  function sqlvac($codemp){

  	//$sql="select desde,hasta,corresponde,disfrutados,fracciondia,fraccionbono from npliqvacacion where codemp='".$codemp."'";

  	//VACACIONES NO DISFRUTADAS
  	$sql="SELECT
							CODEMP as CODEMPVAC,
							PERINI,
							PERFIN,
							DIADIS + DIASBONO as DIASCANCELAR,
							MONTO
							FROM NPVACLIQUIDACION
							where codemp= '".$codemp."'";

  	return $this->select($sql);

  }
  function sqlsalint($codemp,$codcar,$codnom)
  {
  	$sql="Select coalesce(SUM(a.monto),0) as campo from nphiscon A,
		NPCONSALINT B where A.CODCON=B.CODCON AND a.CODNOM=B.CODNOM AND 
		a.codnom='$codnom' and a.codemp='$codemp' and 
		a.codcar='$codcar'and 
		to_char(fecnom,'mm/yyyy')=to_char((select max(fecnom) from nphiscon where codnom=a.codnom and codemp=a.codemp and codcar=a.codcar),'mm/yyyy')";
	
	return $this->select($sql);
  }
}
?>