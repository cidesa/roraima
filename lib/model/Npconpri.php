<?php

/**
 * Subclass for representing a row from the 'npconpri' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npconpri extends BaseNpconpri
{
  public function getNomina()
  {
      $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $nomina = NpnominaPeer::doSelectone($c);
	  if ($nomina)
	  	return $nomina->getNomnom();
	  else 
	    return '';
  }
  public function getConcepto()
  {
      $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,self::getCodcon());
  	  $concepto = NpdefcptPeer::doSelectone($c);
	  if ($concepto)
	  	return $concepto->getNomcon();
	  else 
	    return '';
  }	
  
}
