<?php

/**
 * Subclass for representing a row from the 'bnsegmue' table.
 *
 *
 *
 * @package lib.model
 */
class Bnsegmue extends BaseBnsegmue
{
	public function getDesmue()
	{
		$c = new Criteria();
		$c->add(BnregmuePeer::CODACT,self::getCodact());
		$c->add(BnregmuePeer::CODMUE,self::getCodmue());
		$registro = BnregmuePeer::doSelectOne($c);
		if($registro)
		return $registro->getDesmue();
		else 
                         return null; 
		
	}	
}
