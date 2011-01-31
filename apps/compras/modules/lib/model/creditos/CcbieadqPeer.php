<?php

/**
 * Subclass for performing query and update operations on the 'ccbieadq' table.
 *
 *
 *
 * @package lib.model
 */
class CcbieadqPeer extends BaseCcbieadqPeer
{
		public static function buscarPorSolicitud($codigo,$num){
		$c = new Criteria();
		$c->add(CcbieadqPeer::CCSOLICI_ID,$codigo);
		$c->add(CcbieadqPeer::NUMBIE,$num);
		$per = CcbieadqPeer::doSelectOne($c);
		return $per;
	}

}
