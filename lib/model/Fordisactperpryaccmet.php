<?php

/**
 * Subclass for representing a row from the 'fordisactperpryaccmet' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Fordisactperpryaccmet extends BaseFordisactperpryaccmet
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
	
public function getDesmet()
  {
  	  $c = new Criteria();
  	  $c->add(FordefpryaccmetPeer::CODMET,self::getCodmet());
  	  $descripcion = FordefpryaccmetPeer::doSelectone($c);
	  if ($descripcion)
	  	return $descripcion->getDesmet();
	  else 
	    return ' ';
  }
}
