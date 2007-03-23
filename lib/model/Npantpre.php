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
  	  $c->add(NphojintPeer::CODEMP,str_pad(self::getCodemp(),16,' '));
  	  $nombre = NphojintPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else 
	    return ' ';
  }
}
