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


  public function afterHydrate(){
    $this->reflib = Herramientas::getX('refpag','tsmovlib','reflib',self::getRefpag());

  }


  public function getRefmov()
  {
    return self::getRefpag();
  }
}
