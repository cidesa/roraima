<?php

/**
 * Subclass for performing query and update operations on the 'ccgarsol' table.
 *
 *
 *
 * @package lib.model
 */
class CcgarsolPeer extends BaseCcgarsolPeer
{
	public static function buscarPorSolicitud($codigo,$num){
		$c = new Criteria();
		$c->add(CcgarsolPeer::CCSOLICI_ID,$codigo);
		$c->add(CcgarsolPeer::NUMGAR,$num);
		$per = CcgarsolPeer::doSelectOne($c);
		return $per;
	}

}
