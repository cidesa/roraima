<?php

/**
 * Subclass for representing a row from the 'bndismue' table.
 *
 *
 *
 * @package lib.model
 */
class Bndismue extends BaseBndismue
{
  public function getDesmue()
  {
    return Herramientas::getX('Codmue','Bnregmue','Desmue',self::getCodmue());
   }

  public function getDesmot()
  {
      return Herramientas::getX('Codmot','Bnmotdis','Desmot',self::getCodmot());
   }

  public function getDesubiori()
  {
      return Herramientas::getX('Codubi','Bnubibie','Desubi',self::getCodubiori());
   }

  public function getDesubides()
  {
    return Herramientas::getX('Codubi','Bnubibie','Desubi',self::getCodubides());
  }

  public function getIdrefer()
  {
    $numerocomprobante="ACM".substr(self::getNrodismue(),-5,10);
    return Herramientas::getX_vacio('reftra','contabc','id',$numerocomprobante);
  }

}


