<?php

/**
 * Subclass for representing a row from the 'optipret' table.
 *
 *
 *
 * @package lib.model
 */
class Optipret extends BaseOptipret
{
  private $base = '';
  private $montorete = '';

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcon());
  }

  public function getConsustra()
  {
  if (self::getPorret()!=0)
   return 'N';
  else
   return 'S';
  }

  public function setBase($val)
  {
  $this->base = $val;
  }

  public function getBase()
  {
  return $this->base;
  }

  public function setMontorete($val)
  {
  $this->montorete = $val;
  }

  public function getMontorete()
  {
  return $this->montorete;
  }

  public function getEsta()
  {
    $codigo="";
    $c = new Criteria();
    $c->add(TsretivaPeer::CODRET,self::getCodtip());
    $datos = TsretivaPeer::doSelect($c);
    if ($datos)
    {
      foreach ($datos as $codigos)
      {
        $codigo=$codigo."_".$codigos->getCodpar();
      }

      return $codigo;
    }else return 'N';
  }

  public function getCodret()
  {
  return '';
  }

  public function getEstaislr()
  {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'002');
    $c->add(TsrepretPeer::CODRET,self::getCodtip());
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
  }

   public function getEsta1xmil()
   {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'003');
    $c->add(TsrepretPeer::CODRET,self::getCodtip());
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
   }

   public function getMontoiva()
   {
    $c = new Criteria();
    $c->add(TsretivaPeer::CODRET,self::getCodtip());
    $result = TsretivaPeer::doSelectOne($c);
    if ($result)
    {
       $c= new Criteria();
       $c->add(CarecargPeer::CODRGO,$result->getCodrec());
       $resul= CarecargPeer::doSelectOne($c);
       if ($resul)
       {
         return $resul->getMonrgo();
       }else {return 0;}
    }
   }

  public function setFactor($v)
  {

    if ($this->factor !== $v) {
        $this->factor = Herramientas::toFloatdecimal($v,4);
        $this->modifiedColumns[] = OptipretPeer::FACTOR;
      }
	}

  public function getFactor($val=false)
  {
    if($val) return number_format($this->factor,4,',','.');
    else return $this->factor;
  }
}
