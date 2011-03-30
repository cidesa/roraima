<?php

/**
 * Subclase para representar una fila de la tabla 'licomint'.
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
class Licomint extends BaseLicomint
{
    protected $grid=array();
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
        return H::GetX('Codclacomp','Occlacomp','Desclacomp',$this->codclacomp);
    }

    public function getMoncomlet()
    {
        return self::getMoncom()==0 ? '' : H::obtenermontoescrito(self::getMoncom());
    }

    public function getDestiplic()
    {
        return H::GetX('Codtiplic','Litiplic','destiplic',$this->codtiplic);
    }
    public function getMoncomext()
    {
      $c = new Criteria();
      $c->add(LidetcomintPeer::NUMCOMINT,$this->numcomint);
      $per = LidetcomintPeer::doSelect($c);
      $moncom = 0;
      foreach($per as $r)
      {
            $val = H::GetX('Numsol','Lisolegr','Valcam',$r->getNumsol());
            if($val>0)
               $moncom+=$r->getMontot()/$val;
      }
      return H::FormatoMonto($moncom);
    }

    public function getMoncomextlet()
    {
        return H::obtenermontoescrito(H::FormatoNum(self::getMoncomext()));
    }

}
