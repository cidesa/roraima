<?php

/**
 * Subclass for representing a row from the 'cppagos' table.
 *
 *
 *
 * @package lib.model
 */
class Cppagos extends BaseCppagos
{
	protected $reflib = '';
	protected $numcue = '';


  public function afterHydrate(){
    $this->reflib = Herramientas::getX('refpag','tsmovlib','reflib',self::getRefpag());
    $this->numcue = Herramientas::getX('refpag','tsmovlib','numcue',self::getRefpag());

  }


  public function getRefmov()
  {
    return self::getRefpag();
  }
}
