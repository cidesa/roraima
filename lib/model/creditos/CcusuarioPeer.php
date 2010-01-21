<?php

/**
 * Subclass for performing query and update operations on the 'ccusuario' table.
 *
 *
 *
 * @package lib.model
 */
class CcusuarioPeer extends BaseCcusuarioPeer
{
	public static function getUsuariobyCedula($cedula)
	{
		$c = new Criteria();
	    $c->add(CcUsuarioPeer::CEDUSU,$cedula);
	    $analista = CcUsuarioPeer::doSelectOne($c);
		return $analista;
	}
}
