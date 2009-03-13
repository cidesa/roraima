<?php

/**
 * Subclass for representing a row from the 'forasopryaccespsubacc' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Forasopryaccespsubacc extends BaseForasopryaccespsubacc
{
  public function getNompro()
  {
  	  $c = new Criteria();
  	  $c->add(FordefpryPeer::CODPRO,self::getCodpro());
  	  $nombre = FordefpryPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNompro();
	  else 
	    return ' ';
  }
}
