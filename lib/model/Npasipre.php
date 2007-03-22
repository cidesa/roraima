<?php

/**
 * Subclass for representing a row from the 'npasipre' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npasipre extends BaseNpasipre
{
public function getNomcon()
  {
  	  $c = new Criteria();
  	  $c->add(NptipconPeer::CODTIPCON,self::getCodcon());
  	  $nombre = NptipconPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getDestipcon();
	  else 
	    return ' ';
  }
}
