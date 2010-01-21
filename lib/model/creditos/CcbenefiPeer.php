<?php

/**
 * Subclass for performing query and update operations on the 'ccbenefi' table.
 *
 *
 *
 * @package lib.model
 */
class CcbenefiPeer extends BaseCcbenefiPeer
{
	public static function buscarPorCedRif($cedula){
		$c = new Criteria();
        $c->add(CcbenefiPeer::CEDRIF,$cedula);
        $benefi = CcbenefiPeer::doSelectOne($c);

		return $benefi;
	}


}
