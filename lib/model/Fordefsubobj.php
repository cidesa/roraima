<?php

/**
 * Subclass for representing a row from the 'fordefsubobj' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefsubobj extends BaseFordefsubobj
{
	public function getDesequ()
	{
		$c = new Criteria();
		$c->add(FordefequPeer::CODEQU,self::getCodequ());
		$desequ = FordefequPeer::doSelectone($c);
  		if ($desequ)
	  	  return $desequ->getDesequ();
	    else 
	      return ' ';
    }		
}
