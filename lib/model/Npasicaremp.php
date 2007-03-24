<?php

/**
 * Subclass for representing a row from the 'npasicaremp' table.
 *
 *
 *
 * @package lib.model
 */
class Npasicaremp extends BaseNpasicaremp
{
	public function getcodcon()
	{
		$c = new Criteria();
		$c->add(NpasiconempPeer::CODEMP,self::getCodemp());
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$codigo = NpasiconempPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getcodcon();
  		}else{
	      return ' ';
  		}
    }	  	
}
