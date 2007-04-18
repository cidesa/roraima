<?php

/**
 * Subclass for performing query and update operations on the 'caramart' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CaramartPeer extends BaseCaramartPeer
{
	public static function getDesramo($codram)
	{
		$c = new Criteria();
		$c->add(CaramartPeer::RAMART,str_pad($codram, 6 , '0','STR_PAD_LEFT'));
		$des = CaramartPeer::doSelectone($c);
		if ($des){
			return $des->getNomram();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
}
