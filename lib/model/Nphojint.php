<?php

/**
 * Subclass for representing a row from the 'nphojint' table.
 *
 *
 *
 * @package lib.model
 */
class Nphojint extends BaseNphojint
{
	public function getfeccal()
	{
		$c = new Criteria();
		$c->add(NpasiempcontPeer::CODEMP,self::getCodemp());		
		$feccal = NpasiempcontPeer::doSelectone($c);
		if ($feccal){
			return $feccal->getfeccal();
		}else{
			return ' ';
		}
	}

	public function getcodnom()
	{
		$c = new Criteria();
		$c->add(NpasiempcontPeer::CODEMP,self::getCodemp());		
		$codnom = NpasiempcontPeer::doSelectone($c);
		if ($codnom){
			return $codnom->getcodnom();
		}else{
			return ' ';
		}
	}	
}
