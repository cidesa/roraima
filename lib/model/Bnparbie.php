<?php

/**
 * Subclass for representing a row from the 'bnparbie' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bnparbie extends BaseBnparbie
{
  public function getNompardes()
  {
  	  $c = new Criteria();
  	  $c->add(NppartidasPeer::CODPAR,self::getPardes());
  	  $nombredes = NppartidasPeer::doSelectone($c);
	  if ($nombredes)
	  	return $nombredes->getNompar();
	  else 
	    return ' ';
   }
   
  public function getNomparhas()
  {
  	  $c = new Criteria();
  	  $c->add(NppartidasPeer::CODPAR,self::getParhas());
  	  $nombrehas = NppartidasPeer::doSelectone($c);
	  if ($nombrehas)
	  	return $nombrehas->getNompar();
	  else 
	    return ' ';
   }
}
