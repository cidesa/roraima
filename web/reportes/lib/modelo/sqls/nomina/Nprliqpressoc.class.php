<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprliqpressoc extends baseClases
{
	function sqlp($cedemp)//TRAE LOS DATOS PERSONALES DEL EMPLEADO
    {
    	$sql = "select distinct c.nacemp, c.codemp,c.nomemp, 
				to_char(a.fechaingreso,'dd/mm/yyyy') as fechaing, to_char (a.fechaegreso, 'dd/mm/yyyy') as fechaegr,
				a.anoefectivo, a.mesefectivo, a.diasefectivo, a.monto108, a.int108,a.anticipos,
				d.nomcar,d.nomcat
				from npliquidacion a, npliquidacion_det b, nphojint c, (select codemp,nomcar,nomcat,fecnom from nphiscon where codemp='".$cedemp."' order by fecnom desc limit 1 ) d
				where a.cedula='".$cedemp."'  and a.cedula=b.codemp and b.codemp=c.codemp and b.codemp=d.codemp ";
      
      return $this->select($sql);
    }



	function pagos($cedula)//se trae todos los pagos que se le han hecho al empleado
	{
		$sql="SELECT  distinct FECINICON, FECFINCON, to_char(fecinicon,'YYYY') as anio1, to_char(add_months(fecinicon,12), 'YYYY') as anio2
   			  FROM NPSALINT
			  WHERE CODEMP = '".$cedula."'";
			//  H::PrintR($sql);exit;
		return $this->select($sql);
	}

    function montos($cedula,$fecha1,$fecha2,$concepto)//CON ESTA FUNCION SE BUSCAN LOS MONTOS DE LAS ASIGNACIONES POR PERIODO DE CADA TRABAJADOR
    {
    	$sql="SELECT CODCON, SUM (MONTO) as monto FROM NPHISCON WHERE CODEMP = '".$cedula."' and fecnom >= ('".$fecha1."') and fecnom <= ('".$fecha2."') and codcon = '".$concepto."' GROUP BY CODCON ";
        #H::PrintR($sql);
		return $this->select($sql);

    }

	function asignaciones ($cedula) //CON ESTA FUNCION BUSCO LOS CONCEPTOS QUE TIENE EL TRABAJADOR
	{
		$sql = "select distinct c.codcpt, c.nomcon from (select x.codcpt, y.nomcon
				from (select b.codcpt from npconasi b right outer join
				((select distinct codasi from npsalint where codemp = '".$cedula."')) a
				on b.codasi = a.codasi order by b.codcpt) x left outer join npdefcpt y on (x.codcpt = y.codcon) order by x.codcpt) c left outer join
				nphiscon d on (c.codcpt = d.codcon) where d.codemp = '".$cedula."' order by c.codcpt";

	    return $this->select($sql);
	}


    function anticipos($cedemp)//TRAE LOS ANTICIPOS DADOS AL EMPLEADO
    {
    	$sql = "select fecant, monant from npantpre where
				codemp = '".$cedemp."'";
      //H::PrintR($sql);exit;
      return $this->select($sql);
    }

    function vacaciones($cedemp)//TRAE LOS BONOS VACACACIONALES DADOS AL EMPLEADO
    {
    	$sql = "SELECT desde,hasta,corresponde,disfrutados,(corresponde-disfrutados) as dias,
				fracciondia from npliqvacacion WHERE CODEMP = '".$cedemp."'";
      //H::PrintR($sql);exit;
      return $this->select($sql);
    }
	
	function sueldo($codemp,$fecegr)//TRAE SUELDO
    {
    	$sql= "Select coalesce(sum(MonAsi),0) as ultsue from NPSALINT a, npasipre b where CodEmp='$codemp' and 
						FECFINCON = (SELECT MAX(FECFINCON) FROM NPSALINT where CodEmp='$codemp' and 
						FECFINCON<= to_date('$fecegr','dd/mm/yyyy')) and a.codcon=b.codcon and a.codasi=b.codasi and b.tipasi='S'  ";
      //H::PrintR($sql);exit;
      return $this->select($sql);
    }
	
	









}