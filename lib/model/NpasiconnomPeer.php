<?php

/**
 * Subclass for performing query and update operations on the 'npasiconnom' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpasiconnomPeer extends BaseNpasiconnomPeer
{
	
	const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (NpasiconnomPeer::CODCON => 'Código', NpdefcptPeer::NOMCON => 'Descripción', NpasiconnomPeer::FRECON => 'Frecuencia', NpasiconnomPeer::ID =>  'Id', ),);
	
	public static function getPagerByCodnom($codnom, $pagina = 1)
	{
		$c = new Criteria();
		$c->add(NpasiconnomPeer::CODNOM, $codnom);
		$pager = new sfPropelPager('Npasiconnom', 10);
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
