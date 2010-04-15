<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprantserv extends baseClases
{

    function sqlp ($cedemp)//DATOS DEL EMPLEADO
	{
		$sql = "select distinct (a.codemp) as codigo,b.nomemp as nombre,to_char(b.fecret,'dd/mm/yyyy') as fecret " .
				"from " .
				"npliquidacion_det a,nphojint b " .
				"where " .
				"a.codemp=b.codemp and  a.codemp = '".$cedemp."'";

		return $this->select($sql);
	}

	function sqldatos($cedemp,$tipo)//TRAE LOS DATOS DEL CARGO DEL EMPLEADO AL MOMENTO QUE INGRESO o EGRESO
    {

    	if ($tipo == 'E')//tipo egreso
    	{
    		$sql = "select distinct b.cedula as cedula, to_char(b.fechaegreso,'dd/mm/yyyy') as fechaegr, " .
    			"c.nomcar, c.suecar
				from
				npliquidacion b right outer join (select distinct a.codemp, a.codcar, " .
				"a.codcat from nphiscon a where codemp in (select distinct codemp from npliquidacion_det) and " .
				"fecnom=(select max(fecnom) from nphiscon where codemp=a.codemp)
				) a on (b.cedula = a.codemp), npcargos c
				where
				a.codcar = c.codcar and
				b.cedula = '".$cedemp."'";

    	}
    	else//si es ingreso
    	{
    		$sql = "select distinct b.cedula as cedula, to_char(min(d.fecing),'dd/mm/yyyy') as fechaing,
	    			c.nomcar, c.suecar
					from
					npliquidacion b right outer join (select distinct a.codemp, a.codcar,
					a.codcat from nphiscon a where codemp in (select distinct codemp from npliquidacion_det) and
					fecnom=(select min(fecnom) from nphiscon where codemp=a.codemp)
					) a on (b.cedula = a.codemp), npcargos c,  nphiineg d
					where
					a.codcar = c.codcar and
					--a.codcat = d.codcat and
					d.codemp = b.cedula and
					b.cedula = '".$cedemp."'
					group by b.cedula, c.nomcar, c.suecar";

    	}

    	     // H::PrintR($sql);exit;
      return $this->select($sql);
    }

    function pagos($codemp,$tipo)
    {
    	$this->bd = new basedatosado();
    	if ($tipo == 'E')
    	{
    		$rscon=$this->bd->select("select max(fecnom) as fecha from nphiscon where codemp = '".$codemp."'");
    	    $fecha = $rscon->fields["fecha"];

    	}
    	else
    	{
    		$rscon=$this->bd->select("select min(fecnom) as fecha from nphiscon where codemp = '".$codemp."'");
    	    $fecha = $rscon->fields["fecha"];

    	}

        $sql = "select a.codcon, sum(a.monto) as monto, a.fecnom, a.codnom, b.nomcon
				from
				nphiscon a left outer join npconsalint d on (a.codcon = d.codcon and a.codnom = d.codnom), npdefcpt b
				where
				a.codcon = b.codcon
   				and a.codemp = '".$codemp."' and a.fecnom = '".$fecha."' group by a.codcon, a.fecnom, a.codnom, b.nomcon order by a.codcon, a.fecnom";
        return $this->select($sql);

    }


	function prespag ($codemp)//averigua si las prestaciones del empleado fueron pagadas o no
	{
		$sql = "select numord from npliquidacion_det where codemp = '".$codemp."' limit 1";
        return $this->select($sql);

	}
}