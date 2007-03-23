<?php

/**
 * Subclass for representing a row from the 'npvacdiasbonovac' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npvacdiasbonovac extends BaseNpvacdiasbonovac
{
public function getNomnom()
  {
  	  $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $nombre = NpnominaPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomnom();
	  else 
	    return ' ';
  }
}
