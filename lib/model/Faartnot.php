<?php

/**
 * Subclass for representing a row from the 'faartnot' table.
 *
 *
 *
 * @package lib.model
 */
class Faartnot extends BaseFaartnot
{
	protected $canentregar="0,00";
	protected $canajustada="0,00";
	protected $montot="0,00";

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getNomalm()
  {
   return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
  }

  public function getCanord()
  {
  	$val=self::getCanent() + self::getCandes();
    return $val;
  }
}
