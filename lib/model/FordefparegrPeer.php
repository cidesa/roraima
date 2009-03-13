<?php

/**
 * Subclass for performing query and update operations on the 'fordefparegr' table.
 *
 *
 *
 * @package lib.model
 */
class FordefparegrPeer extends BaseFordefparegrPeer
{

	public static function getNomparegr($codigo)
	{
	  return Herramientas::getX('CODPAREGR','Fordefparegr','Nomparegr',$codigo);
	}

}
