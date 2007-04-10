<?php

/**
 * Subclass for performing query and update operations on the 'cimovaju' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CimovajuPeer extends BaseCimovajuPeer
{
	const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (CimovajuPeer::CODPRE => 'Código Presupuestario', CimovajuPeer::MONAJU => 'Monto Ajuste', CimovajuPeer::ID =>  'Id', ),);
	
	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}
	
	
	static public function getPagerByRefaju($refaju,$pagina)
	{
		$c = new Criteria();
	    $c->add(CimovajuPeer::REFAJU, $refaju);
	    $pager = new sfPropelPager('Cimovaju', 10);
	    $pager->setCriteria($c);
	    $pager->setPage($pagina);
	    $pager->init();
	    return $pager; 
	}
	
}
