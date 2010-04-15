<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprrecpag2 extends baseClases{

    function SQLp($codnomdes,$codempdes,$codemphas,$codcardes,$codcarhas,$codcondes,$codconhas) {

    	$sql="select distinct a.codemp, c.nomemp,c.cedemp,to_char(c.fecing,'dd/mm/yyyy') as fecing,c.fecret,c.codban as codban,coalesce(c.numcue,'POR ASIGNAR') as numcue,g.nomban,a.codcon,
						a.codcar,b.nomcar,a.nomcon,a.fecnom,to_char(ultfec,'dd/mm/yyyy') as fecdes,to_char(profec,'dd/mm/yyyy') as fechas,
						(CASE WHEN a.asided='A' THEN coalesce(a.saldo,0) ELSE 0 END) as asigna,
						(CASE WHEN a.asided='D' THEN coalesce(a.saldo,0) ELSE 0 END) as deduc,
						a.asided,f.codcat,f.nomcat,a.nomnom,a.saldo,coalesce(c.codniv,' ') as codniv,coalesce(h.desniv,'POR ASIGNAR') as desniv,e.codnom as codnom
						from npnomcal a,
						npnomina i,
						npcargos b,
						npdefcpt d,
						npasicaremp e,
						npcatpre f,
						nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban) left outer join npestorg h on (c.codniv=h.codniv)
						where
						a.codnom = ('".trim($codnomdes)."') and
						(a.codemp) >= ('".$codempdes."') and
						(a.codemp) <= ('".$codemphas."') and
						(a.codcar) >= ('".$codcardes."') and
						(a.codcar) <= ('".$codcarhas."') and
						(a.codemp) >= '".$codempdes."' and
						(a.codemp) <= '".$codemphas."' and
						(a.codcar) >= '".$codcardes."' and
						(a.codcar) <= '".$codcarhas."' and
						a.codcon >= ('".trim($codcondes)."') and
						a.codcon <= ('".trim($codconhas)."') and
						e.codemp=a.codemp and
						e.codcar=a.codcar and
						e.codnom=a.codnom and
						a.codcar=b.codcar and
						a.codcon=d.codcon and
						e.codcat=f.codcat and
						e.codemp=c.codemp and
						a.codnom=i.codnom and
						d.impcpt = 'S' and status='V' and d.opecon <> 'P'
						order by a.codemp,coalesce(c.codniv,' '),c.cedemp";
		//H::printR($sql); exit;
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

    function sqlcontador($codnomdes,$codempdes,$codemphas,$codcardes,$codcarhas,$codcondes,$codconhas)
    {
    	$sql="select  count(distinct(a.codemp)) as numemp
							from npnomcal a, npcargos b, npdefcpt d,npasicaremp e,npcatpre f,
							nphojint c LEFT OUTER JOIN npbancos g ON (c.codban=g.codban)
							where
							a.codnom = ('".trim($codnomdes)."') and
							(a.codemp) >= ('".$codempdes."') and
							(a.codemp) <= ('".$codemphas."') and
							(a.codcar) >= ('".$codcardes."') and
							(a.codcar) <= ('".$codcarhas."') and
							a.codcon >= ('".trim($codcondes)."') and
							a.codcon <= ('".trim($codconhas)."') and
							e.codemp=a.codemp and
							e.codcar=a.codcar and
							e.codnom=a.codnom and
							a.codcar=b.codcar and
							a.codcon=d.codcon and
							e.codcat=f.codcat and
							e.codemp=c.codemp and
							d.impcpt = 'S' and status='V' and d.opecon <> 'P'
						";

    	return $this->select($sql);
    }

    function sqlnpnomcal($numrec,$codemp,$codcar,$codnom)
    {
    	$sql="update npnomcal set numrec='".$numrec."'
				 where (codemp)=('".$codemp."') and
				 (codcar)=('".$codcar."') and
				 codnom= '".$codnom."' ";
		$this->actualizar($sql);
    }

    function sqlbuscacorrel($codemp,$codcar,$codnom)
    {
    	$sql="select distinct numrec as numero
						from npnomcal
						where (codemp)=('".$codemp."') and
							  (codcar)=('".$codcar."') and
							  (codnom)= ('".$codnom."') ";
		return $this->select($sql);
    }

    function sqlcalulasueldo($codemp,$codnom)
    {
    	$sql="select monto as valor from npconsueldo a, npasiconemp b
    		where b.codemp=('$codemp') and  a.codnom='$codnom' and a.codcon=b.codcon";

    	return $this->select($sql);
    }

    function sqlprestamos($codcon)
    {
    	$sql="select codtippre as valor from nptippre where codcon='".$codcon."'";

		return $this->select($sql);
    }

    function sqlnpasiconemp($codemp,$codcar,$codcon)
    {
    	$sql="select coalesce(acumulado,0) as saldo
				  from npasiconemp
				  where (codcar) = ('".$codcar."') and
				  (codemp)=('".$codemp."') and
				  trim(codcon)=trim('".$codcon."')";

		return $this->select($sql);
    }
}
