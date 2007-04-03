<?php

/**
 * Subclass for representing a row from the 'npnomcal' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npnomcal extends BaseNpnomcal
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
	
 public function getFrecal()
  {
  	  $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $frecuencia = NpnominaPeer::doSelectone($c);
	  if ($frecuencia)
	  	return $frecuencia->getFrecal();
	  else 
	    return ' ';
  }
}
