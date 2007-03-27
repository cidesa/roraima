<?php

/**
 * Subclass for representing a row from the 'npasiconnom' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npasiconnom extends BaseNpasiconnom
{

	
	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodcon());
		$reg = NpdefcptPeer::doSelectOne($c);
		if($reg) return $reg->getNomcon();
		else return null;
	}
}
