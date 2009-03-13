<?php

/**
 * Subclass for representing a row from the 'ocproper' table.
 *
 *
 *
 * @package lib.model
 */
class Ocproper extends BaseOcproper
{
  public function getNomper()
  {
  return Herramientas::getX('CEDPER','Ocdefper','Nomper',self::getCedper());
  }

  public function getCodtippro()
  {
  return Herramientas::getX('CEDPER','Ocdefper','Codtippro',self::getCedper());
  }

  public function getCodtipcar()
  {
  return Herramientas::getX('CEDPER','Ocdefper','Codtipcar',self::getCedper());
  }

  public function getDestippro()
  {
  return Herramientas::getX('CODTIPPRO','Octippro','Destippro',self::getCodtippro());
  }

  public function getDestipcar()
  {
  return Herramientas::getX('CODTIPCAR','Octipcar','Destipcar',self::getCodtipcar());
  }
}
