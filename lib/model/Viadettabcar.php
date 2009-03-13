<?php

/**
 * Subclass for representing a row from the 'viadettabcar' table.
 *
 *
 *
 * @package lib.model
 */
class Viadettabcar extends BaseViadettabcar
{
	protected $objcargos = array();

  public function getNomcar()
  {
  	return Herramientas::getX('codcar','npcargos','nomcar',self::getCodcar());

  }
}
