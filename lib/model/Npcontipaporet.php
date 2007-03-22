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
	

}


