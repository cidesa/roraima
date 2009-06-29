<?php

/**
 * Subclass for representing a row from the 'cpcompro' table.
 *
 *
 *
 * @package lib.model
 */
class Cpcompro extends BaseCpcompro
{
	protected $obj = array();
	protected $check = "";
    protected $nompro = "";

  public function afterHydrate(){
    $this->nompro = Herramientas::getX('RIFPRO','Caprovee','Nompro',self::getCedrif());

  }
  public function getRefmov()
  {
    return self::getRefcom();
  }


}
