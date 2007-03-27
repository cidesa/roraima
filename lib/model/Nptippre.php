<?php

/**
 * Subclass for representing a row from the 'nptippre' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Nptippre extends BaseNptippre
{
  public function getNomcon()
  {
  	  $c = new Criteria();
  	  $c->add(NpasiconempPeer::CODCON,self::getCodcon());
  	  $nombre = NpasiconempPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomcon();
	  else 
	    return ' ';
  }
	
}
