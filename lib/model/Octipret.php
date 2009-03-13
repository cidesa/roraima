<?php

/**
 * Subclass for representing a row from the 'octipret' table.
 *
 *
 *
 * @package lib.model
 */
class Octipret extends BaseOctipret
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


  public function getCodret()
  {
  return '';
  }
}
