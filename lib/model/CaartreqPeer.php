<?php

/**
 * Subclass for performing query and update operations on the 'caartreq' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CaartreqPeer extends BaseCaartreqPeer
{
	public static function getPagerByReqart($reqart)
	{
		$pager = new sfPropelPager('Caartreq', 6);
	    $c = new Criteria();
	    $c->add(self::REQART,$reqart);
	    $pager->setCriteria($c);
	    $pager->setPage(1);
	    $pager->init();
	    return $pager; 
	}
	
}
