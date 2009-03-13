<?php

/**
 * Subclass for representing a row from the 'bndissem' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bndissem extends BaseBndissem
{
  public function getDessem()
  {
  	  $c = new Criteria();
  	  $c->add(BnregsemPeer::CODSEM,self::getCodsem());
  	  $descripcion = BnregsemPeer::doSelectone($c);
	  if ($descripcion)
	  	return $descripcion->getDessem();
	  else 
	    return ' ';
   }
	
  public function getDesubiori()
  {
  	  $c = new Criteria();
  	  $c->add(BnubibiePeer::CODUBI,self::getCodubiori());
  	  $origen = BnubibiePeer::doSelectone($c);
	  if ($origen)
	  	return $origen->getDesubi();
	  else 
	    return ' ';
   }
   
  public function getDesubides()
  {
  	  $c = new Criteria();
  	  $c->add(BnubibiePeer::CODUBI,self::getCodubides());
  	  $destino = BnubibiePeer::doSelectone($c);
	  if ($destino)
	  	return $destino->getDesubi();
	  else 
	    return ' ';
   }
}
