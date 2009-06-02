<?php

/**
 * Subclass for representing a row from the 'bnubica' table.
 *
 *
 *
 * @package lib.model
 */
class Bnubica extends BaseBnubica
{
  private $genera= '';

  public function getGenera()
  {
    if (self::getStacod()=='C')
    { $var=true;}else { $var=false;}
    return $var;
  }
  public function setGenera($val)
  {
    $this->genera = $val;
  }

  public function getCodubiadm()
  {
  	return self::getCodubi();
  }

  public function getDesubiadm()
  {
  	return self::getDesubi();
  }
}
