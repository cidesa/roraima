<?php

/**
 * Subclass for performing query and update operations on the 'bndisbie' table.
 *
 *
 *
 * @package lib.model
 */
class BndisbiePeer extends BaseBndisbiePeer
{
	public static function getDesdis_descripcion($codigo)
	{
    	return Herramientas::getX('coddis','Bndisbie','desdis',trim($codigo));
	}


}
