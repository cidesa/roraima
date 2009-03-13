<?php

/**
 * Subclass for performing query and update operations on the 'npconfon' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpconfonPeer extends BaseNpconfonPeer
{
  const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (NpconfonPeer::CODCON => 'Codigo', NpconfonPeer::ID =>  'Id', ),);
	
	public static function getPagerByCriteria($c,$pagina = 1)
	{
		$pager = new sfPropelPager('Npconfon', 10);
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
