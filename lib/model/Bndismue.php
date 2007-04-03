<?php

/**
 * Subclass for representing a row from the 'bndismue' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bndismue extends BaseBndismue
{
  public function getDesmue()
  {
  	  $c = new Criteria();
  	  $c->add(BnregmuePeer::CODMUE,self::getCodmue());
  	  $descripcion = BnregmuePeer::doSelectone($c);
	  if ($descripcion)
	  	return $descripcion->getDesmue();
	  else 
	    return ' ';
   }
   
  public function getDesmot()
  {
  	  $c = new Criteria();
  	  $c->add(BnmotdisPeer::CODMOT,self::getCodmot());
  	  $motivo = BnmotdisPeer::doSelectone($c);
	  if ($motivo)
	  	return $motivo->getDesmot();
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


