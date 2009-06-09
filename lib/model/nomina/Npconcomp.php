<?php

/**
 * Subclass for representing a row from the 'npconcomp' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npconcomp extends BaseNpconcomp
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
  	  $c->add(NpdefcptPeer::CODCON,self::getCodcon());
  	  $nombre1 = NpdefcptPeer::doSelectone($c);
	  if ($nombre1)
	  	return $nombre1->getNomcon();
	  else 
	    return ' ';
  }
}
