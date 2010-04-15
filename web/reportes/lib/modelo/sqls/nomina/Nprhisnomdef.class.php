<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprhisnomdef extends BaseClases {

	public function SQLp($codempdes,$codemphas,$tipnomdes,$tipnomhas,$codcardes,$codcarhas,$especial,$codnomesp,$codcondes,$codconhas,$pernomdes,$pernomhas)
    {
		$sql= "SELECT DISTINCT
		C.CODEMP as codemp,
		C.NOMEMP as nomemp,
		C.NUMCUE as cuenta_banco,
		D.NOMBAN as nomban,
		C.CODNIV,
		C.FECING as fecing,
		C.FECRET,
		C.CEDEMP as cedemp,
		B.CODCAR,
		b.codnom as codnom,
		j.nomnom as nomnom,
		j.ultfec as ultfec,
		j.profec as profec,
		B.NOMCAR as nomcar,
		B.CODCAT,
		E.NOMCAT,
		H.CODCON as codcon,
		trim(H.NOMCON) as nomcon,
		(case when h.opecon ='A' then coalesce(i.monto,0) else 0 end) as asigna,
		(case when h.opecon ='D' then coalesce(i.monto,0) else 0 end) as deduc,
		(case when c.staemp ='A' then 'ACTIVO' else case when c.staemp='S' then 'SUSPENDIDO' else case when c.staemp='V' then 'VACACIONES'   end end  end) as estatus
		FROM  NPHOJINT C right outer join  NPBANCOS D on (C.CODBAN=D.CODBAN),
		(SELECT DISTINCT X.CODEMP,X.CODCAR,X.CODNOM,X.CODCAT,Y.NOMCAR
		FROM NPHISCON X,NPCARGOS Y
		WHERE  X.CODCAR=Y.CODCAR AND X.CODNOM>='".$tipnomdes."' AND X.CODNOM<='".$tipnomhas."' AND
		X.ESPECIAL= case when substr('".$especial."',1,1)='A' then x.especial else substr('".$especial."',1,1) end and
		coalesce(X.CODNOMESP,'XXX')=case when substr('".$especial."',1,1)= 'S' then '".$codnomesp."' else coalesce(X.CODNOMESP,'XXX') end  AND
		(case when x.especial='N' then x.fecnom  when x.especial = 'S' then to_date(x.fecnomespdes,'dd/mm/yyyy') end)>=to_date('".$pernomdes."','dd/mm/yyyy') and
		(case when x.especial='N' then x.fecnom  when x.especial = 'S' then to_date(x.fecnomesphas,'dd/mm/yyyy') end)<=to_date('".$pernomhas."','dd/mm/yyyy')	) B,
		NPCATPRE E, NPESTORG F, NPHISCON I, NPDEFCPT H,NPNOMINA J
		WHERE
		trim(B.CODNOM) >= trim('".$tipnomdes."') AND
		trim(B.CODNOM) <= trim('".$tipnomhas."') AND
		E.CODCAT=B.CODCAT AND
		B.CODEMP=C.CODEMP AND
		I.CODCON=H.CODCON AND
		B.CODNOM=J.CODNOM AND
		I.CODNOM=B.CODNOM AND
		I.CODCAR=B.CODCAR AND
		I.CODEMP=B.CODEMP AND
		trim(C.CODEMP) >= trim('".$codempdes."') AND
		trim(C.CODEMP) <= trim('".$codemphas."') AND
		trim(B.CODCAR) >= trim('".$codcardes."') AND
		trim(B.CODCAR) <= trim('".$codcarhas."') AND
		i.especial = case when substr('".$especial."',1,1)='A' then i.especial else substr('".$especial."',1,1) end and
		coalesce(i.codnomesp,'XXX')= case when substr('".$especial."',1,1)='S' then '".$codnomesp."' else coalesce(i.codnomesp,'XXX') end  and
		to_date((case when i.ESPECIAL = 'N' then i.FECNOM when i.especial = 'S' then i.FECNOMESPDES end ),'yyyy-mm-dd')>=to_date('".$pernomdes."','dd/mm/yyyy') AND
		to_date((case when i.ESPECIAL = 'N' then i.FECNOM when i.especial = 'S' then i.FECNOMESPHAS end ),'yyyy-mm-dd')<=to_date('".$pernomhas."','dd/mm/yyyy') AND
		trim(h.CODCON)>=trim('".$codcondes."') AND
		trim(h.CODCON)<=trim('".$codconhas."') AND
		H.IMPCPT='S' AND
		H.opecon<>'P'
		ORDER BY
		C.CODEMP,h.codcon";

	    return $this->select($sql);

    }

    public function SQLnpnomesptipos($codnomesp)
    {
    	$sql="SELECT FECNOMDES as FECHADEL,FECNOMHAS as FECHAHAS FROM NPNOMESPTIPOS WHERE CODNOMESP=RPAD('".$codnomesp."',3,' ')";

    	return $this->select($sql);
    }

    public function SQLnpconsueldo($codemp,$codcar,$codnom)
    {
    	$sql="SELECT coalesce(SUM(MONTO),0) as sueldo FROM NPASICONEMP A,NPCONSUELDO B WHERE trim(CODEMP) =trim('".$codemp."') AND trim(CODCAR) =trim('".$codcar."') AND B.CODNOM='".$codnom."' AND A.CODCON=B.CODCON";

    	return $this->select($sql);
    }

    public function SQLnptippre($codcon)
    {
    	$sql=" SELECT CODTIPPRE as tippre FROM NPTIPPRE WHERE CODCON='".$codcon."'";

    	return $this->select($sql);
    }

    public function SQLnpasiconemp($codemp,$codcar,$codcon)
    {
    	$sql="SELECT coalesce(ACUMULADO,0) as SALDO FROM NPASICONEMP  WHERE trim(CODCAR) = trim('".$codcar."') AND trim(CODEMP)=trim('".$codemp."') AND CODCON='".$codcon."'";

    	return $this->select($sql);
    }

}
?>