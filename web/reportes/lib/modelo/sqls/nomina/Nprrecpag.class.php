<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprrecpag extends baseClases{

    function SQLp($codnomdes,$codempdes,$codemphas,$codcardes,$codcarhas,$codcondes,$codconhas,$especial,$nomminesp,$nommaxesp)
    {

	if($especial=='S')
	{
    	$sql="select distinct a.codemp, c.nomemp,c.cedemp,to_char(c.fecing,'dd/mm/yyyy') as fecing,to_char(c.fecret,'dd/mm/yyyy') as fecret,c.codban as codban,c.numcue,g.nomban,a.codcon,
						a.codcar,b.nomcar,a.nomcon,a.fecnom,to_char(a.fecnomespdes,'dd/mm/yyyy') as fecdes, to_char(a.fecnomesphas,'dd/mm/yyyy') as fechas,
						(CASE WHEN a.asided='A' THEN coalesce(a.saldo,0) ELSE 0 END) as asigna,
						(CASE WHEN a.asided='D' THEN coalesce(a.saldo,0) ELSE 0 END) as deduc,
						a.asided,f.codcat,f.nomcat,a.nomnom,a.saldo,coalesce(c.codniv,' ') as codniv,e.codnom as nomina2, h.desniv
						from npnomcal a, npcargos b, npdefcpt d,npasicaremp e,npcatpre f, npestorg h,
						nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban)
						where
						a.codnom =trim('".$codnomdes."')  and
						f.codcat=e.codcat and e.codemp=a.codemp and
						e.codcar=a.codcar and e.codnom=a.codnom and
						c.codemp=a.codemp and b.codcar=a.codcar and
						trim(a.codemp) >=trim('".$codempdes."') and trim(a.codemp) <= trim('".$codemphas."') and
						trim(a.codcar) >=trim('".$codcardes."') and trim(a.codcar) <= trim('".$codcarhas."') and
						a.codcon >= trim('".$codcondes."') and a.codcon <=trim('".$codconhas."') and
						a.codcon=d.codcon and d.impcpt = 'S' and status='V' and d.opecon <> 'P' and a.especial='".$especial."' and
						a.codnomesp>='".$nomminesp."' and a.codnomesp<='".$nommaxesp."' and c.codniv=h.codniv
						order by f.codcat,a.codcar,a.codemp,coalesce(c.codniv,' '),c.cedemp";
	}
	else
	{
		$sql="select distinct a.codemp, c.nomemp,c.cedemp,to_char(c.fecing,'dd/mm/yyyy') as fecing,to_char(c.fecret,'dd/mm/yyyy') as fecret,c.codban as codban,c.numcue,g.nomban,a.codcon,
						a.codcar,b.nomcar,a.nomcon,a.fecnom,to_char(a.fecnomespdes,'dd/mm/yyyy') as fecdes, to_char(a.fecnomesphas,'dd/mm/yyyy') as fechas,
						(CASE WHEN a.asided='A' THEN coalesce(a.saldo,0) ELSE 0 END) as asigna,
						(CASE WHEN a.asided='D' THEN coalesce(a.saldo,0) ELSE 0 END) as deduc,
						a.asided,f.codcat,f.nomcat,a.nomnom,a.saldo,coalesce(c.codniv,' ') as codniv,e.codnom as nomina2, h.desniv
						from npnomcal a, npcargos b, npdefcpt d,npasicaremp e,npcatpre f, npestorg h,
						nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban)
						where
						a.codnom =trim('".$codnomdes."')  and
						f.codcat=e.codcat and e.codemp=a.codemp and
						e.codcar=a.codcar and e.codnom=a.codnom and
						c.codemp=a.codemp and b.codcar=a.codcar and
						trim(a.codemp) >=trim('".$codempdes."') and trim(a.codemp) <= trim('".$codemphas."') and
						trim(a.codcar) >=trim('".$codcardes."') and trim(a.codcar) <= trim('".$codcarhas."') and
						a.codcon >= trim('".$codcondes."') and a.codcon <=trim('".$codconhas."') and
						a.codcon=d.codcon and d.impcpt = 'S' and status='V' and d.opecon <> 'P' and a.especial='".$especial."' and c.codniv=h.codniv
						order by f.codcat,a.codcar,a.codemp,coalesce(c.codniv,' '),c.cedemp";

	}

						//print '<pre>'; 	print $sql;

    	return $this->select($sql);
    }

    function sqlnumrel()
    {
    	$sql="select numrec as ultrec from npdefgen";

    	return $this->select($sql);
    }

    function sqlnpdefgen($numrecnew)
    {
    	$sql="update npdefgen set numrec='".$numrecnew."'  ";

    	$this->actualizar($sql);

    }

    function sqlcontador($codnomdes,$codnomhas,$codempdes,$codemphas,$codcardes,$codcarhas,$codcondes,$codconhas)
    {
    	$sql="select  count(distinct(a.codemp)) as numemp
							from npnomcal a, npcargos b, npdefcpt d,npasicaremp e,npcatpre f,
							nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban)
							where
							a.codnom >=trim('".$codnomdes."') and a.codnom <= trim('".$codnomhas."') and
						f.codcat=e.codcat and e.codemp=a.codemp and
						e.codcar=a.codcar and e.codnom=a.codnom and
						c.codemp=a.codemp and b.codcar=a.codcar and
						trim(a.codemp) >=trim('".$codempdes."') and trim(a.codemp) <= trim('".$codemphas."') and
						trim(a.codcar) >=trim('".$codcardes."') and trim(a.codcar) <= trim('".$codcarhas."') and
						a.codcon >= trim('".$codcondes."') and a.codcon <=trim('".$codconhas."') and
						a.codcon=d.codcon and d.impcpt = 'S' and status='V' and d.opecon <> 'P'
						";

    	return $this->select($sql);
    }

    function sqlnpnomcal($numrec,$codemp,$codcar,$codnom)
    {
    	$sql="update npnomcal set numrec='".$numrec."'
				 where trim(codemp)=trim('".$codemp."'') and
				 trim(codcar)=trim('".$codcar."') and
				 codnom= '".$codnom."' ";
		$this->actualizar($sql);
    }

    function sqlbuscacorrel($codemp,$codcar,$codnom)
    {
    	$sql="select distinct numrec as numero
						from npnomcal
						where trim(codemp=trim('".$codemp."') and
							 trim(codcar=trim('".$codcar."') and
							 codnom= '".$codnom."' ";
		return $this->select($sql);
    }

    function sqlcalulasueldo($codcar)
    {
    	$sql="select suecar as valor
						from npcargos
						where
						trim(codcar) =trim('".$codcar."')";

    	return $this->select($sql);
    }

        function sqlcalulasueldo2($codemp)
    {
    	$sql="select distinct(sueldo) as valor from npasicaremp where codemp=trim('".$codemp."')";

    	return $this->select($sql);
    }

    function sqlprestamos($codcon)
    {
    	$sql="select codtippre as valor from nptippre where codcon='".$codcon."'";
        //H::PrintR($sql);exit;
		return $this->select($sql);
    }

    function sqlnpasiconemp($codemp,$codcar,$codcon)
    {
    	$sql="select coalesce(acumulado,0) as saldo
				  from npasiconemp
				  where trim(codcar) = trim('".$codcar."') and
				  trim(codemp)=trim('".$codemp."') and codcon='".$codcon."'";

		return $this->select($sql);
    }



    function sqlcuotas($codemp,$codnom)
    {
    	$sql = "select
				a.codemp,a.acumulado as saldo,a.monto,a.cantidad,
				cast (abs(a.monto/a.cantidad) as int)  as cuotas,
				((cast (abs(a.monto/a.cantidad) as int))-(cast (abs(a.acumulado/a.cantidad) as int))) as cuotas_canceladas,
				cast (abs(a.acumulado/a.cantidad) as int)  as cuotas_pendientes,
				b.codtippre as tipopres,b.codcon,
				b.destippre as descripcion
				from
				npasiconemp a,
				nptippre b , npasicaremp c
				where
				a.monto<>0 and a.acumulado <>0 and a.monto>0 and
				a.codcon = b.codcon and a.codcar=c.codcar  and a.codemp=c.codemp
				and a.codemp = '".$codemp."'
				group by a.codemp, b.codtippre, a.acumulado, a.monto, b.destippre,b.codcon,a.cantidad";
			//	print '<pre>'; print $sql;
				return $this->select($sql);
    }
}
?>