<?php

/**
 * Subclase para representar una fila de la tabla 'liplieesp'.
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
class Liplieesp extends BaseLiplieesp
{
    protected $gridart=array();
    protected $griduniart=array();
    protected $griddep=array();
    protected $gridmec=array();
    protected $gridact=array();
    protected $gridpub=array();
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
        $codclacomp = H::GetX('Numcomint','Licomint','Codclacomp',$this->numcomint);
        return H::GetX('Codclacomp','Occlacomp','Desclacomp',$codclacomp);
    }

    public function getDestiplic()
    {
        $codtiplic = H::GetX('Numcomint','Licomint','Codtiplic',$this->numcomint);
        return H::GetX('Codtiplic','Litiplic','destiplic',$codtiplic);
    }

    public function getTipcom()
    {
        $tipcom = H::GetX('Numcomint','Licomint','Tipcom',$this->numcomint);
        return $tipcom=='N' ? 'NACIONAL' : ( $tipcom=='I' ? 'INTERNACIONAL' : '');
    }
    
    public function getMoneda()
    {
        $c = new Criteria();
        $c->add(LicomintPeer::NUMCOMINT,$this->numcomint);
        $c->addJoin(LicomintPeer::CODMON,TsdesmonPeer::CODMON);
        $per = TsdesmonPeer::doSelectOne($c);
        if($per)
          return  $per->getNommon();  
        else
          return '';
    }

    public function getCosplielet()
    {
        return H::obtenermontoescrito(self::getCosplie());
    }


}
