<?php
class CalculoNomina
{

public static function CalPorEmpleado($objemp,$codnom,$desde,$hasta,$opsi,$msem,&$cont)
{
	///$ssql = "Select * from npdefgen Where CodEmp='001'";
	if (Herramientas::BuscarDatos("Select * from npdefgen Where CodEmp='001'",&$resuladi))
	 	$redondeo = $resuladi[0]["redmon"];
	 else
		$redondeo = '';

	// NPNOMINA
	$sql="select codnom, nomnom, numsem, ultfec, profec, frecal,
		 to_char(profec,'dd/mm/yyyy') as profec2, to_char(ultfec,'dd/mm/yyyy') as ultfec2
		 from npnomina where codnom='".$codnom."' ";
	if (Herramientas::BuscarDatos($sql,&$npnomina))
	{
		$nomnom=$npnomina[0]["nomnom"];
		//$numsem=$npnomina[0]["numsem"];
		$ultfec=$npnomina[0]["ultfec"];
		$profec=$npnomina[0]["profec"];
		$frecal=$npnomina[0]["frecal"];
	}
	///////////////

	/*$sql="Select distinct a.codemp,b.nomemp,a.codcar,b.staemp,b.fecnac,b.fecing,b.sexemp
			from npasicaremp a,nphojint b, npsitemp c
			where a.codnom='".$codnom."' and a.status='V'
	  		and to_date(to_char(b.fecing,'dd/mm/yyyy'),'dd/mm/yyyy') < to_date('".$hasta."','dd/mm/yyyy')
			and a.codemp=b.codemp --and a.codemp='07415254'
			and b.staemp = c.codsitemp
			and c.calnom = 'S'
			order by a.codemp,a.codcar";*/
	//print $sql;exit;
	//if (Herramientas::BuscarDatos($sql,&$ttemporal)) //if I>0
	//{
		//////////////////////////////////////////////////////

		//$i=count($o);
		//$j=0;

		// calculamos los conceptos para cada empleado
		$t = count($objemp);
		$limit_mem='128M';
		if ($t>100 && $t<450)
		  $limit_mem='512M';
		else if ($t>=450 && $t<900)
		  $limit_mem='1024M';
		else if ($t>=900)
		   $limit_mem=-1;

	    ini_set("memory_limit",$limit_mem);

		foreach ($objemp as $temporal)
		{
			$codemp=$temporal->getCodemp();
			$cargo=$temporal->getCodcar();
			//$cargo=$temporal["codcar"];
			if ($temporal->getFecnac()=='')
			  $fechanac='1969-01-01';
			else
			  $fechanac=$temporal->getFecnac();

			if ($temporal->getFecing()=='')
			  $fechaing='2002-01-01';
			else
			  $fechaing=$temporal->getFecing();

			if ($temporal->getSexemp()=='')
			  $sexo='M';
			else
			  $sexo=$temporal->getSexemp();

			// Borramos los registros existentes para esta formula

		    $c = new Criteria();
		    $c->add(NpnomcalPeer::CODNOM,$codnom);
		    $c->add(NpnomcalPeer::ESPECIAL,"(npnomcal.ESPECIAL<>'S' or npnomcal.ESPECIAL is null  )",Criteria::CUSTOM);
		    $c->add(NpnomcalPeer::CODEMP,$codemp);
		    $o = NpnomcalPeer::doDelete($c);

		  self::CalculoPorEmpleado($codemp,$cargo,$codnom,$nomnom,$profec,$frecal,$opsi,$msem,$desde,$hasta,$redondeo,$ultfec,$fechanac,$fechaing,$sexo,&$cont);

		}// fin calculamos los conceptos para cada empleado
	//} // if buscardatos ttemporal
}

public static function ValidicionPorEmpleado($codnom,$desde,$hasta,$opsi,$msem,&$cont)
{
	//$ssql = "Select * from npdefgen Where CodEmp='001'";
	if (Herramientas::BuscarDatos("Select * from npdefgen Where CodEmp='001'",&$resuladi))
	 	$redondeo = $resuladi[0]["redmon"];
	 else
		$redondeo = '';

	// NPNOMINA
	$sql="select codnom, nomnom, numsem, ultfec, profec, frecal,
		 to_char(profec,'dd/mm/yyyy') as profec2, to_char(ultfec,'dd/mm/yyyy') as ultfec2
		 from npnomina where codnom='".$codnom."' ";
	if (Herramientas::BuscarDatos($sql,&$npnomina))
	{
		$nomnom=$npnomina[0]["nomnom"];
		//$numsem=$npnomina[0]["numsem"];
		$ultfec=$npnomina[0]["ultfec"];
		$profec=$npnomina[0]["profec"];
		$frecal=$npnomina[0]["frecal"];
	}
	///////////////

	$sql="Select distinct a.codemp,b.nomemp,a.codcar,b.staemp,b.fecnac,b.fecing,b.sexemp
			from npasicaremp a,nphojint b, npsitemp c
			where a.codnom='".$codnom."' and a.status='V'
	  		and to_date(to_char(b.fecing,'dd/mm/yyyy'),'dd/mm/yyyy') <= to_date('".$hasta."','dd/mm/yyyy')
			and a.codemp=b.codemp --and a.codemp='04476692'
			and b.staemp = c.codsitemp
			and c.calnom = 'S' and a.status='V'
			order by a.codemp,a.codcar";
	//print $sql;exit;
	if (Herramientas::BuscarDatos($sql,&$ttemporal)) //if I>0
	{
		// Borramos los registros existentes para esta formula

		$c = new Criteria();
		$c->add(NpnomcalPeer::CODNOM,$codnom);
		$c->add(NpnomcalPeer::ESPECIAL,"(npnomcal.ESPECIAL<>'S' or npnomcal.ESPECIAL is null  )",Criteria::CUSTOM);
		$o = NpnomcalPeer::doDelete($c);
		//////////////////////////////////////////////////////

		//$i=count($o);
		//$j=0;

		// calculamos los conceptos para cada empleado
		$t = count($ttemporal);
		$limit_mem='128M';
		if ($t>100 && $t<450)
		  $limit_mem='512M';
		else if ($t>=450 && $t<900)
		  $limit_mem='1024M';
		else if ($t>=900)
		   $limit_mem=-1;

	    ini_set("memory_limit",$limit_mem);

		foreach ($ttemporal as $temporal)
		{
			$codemp=$temporal["codemp"];
			$cargo=$temporal["codcar"];
			//$cargo=$temporal["codcar"];
			if ($temporal["fecnac"]=='')
			  $fechanac='1969-01-01';
			else
			  $fechanac=$temporal["fecnac"];

			if ($temporal["fecing"]=='')
			  $fechaing='2002-01-01';
			else
			  $fechaing=$temporal["fecing"];

			if ($temporal["sexemp"]=='')
			  $sexo='M';
			else
			  $sexo=$temporal["sexemp"];

		  self::CalculoPorEmpleado($codemp,$cargo,$codnom,$nomnom,$profec,$frecal,$opsi,$msem,$desde,$hasta,$redondeo,$ultfec,$fechanac,$fechaing,$sexo,&$cont);

		}// fin calculamos los conceptos para cada empleado
	} // if buscardatos ttemporal
}


public static function CalculoPorEmpleado($codemp,$cargo,$codnom,$nomnom,$profec,$frecal,$opsi,$msem,$desde,$hasta,$redondeo,$ultfec,$fechanac,$fechaing,$sexo,&$cont)
{

		//$empleado=$temporal["nomemp"];


		$periodos = Nomina::buscar_Periodos($codnom,$codemp,$cargo,&$i_periodos_adicionales);
		if ($periodos!=0)
		{
			$sql2=" select distinct p.*, CASE WHEN q.codcon is null THEN 'N' else 'S' END as prestamo from (
					select distinct x.*, CASE WHEN Y.CODCONVAC IS NULL THEN 'N' ELSE 'S' END AS vacacion from (
					Select distinct a.codemp,a.codcar,a.codcon,a.nomcon,a.cantidad,a.monto,a.acumulado,a.frecon,a.asided,a.acucon
					from npdefcpt c, npasiconemp a left outer join npnomespconnomtip b
					 on (a.codcon = b.codcon and b.codnom = '".$codnom."' and b.especial='S')
					where a.activo='S'
				    and b.codcon is null
					and a.codcon=c.codcon and C.CONACT='S'
					and a.codemp='".$codemp."'
					and a.codcar='".$cargo."' and calcon='S' --and a.codcon='262'
					) X left outer join NPVACDEFGEN Y on x.codcon = y.codconvac and y.codnomvac = '".$codnom."')
					 p left outer join nptippre q  on (p.codcon = q.codcon ) oRDER bY asided,p.cODcON ";
					 //print $sql2;exit;
			if (Herramientas::BuscarDatos($sql2,&$tconceptos))
			{
				self::ValidacionPorConceptos($tconceptos,$codnom,$nomnom,$profec,$frecal,$periodos,$i_periodos_adicionales,$opsi,$msem,$codemp,$cargo,$desde,$hasta,$fechanac,$fechaing,$sexo,$nomnom,$redondeo,$ultfec,&$cont);
			}// if buscardatos tconceptos
		} // if periodos!=0
}


public static function ValidacionPorConceptos($tconceptos,$codnom,$nomnom,$profec,$frecal,$periodos,$i_periodos_adicionales,$opsi,$msem,$codemp,$cargo,$desde,$hasta,$fechanac,$fechaing,$sexo,$nomnom,$redondeo,$ultfec,&$cont)
{
	$acumuladeb=0;
	$acumulacre=0;
	foreach ($tconceptos as $conceptos)
	{
		self::CalculoPorConceptos($conceptos,$codnom,$profec,$frecal,$periodos,$i_periodos_adicionales,$opsi,$msem,$codemp,$cargo,$desde,$hasta,$fechanac,$fechaing,$sexo,$nomnom,$redondeo,$ultfec,$acumulacre,$acumuladeb,&$cont);
	}// foreach conceptos

	Nomina::calcularBanco($codemp,$cargo,$codnom);
	/*if ()
	{

	}*/

}

public static function CalculoPorConceptos($conceptos,$codnom,$profec,$frecal,$periodos,$i_periodos_adicionales,$opsi,$msem,$codemp,$cargo,$desde,$hasta,$fechanac,$fechaing,$sexo,$nomnom,$redondeo,$ultfec,$acumulacre,$acumuladeb,&$cont)
{
	//'VEMOS SI ES UN CONCEPTO DE CESTA TICKETS. ESTO LO UTILIZAREMOS MAS ADELANTE
		//$sql3="SELECT * FROM NPCESTATICKETS WHERE CODCON='".$conceptos["codcon"]."' AND CODNOM='".$codnom."'";
		if (Herramientas::BuscarDatos("SELECT * FROM NPCESTATICKETS WHERE CODCON='".$conceptos["codcon"]."' AND CODNOM='".$codnom."'",&$tcesta))
		   	$conceptotickets=true;
		else
			$conceptotickets=false;
		//////////////////////////////////////////////////////////////////////////////

		//'CALCULAR LA CANTIDAD DE PERIODOS EFECTIVOS POR CONCEPTOS SEGUN SU FRECUENCIA
		$periodosefectivos=Nomina::buscar_Periodos_Efectivos($profec,$frecal,$periodos,$conceptos["frecon"],$i_periodos_adicionales,$opsi,$msem);
		//////////////////////////////////////////////////////////////////////////////

		//'VERIFICAMOS SI EL CONCEPTO ESTA ACTIVO
		//$sql4="Select * from NPDEFCPT where CodCon='".$conceptos["codcon"]."' AND CONACT='S'";
		//if (Herramientas::BuscarDatos("Select * from NPDEFCPT where CodCon='".$conceptos["codcon"]."' AND CONACT='S'",&$tnpdefcpt))
		//{
			if ($conceptos["codcon"]!='')
			{
				//$sql5="Select CODConVAC FROM NPVACDEFGEN where CODConVAC='".$conceptos["codcon"]."' and codnomVAC='".$codnom."' order by codconVAC";
				//if (Herramientas::BuscarDatos("Select CODConVAC FROM NPVACDEFGEN where CODConVAC='".$conceptos["codcon"]."' and codnomVAC='".$codnom."' order by codconVAC",&$tnpdefcpt))
				if ($conceptos["vacacion"]=='S')
				{
					$periodosefectivos=1;
				}

				$cuotas="";

				//condicion o formula para cada concepto
				$nroope=0;
				//$sql6="Select campo,operador,valor,confor,tipcal from npcalcon where codcon='".$conceptos["codcon"]."' and codnom='".$codnom."' order by numcon,codcon";
				if (Herramientas::BuscarDatos("Select distinct(valor),campo,operador,confor,tipcal, TO_NUMBER(NUMCON,'999') from npcalcon where codcon='".$conceptos["codcon"]."' and codnom='".$codnom."' ORDER BY TO_NUMBER(NUMCON,'999')",&$tgrid)) // ES UNA FORMULA O CONDICION
				{
					self::ValidacionFormula($tgrid,$codemp,$cargo,$conceptos,$codnom,$desde,$hasta,$fechanac,$fechaing,$sexo,$nomnom,$conceptotickets,$periodosefectivos,$cuotas,$redondeo,$ultfec,$profec,$nroope,$acumulacre,$acumuladeb,&$cont);
				}
				else // no existe una formula asociada a este concepto
				{}
				////////////////////////////////////////

			} // fin ($conceptos["codcon"]!='')
		//} // fin el concepto esta activo
		/////////////////////////////////////////

}

public static function ValidacionFormula($tgrid,$codemp,$cargo,$conceptos,$codnom,$desde,$hasta,$fechanac,$fechaing,$sexo,
										$nomnom,$conceptotickets,$periodosefectivos,$cuotas,$redondeo,$ultfec,$profec,$nroope,$acumulacre,$acumuladeb,&$cont)
{
	if ($tgrid[0]["tipcal"]=='F') // EVALUAMOS UNA FORMULA
	{
		// EJECUTAR FORMULA
		$cadena=trim(strtoupper($tgrid[0]["confor"]));
		//$cadena='STAB01022006/2';
		$ecuacion=Nomina::posfix($cadena);
		Nomina::evalEcua(&$ecuacion,&$resecu,&$error,$codemp,$cargo,$conceptos["codcon"],$codnom,'btnCalcular','nrosem','datosins(2)','datosins(2)','datosins(2)','datosins(2)',$hasta,$fechanac,$fechaing,$sexo,&$vars,$especial='NO');
		self::ValidacionSalvar($vars,$error,$resecu,$codnom,$codemp,$cargo,$conceptos,$hasta,$desde,$nomnom,$conceptotickets,$periodosefectivos,$cuotas,$redondeo,$acumuladeb,$acumulacre,&$cont);
	}// fin formula
	else // evaluamos cada condicion
	{
		foreach ($tgrid as $grid)
		{
			self::CalculoPorFormula($grid,$codemp,$cargo,$conceptos,$codnom,$fechanac,$fechaing,$sexo,$desde,$hasta,$ultfec,$profec,&$booleanos,&$opelog,&$nroope,$nomnom,$conceptotickets,$periodosefectivos,$cuotas,$redondeo,$acumuladeb,$acumulacre,&$cont);
		} // fin foreach
     } //fin tipo calculo formula "F"


}


public static function CalculoPorFormula($grid,$codemp,$cargo,$conceptos,$codnom,$fechanac,$fechaing,$sexo,$desde,$hasta,$ultfec,$profec,&$booleanos,&$opelog,&$nroope,$nomnom,$conceptotickets,$periodosefectivos,$cuotas,$redondeo,$acumuladeb,$acumulacre,&$cont)
{
	$especial='NO';
	$valor1=Nomina::evaluar_Campo($grid["campo"],&$resecu,&$error,&$guardar,$codemp,$cargo,$conceptos["codcon"],$codnom,&$fecnom,$fechanac,$fechaing,$sexo,$especial,$desde,$hasta,$ultfec,$profec);
	if ($nroope==0)
	{
		$booleanos[0]=Nomina::evaluar_Cond($valor1,$grid["operador"],$grid["valor"]);
	}
	else
	{
		$booleanos[1]=Nomina::evaluar_Cond($valor1,$grid["operador"],$grid["valor"]);
		$booleanos[0]=Nomina::evaluar_Opelog($booleanos[0],$booleanos[1],$opelog);

		$nroope=0;
	}
	//if ( Herramientas::instr(strtoupper($grid["confor"]).' ',"AND OR",0,1) !=0 )
	if (Herramientas::StringPos(strtoupper($grid["confor"]),"AND",0)!=-1 || Herramientas::StringPos(strtoupper($grid["confor"]),"OR",0)!=-1)
	{
		$opelog=$grid["confor"];
		$nroope+=1;
	}
	else // es la formula
	{
		if ($booleanos[0])
		{
			// ejecuta y pasa a otro concepto
			$cadena= trim(strtoupper($grid["confor"]));
			$ecuacion=Nomina::posfix($cadena);
			Nomina::evalEcua(&$ecuacion,&$resecu,&$error,$codemp,$cargo,$conceptos["codcon"],$codnom,'btnCalcular','nrosem','datosins(2)','datosins(2)','datosins(2)','datosins(2)',$hasta,$fechanac,$fechaing,$sexo,&$vars,$especial='NO');
			self::ValidacionSalvar($vars,$error,$resecu,$codnom,$codemp,$cargo,$conceptos,$hasta,$desde,$nomnom,$conceptotickets,$periodosefectivos,$cuotas,$redondeo,$acumuladeb,$acumulacre,&$cont);

		}
		else
		{
			$nroope=0;
		} // fin $booleanos[0]
	}// fin else formula
}

public static function ValidacionSalvar($vars,$error,$resecu,$codnom,$codemp,$cargo,$conceptos,$hasta,$desde,$nomnom,$conceptotickets,$periodosefectivos,$cuotas,$redondeo,$acumuladeb,$acumulacre,&$cont)
{
	if ($vars!='')
		{
			$vars='CON'.$vars;
		}
		if (!$error && $resecu!=0)
		{
			$nomcal= new Npnomcal();
			$nomcal->setCodnom($codnom);
			$nomcal->setCodemp($codemp);
			$nomcal->setCodcar($cargo);
			$nomcal->setCodcon($conceptos["codcon"]);
			$nomcal->setFrecon($conceptos["frecon"]);
			$nomcal->setAsided($conceptos["asided"]);
			$nomcal->setFecnom($hasta);
			$nomcal->setFecnomdes($desde);
			$nomcal->setFecnomesphas($hasta);
			$nomcal->setFecnomespdes($desde);
			$nomcal->setEspecial('N');
			$nomcal->setNomcon($conceptos["nomcon"]);
			$nomcal->setNomnom($nomnom);

			// INDEPENDIENTEMENTE DE SEA CESTATICKET O NO HAY Q ACTUALIZAR CANTIDAD EN NPNOMCAL
			//if ($conceptotickets)
			//{
				//$sql61="Select cantidad from NPAsiConEmp where CodEmp='".$codemp."' and CodCar='".$cargo."' and CodCon='".$conceptos["codcon"]."'";
				/*if (Herramientas::BuscarDatos("Select cantidad from NPAsiConEmp where CodEmp='".$codemp."' and CodCar='".$cargo."' and CodCon='".$conceptos["codcon"]."'",&$tablacesta))
				{
					$nomcal->setCantidad($tablacesta["cantidad"]*$periodosefectivos);
				}
				else
				{*/
					//$nomcal->setCantidad($conceptos["cantidad"]*$periodosefectivos);
				//}
			//}
			//else
			//{
				$nomcal->setCantidad($conceptos["cantidad"]*$periodosefectivos);
			//}
			$nomcal->setMonto($conceptos["monto"]*$periodosefectivos);
			$nomcal->setAcucon($conceptos["acucon"]);
			$resecu=$resecu*$periodosefectivos;

			//$cuotas="Select * from NPTIPPRE where CodCon='".$conceptos["codcon"]."'";
			//if (Herramientas::BuscarDatos($cuotas,&$nptippre) && $resecu>floatval($conceptos["acumulado"]))
			if (($conceptos["prestamo"]=='S') && ($resecu>floatval($conceptos["acumulado"])))
			{
				$nomcal->setSaldo($conceptos["acumulado"]);
			}
			else
			{
				$nomcal->setSaldo($resecu);
			}
			if ($redondeo=='S')
			{
				if ( ($resecu-(int)($resecu)) > 0.5 )
				{
					$nomcal->setSaldo((int)($resecu)+1);
				}
				else
				{
					$nomcal->setSaldo((int)($resecu));
				}
			}
			if (($conceptos["prestamo"]=='S'))
			{
				$nomcal->setAcumulado($conceptos["acumulado"]-$resecu);
			}
			else
			{
				$nomcal->setAcumulado($conceptos["acumulado"]+$resecu);
			}

			if ($conceptos["asided"]=='A')
			{
				$acumulacre=$acumulacre+$resecu;
			}
			elseif ($conceptos["asided"]=='D')
			{
				$acumuladeb=$acumuladeb+$resecu;
			}
			$cont="si";
			$nomcal->save();
		}//else
		  //$cont="no";   // end if error
}




}
?>