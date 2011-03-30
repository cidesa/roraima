<?php

/**
 * Subclase para representar una fila de la tabla 'lianaofe'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lianaofe extends BaseLianaofe
{
    protected $gridleg=array();
    protected $gridtec=array();
    protected $gridfin=array();
    protected $gridfia=array();
    protected $gridtipemp=array();


    public function getEjepre()
    {
      $sql="select to_char(fecini,'yyyy') as anofis from contaba";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['anofis'];
      else
         return '';
    }

    public function getEnte()
    {
      $sql="select nomemp from Lidefemp";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['nomemp'];
      else
         return '';
    }

    public function getNomempeje()
    {
        return H::getX('Codemp','Lidatste','Nomemp',$this->codempeje);
    }

    public function getNomcareje()
    {
        return H::getX('Codemp','Lidatste','Nomcar',$this->codempeje);
    }

    public function getDesuniste()
    {
        return H::getX('Coduniste','Lidatste','Desuniste',$this->coduniste);
    }

    public function getNomempadm()
    {
        return H::getX('Codemp','lidatste','Nomemp',$this->codempadm);
    }

    public function getNomcaradm()
    {
        return H::getX('Codemp','lidatste','Nomcar',$this->codempadm);
    }

    public function getDesuniadm()
    {
        return H::getX('Coduniste','lidatste','Desuniste',$this->coduniadm);
    }

    public function getDesclacomp()
    {
        $c = new Criteria();
        $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
        $c->addJoin(LicomintPeer::CODCLACOMP, OcclacompPeer::CODCLACOMP);
        $c->add(LiplieespPeer::NUMEXP,$this->numexp);
        $per = OcclacompPeer::doSelectOne($c);
        if($per)
            return $per->getDesclacomp();
        else
            return '';
    }

    public function getDestiplic()
    {
        $c = new Criteria();
        $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
        $c->addJoin(LicomintPeer::CODTIPLIC, LitiplicPeer::CODTIPLIC);
        $c->add(LiplieespPeer::NUMEXP,$this->numexp);
        $per = LitiplicPeer::doSelectOne($c);
        if($per)
            return $per->getDestiplic();
        else
            return '';
    }

    public function getTipcom()
    {
        $c = new Criteria();
        $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
        $c->add(LiplieespPeer::NUMEXP,$this->numexp);
        $per = LicomintPeer::doSelectOne($c);
        if($per)
            return $per->getTipcom()=='N' ? 'NACIONAL' : ($per->getTipcom()=='I' ? 'INTERNACIONAL' : '');
        else
            return '';
    }

    public function getTipcon()
    {
        $c = new Criteria();
        $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
        $c->add(LiplieespPeer::NUMEXP,$this->numexp);
        $per = LicomintPeer::doSelectOne($c);
        if($per)
            return $per->getTipcon()=='B' ? 'BIENES' : ($per->getTipcom()=='S' ? 'SERVICIO' : '');
        else
            return '';
    }

    public function getNompro()
    {
        $c = new Criteria();
        $c->addJoin(CaproveePeer::CODPRO,LiregofePeer::CODPRO);
        $c->add(LiregofePeer::NUMEXP,$this->numexp);
        $per = CaproveePeer::doSelectOne($c);
        if($per)
            return $per->getNompro();
        else
            return '';
    }

    public function getRif()
    {
        $c = new Criteria();
        $c->addJoin(CaproveePeer::CODPRO,LiregofePeer::CODPRO);
        $c->add(LiregofePeer::NUMEXP,$this->numexp);
        $per = CaproveePeer::doSelectOne($c);
        if($per)
            return $per->getRifpro();
        else
            return '';
    }

    public function getNomrepleg()
    {
        $c = new Criteria();
        $c->addJoin(CaproveePeer::CODPRO,LiregofePeer::CODPRO);
        $c->add(LiregofePeer::NUMEXP,$this->numexp);
        $per = CaproveePeer::doSelectOne($c);
        if($per)
            return $per->getNomrepleg();
        else
            return '';
    }

    public function getOfenro()
    {
        return H::GetX('Numofe','Liregofe','Ofenro',$this->numofe);
    }

    public function getFecofe()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $per = LiregofePeer::doSelectOne($c);
        if($per)
            return $per->getFecofe('d/m/Y');
        else
            return '';
    }

    public function getMonofe()
    {
        return H::FormatoMonto(H::GetX('Numofe','Liregofe','Monofe',$this->numofe));
    }

    public function getMonofelet()
    {
        return H::obtenermontoescrito(H::FormatoNum(self::getMonofe()));
    }

    public function getPorvan()
    {
        return H::FormatoMonto(H::GetX('Numofe','Liregofe','Porvan',$this->numofe));
    }

    public function getDeclar()
    {
        $val = H::GetX('Numofe','Liregofe','Declar',$this->numofe);
        return $val=='S' ? 'ENTREGADO' : ($val=='N' ? 'NO ENTREGADO' : '');
    }
}

