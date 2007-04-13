<?php

/**
 * Subclass for representing a row from the 'ciasiini' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ciasiini extends BaseCiasiini
{
	public function getNompre()
	{
		// Se obtiene Nomnom de la tabla Npasicaremp
		
		$c = new Criteria();
		$c->add(CideftitPeer::CODPRE,str_pad(self::getCodpre(),32,' '));
		$registro = CideftitPeer::doSelectOne($c);
		if($registro) return $registro->getNompre();
		else return null; 
	}
}
