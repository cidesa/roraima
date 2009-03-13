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
	const COLUMNS = 'columns';
	
	
		private static $columsname = array (
		self::COLUMNS => array (CaartreqPeer::REQART => 'Número Requesición', CaartreqPeer::CODART => 'Código del Artículo', CaartreqPeer::CODCAT => 'Codcat', CaartreqPeer::CANREQ => 'Cantidad Requerida', CaartreqPeer::CANREC => 'Cantidad Recibida', CaartreqPeer::MONTOT => 'Monto Total', CaartreqPeer::UNIMED => 'Unidad Medición', CaartreqPeer::RELART => 'Relart',CaartreqPeer::ID =>  'Id', ),
	);
	
	
	
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
	
	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}
	
}
