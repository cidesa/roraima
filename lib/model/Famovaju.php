<?php

/**
 * Subclass for representing a row from the 'famovaju' table.
 *
 *
 *
 * @package lib.model
 */
class Famovaju extends BaseFamovaju
{
  public function getCanajustada()
  {
    return self::getCanaju();
  }

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getCansol()
  {
    return self::getCanord();
  }

}
