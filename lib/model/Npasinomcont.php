<?php

/**
 * Subclass for representing a row from the 'npasinomcont' table.
 *
 *
 *
 * @package lib.model
 */
class Npasinomcont extends BaseNpasinomcont
{
	  public function getNomnom()
	  {
	  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
	  }
}
