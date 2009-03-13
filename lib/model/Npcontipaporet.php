<?php

/**
 * Subclass for representing a row from the 'npcontipaporet' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npcontipaporet extends BaseNpcontipaporet
{
public function getDestipapo()
  {
  	  $c = new Criteria();
  	  $c->add(NptipaportesPeer::CODTIPAPO,self::getCodtipapo());
  	  $des = NptipaportesPeer::doSelectone($c);
	  if ($des)
	  	return $des->getDestipapo();
	  else 
	    return ' ';
  }
  public function getNomina()
  {
      $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $nomina = NpnominaPeer::doSelectone($c);
	  if ($nomina)
	  	return $nomina->getNomnom();
	  else 
	    return '<!Nombre no encontrado!>';
  }
  public function getConcepto()
  {
      $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,self::getCodcon());
  	  $concepto = NpdefcptPeer::doSelectone($c);
	  if ($concepto)
	  	return $concepto->getNomcon();
	  else 
	    return '<!Nombre no encontrado!>';
  }	  
	

}


