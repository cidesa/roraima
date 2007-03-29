<?php

/**
 * Subclass for representing a row from the 'npvacsalidas' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npvacsalidas extends BaseNpvacsalidas
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
	
  public function getFecing()
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $fecha = NphojintPeer::doSelectone($c);
	  if ($fecha)
	  	return $fecha->getFecing();
	  else 
	    return ' ';
   }
	
}
