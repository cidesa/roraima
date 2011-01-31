<?php

/**
 * Subclass for representing a row from the 'cccueban' table.
 *
 *
 *
 * @package lib.model
 */
class Cccueban extends BaseCccueban
{
  public function __toString()
  {
    $banco = $this->getCcbanco();
    if($banco) return $banco->getAbrban().' - '.$this->getNumcue();
    else return $this->getNumcue();
  }


  public function getNombreTipoCuenta(){
   return Herramientas::getX('id','cctipcue','nomtipcue',self::getCctipcueid());
  }

  public function getNombreBanco(){
   return Herramientas::getX('id','ccbanco','nomban',self::getCcbancoid());
  }

}
