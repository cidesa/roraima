<?php

/**
 * Subclass for performing query and update operations on the 'ccanalis' table.
 *
 *
 *
 * @package lib.model
 */
class CcanalisPeer extends BaseCcanalisPeer
{
	public static function getAnalistabyCedula($cedula)
	{
		$c = new Criteria();
	    $c->add(CcanalisPeer::CEDANA,$cedula);
	    $analista = CcanalisPeer::doSelectOne($c);
		return $analista;
	}
}
