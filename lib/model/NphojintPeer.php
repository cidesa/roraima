<?php

/**
 * Subclass for performing query and update operations on the 'nphojint' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NphojintPeer extends BaseNphojintPeer
{
	
	const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (NphojintPeer::CEDEMP => 'Cedula', NphojintPeer::NOMEMP => 'Nombre', NphojintPeer::ID =>  'Id', ),);
	
	public static function getPagerByCriteria($c,$pagina = 1)
	{
		$pager = new sfPropelPager('Nphojint', 10);
	    $pager->setCriteria($c);
	    $pager->setPage($pagina);
	    $pager->init();
	    return $pager; 
	}
	
	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}
	
}
