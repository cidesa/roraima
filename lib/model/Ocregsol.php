<?php

/**
 * Subclass for representing a row from the 'ocregsol' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocregsol extends BaseOcregsol
{
	public function getNomste()
	{
		$c = new Criteria();
		$c->add(OcdatstePeer::CEDSTE,self::getCedste());
		$registro = OcdatstePeer::doSelectOne($c);
		if($registro) 
                         return $registro->getNomste();
		else 
                         return null; 
		
	}
	public function getDessol()
	{
		$c = new Criteria();
		$c->add(OctipsolPeer::CODSOL,self::getCodsol());
		$registro = OctipsolPeer::doSelectOne($c);
		if($registro) 
                         return $registro->getDessol();
		else 
                         return null; 
		
	}
	public function getDesorg()
	{
		$c = new Criteria();
		$c->add(OcdeforgPeer::CODORG,self::getCodorg());
		$registro = OcdeforgPeer::doSelectOne($c);
		if($registro) 
                         return $registro->getDesorg();
		else 
                         return null; 
		
	}	
		
	public function getNomemp()
	{
		$c = new Criteria();
		$c->add(NphojintPeer::CODEMP,self::getCodemp());
		$registro = NphojintPeer::doSelectOne($c);
		if($registro) 
                         return $registro->getNomemp();
		else 
                         return null; 
		
	}		
				
}
