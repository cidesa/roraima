<?php

/**
 * Subclass for representing a row from the 'bndisinm' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bndisinm extends BaseBndisinm
{
  public function getDesinm()
  {
  	  $c = new Criteria();
  	  $c->add(BnreginmPeer::CODINM,self::getCodmue());
  	  $descripcion = BnreginmPeer::doSelectone($c);
	  if ($descripcion)
	  	return $descripcion->getDesinm();
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
