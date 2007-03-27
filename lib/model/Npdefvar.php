<?php

/**
 * Subclass for representing a row from the 'npdefvar' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npdefvar extends BaseNpdefvar
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
