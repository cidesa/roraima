<?php

/**
 * Subclass for representing a row from the 'nphispre' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Nphispre extends BaseNphispre
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
  
  public function getNomtippre()
  {
  	  $c = new Criteria();
  	  $c->add(NptipprePeer::CODTIPPRE,self::getCodtippre());
  	  $nombre = NptipprePeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getDestippre();
	  else 
	    return ' ';
  }
}
