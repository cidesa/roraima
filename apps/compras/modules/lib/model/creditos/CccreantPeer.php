<?php

/**
 * Subclass for performing query and update operations on the 'cccreant' table.
 *
 *
 *
 * @package lib.model
 */
class CccreantPeer extends BaseCccreantPeer
{

	public static function BuscarPorBenPublico($codigo){
		$c = new Criteria();
		$c->add(CccreantPeer::CCBENEFI_ID,$codigo);
		$c->add(CccreantPeer::TIPENT,'G');
		$creant = CccreantPeer::doSelectOne($c);

		return $creant;

	}

	public static function BuscarPorBenPrivado($codigo){
		$c = new Criteria();
		$c->add(CccreantPeer::CCBENEFI_ID,$codigo);
		$c->add(CccreantPeer::TIPENT,'P');
		$creant = CccreantPeer::doSelectOne($c);

		return $creant;

	}
}
