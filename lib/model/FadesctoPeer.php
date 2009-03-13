<?php

/**
 * Subclass for performing query and update operations on the 'fadescto' table.
 *
 *
 *
 * @package lib.model
 */
class FadesctoPeer extends BaseFadesctoPeer
{
	public static function getDescripcion($coddesc)
	{
    	return Herramientas::getX('CODDESC','Fadescto','desdesc',trim($coddesc));
	}

	public static function getMondesc($coddesc)
	{
    	return Herramientas::getX('CODDESC','Fadescto','mondesc',trim($coddesc));
	}

}
