<?php

/**
 * Subclase para representar una fila de la tabla 'liprebasdet'.
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
class Liprebasdet extends BaseLiprebasdet
{
    protected $cadena='';

    public function afterHydrate()
    {
        $c = new Criteria();
        $c->add(LiprergoPeer::NUMPRE,self::getNumpre());
        $c->add(LiprergoPeer::CODART,self::getCodart());
        $per = LiprergoPeer::doSelect($c);
        $cadena='';
        foreach($per as $r)
        {
            $cadena.=$r->getCodart().'_'.$r->getCodcat().'_'.$r->getMonrgo().'_'.$r->getCodrgo().'!';
        }
        $this->cadena=$cadena;
        if(!self::getUnimed())
        {
            $this->unimed = H::GetX('Codart','Caregart','Unimed',$this->codart);
        }
    }

    public function getDesart()
    {
        return H::GetX('Codart','Caregart','Desart',$this->codart);
    }

    public function getNomcat()
    {
        return H::GetX('Codcat','Npcatpre','Nomcat',$this->codcat);
    }

    public function getDispo()
    {
        $mondis=0;
        $sql="select mondis from cpasiini where perpre='00' and codpre='".$this->codpre."'";
        if(H::BuscarDatos($sql, $rs))
        {
            $mondis = $rs[0]['mondis'];
        }
        return H::FormatoMonto($mondis);
    }

    public function getCostoe()
    {
      if(self::getValcam()>0)
        return H::FormatoMonto(self::getCosto()/self::getValcam());
      else
        return '';
    }

    public function getSubtote()
    {
      if(self::getValcam()>0)
        return H::FormatoMonto(self::getSubtot()/self::getValcam());
      else
        return '';
    }

    public function getTotale()
    {
      if(self::getValcam()>0)
        return H::FormatoMonto(self::getTotal()/self::getValcam());
      else
        return '';
    }

    public function getMontote()
    {
      if(self::getValcam()>0)
        return H::FormatoMonto(self::getMontot()/self::getValcam());
      else
        return '';
    }

    public function getNomext()
    {
       return H::GetX('Codfin','Fortipfin','Nomext',$this->codfin);
    }

    public function getCantid()
    {
        return H::FormatoMonto(self::getCansol());
    }
}
