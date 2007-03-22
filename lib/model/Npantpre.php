<?php

/**
 * Subclass for representing a row from the 'npantpre' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npantpre extends BaseNpantpre
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
