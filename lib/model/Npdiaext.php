<?php

/**
 * Subclass for representing a row from the 'npdiaext' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npdiaext extends BaseNpdiaext
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
