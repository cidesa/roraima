<?php

/**
 * Subclass for performing query and update operations on the 'fortipfin' table.
 *
 *
 *
 * @package lib.model
 */
class FortipfinPeer extends BaseFortipfinPeer
{
	public static function getDesfin($codfin)
	{
    	return Herramientas::getX('codfin','Fortipfin','nomext',str_pad($codfin,4,'0',STR_PAD_LEFT));
	}

}
