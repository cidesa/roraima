<?php

/**
 * Subclass for representing a row from the 'npnomespnomtip' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npnomespnomtip extends BaseNpnomespnomtip
{
  public function getNomnomesp()
  {
  	  $c = new Criteria();
  	  $c->add(NpnomesptiposPeer::CODNOMESP,self::getCodnomesp());
  	  $nombre = NpnomesptiposPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getDesnomesp();
	  else 
	    return ' ';
  }
  
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
