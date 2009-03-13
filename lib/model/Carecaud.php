<?php

/**
 * Subclass for representing a row from the 'carecaud' table.
 *
 *
 *
 * @package lib.model
 */
class Carecaud extends BaseCarecaud
{

   public function __toString()
    {
		return $this->getDesrec();
    }

  public function getDestiprec()
	{
		return Herramientas::getX('CODTIPREC','Catiprec','destiprec',self::getCodtiprec());
	}
}
