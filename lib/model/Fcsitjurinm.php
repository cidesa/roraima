<?php

/**
 * Subclass for representing a row from the 'fcsitjurinm' table.
 *
 *
 *
 * @package lib.model
 */
class Fcsitjurinm extends BaseFcsitjurinm
{

	public function getDescripcioncodsit()
	{
		return Herramientas::getX('codsitinm','fcsitjurinm','nomsitinm',self::getCodsitinm());
	}

}
