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
	protected $grid= array();

	public function getNompre()
	{
		// Se obtiene Nomnom de la tabla Npasicaremp

		$c = new Criteria();
		$c->add(CideftitPeer::CODPRE,self::getCodpre());
		$registro = CideftitPeer::doSelectOne($c);
		if($registro) return $registro->getNompre();
		else return null;
	}
}
