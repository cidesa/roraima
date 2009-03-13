<?php

/**
 * Subclass for representing a row from the 'bndisinm' table.
 *
 *
 *
 * @package lib.model
 */
class Bndisinm extends BaseBndisinm
{
  public function getDesinm()
  {
  	return Herramientas::getX('CODINM','Bnreginm','Desinm',self::getCodmue());
   }

  public function getDesubiori()
  {
  	return Herramientas::getX('CODUBI','Bnubibie','Desubi',self::getCodubiori());
   }

  public function getDesubides()
  {
  	return Herramientas::getX('CODUBI','Bnubibie','Desubi',self::getCodubides());
   }

   public function getDesmot(){

    return Herramientas::getX('codmot','Bnmotdis','desmot',self::getMotdisinm());

  }
}
