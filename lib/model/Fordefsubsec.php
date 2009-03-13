<?php

/**
 * Subclass for representing a row from the 'fordefsubsec' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Fordefsubsec extends BaseFordefsubsec
{
	public function getNomsec()
	{
		return Herramientas::getX('codsec','fordefsec','nomsec',self::getCodsec());
    }
}
