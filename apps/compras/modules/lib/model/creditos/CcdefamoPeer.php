<?php

/**
 * Subclass for performing query and update operations on the 'ccdefamo' table.
 *
 *
 *
 * @package lib.model
 */
class CcdefamoPeer extends BaseCcdefamoPeer
{

	public static function buscarProParCre($id1,$id2,$id3){
		$c = new Criteria();
		$c->add(CcdefamoPeer::CCPROGRA_ID,$id1);
		$c->add(CcdefamoPeer::CCPARTID_ID,$id2);
		$c->add(CcdefamoPeer::CCCREDIT_ID,$id3);
		$per = CcdefamoPeer::doSelect($c);
		return $per;
	}

	public static function BuscarDefAmorProParTas($id1,$id2,$tas){
		$c = new Criteria();
		$c->add(CcdefamoPeer::CCPROGRA_ID,$id1);
		$c->add(CcdefamoPeer::CCPARTID_ID,$id2);
		$c->add(CcdefamoPeer::TASINT,$tas,Criteria::GREATER_THAN);
		$c->add(CcdefamoPeer::FECHASDEF,null,Criteria::EQUAL);
		$per = CcdefamoPeer::doSelect($c);
		return $per;
	}
}
