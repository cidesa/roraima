<?php

/**
 * Subclass for representing a row from the 'npconfon' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npconfon extends BaseNpconfon
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
  
  public function getNomcon()
  {
  	  $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,self::getCodCon());
  	  $nombre1 = NpdefcptPeer::doSelectone($c);
	  if ($nombre1)
	  	return $nombre1->getNomcon();
	  else 
	    return ' ';
  }
	
}
