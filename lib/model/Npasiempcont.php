<?php

/**
 * Subclass for representing a row from the 'npasiempcont' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npasiempcont extends BaseNpasiempcont
{
  public function getDestipcon()
  {
  	  $c = new Criteria();
  	  $c->add(NptipconPeer::CODTIPCON,self::getCodtipcon());
  	  $nombre2 = NptipconPeer::doSelectone($c);
	  if ($nombre2)
	  	return $nombre2->getDestipcon();
	  else 
	    return ' ';
  }
	
}
