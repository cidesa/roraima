<?php

/**
 * Subclass for representing a row from the 'npvacdisfrute' table.
 *
 *
 *
 * @package lib.model
 */
class Npvacdisfrute extends BaseNpvacdisfrute
{
	public function getNomemp()
	{
		$c = new Criteria();
		$c->add(NphojintPeer::CODEMP,self::getCodemp());
		$nombre = NphojintPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else 
	    return ' ';
  }
}
