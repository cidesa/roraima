<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprnomdef extends BaseClases {

  public function SQLp($codempdes,$codemphas,$tipnomdes,$tipnomhas,$codcardes,$codcarhas,$especial,$codnomesp,$codcondes,$codconhas)
    {
    $sql= "SELECT DISTINCT
    C.CODEMP as codemp,
    C.NOMEMP as nomemp,
    C.NUMCUE as cuenta_banco,
    D.NOMBAN as nomban,
    C.CODNIV,
    F.DESNIV,
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
    (case when i.asided ='A' then coalesce(i.saldo,0) else 0 end) as asigna,
    (case when i.asided ='D' then coalesce(i.saldo,0) else 0 end) as deduc,
    (case when c.staemp ='A' then 'ACTIVO' else case when c.staemp='S' then 'SUSPENDIDO' else case when c.staemp='V' then 'VACACIONES'   end end  end) as estatus
    FROM  NPHOJINT C right outer join  NPBANCOS D on (C.CODBAN=D.CODBAN),NPASICAREMP B,
    NPCATPRE E, NPESTORG F, NPNOMCAL I, NPDEFCPT H,NPNOMINA J
    WHERE
    C.CODNIV=F.CODNIV AND
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
    trim(h.CODCON)>=trim('".$codcondes."') AND
    trim(h.CODCON)<=trim('".$codconhas."') AND
    H.IMPCPT='S' AND
    B.STATUS='V' AND
    i.asided<>'P'
    ORDER BY
    b.codnom,C.CODEMP,h.codcon";

      return $this->select($sql);

    }

    public function SQLnpnomesptipos($codnomesp)
    {
      $sql="SELECT FECNOMDES as FECHADEL,FECNOMHAS as FECHAHAS FROM NPNOMESPTIPOS WHERE CODNOMESP=RPAD('".$codnomesp."',3,' ')";

      return $this->select($sql);
    }

    public function SQLnpconsueldo($codemp,$codcar,$codcon)
    {
      $sql="SELECT coalesce(SUM(MONTO),0) as sueldo FROM NPASICONEMP A,NPCONSUELDO B WHERE trim(CODEMP) =trim('".$codemp."') AND trim(CODCAR) =trim('".$codcar."') AND A.CODCON=B.CODCON";

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