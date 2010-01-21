<?php

/**
 * Subclass for performing query and update operations on the 'ccparpro' table.
 *
 *
 *
 * @package lib.model
 */
class CcparproPeer extends BaseCcparproPeer
{

	public static function buscarParPro($id1,$id2){
		$c = new Criteria();
		$c->add(CcparproPeer::CCPROGRA_ID,$id1);
		$c->add(CcparproPeer::CCPARTID_ID,$id2);
		$per = CcparproPeer::doSelect($c);
		return $per;
	}

}
