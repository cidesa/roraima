<?php

/**
 * Subclass for performing query and update operations on the 'caartaoc' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CaartaocPeer extends BaseCaartaocPeer
{
	
	const COLUMNS = 'columns';
	
		private static $columsname = array (
		self::COLUMNS => array (CaartaocPeer::AJUOC => 'Número', CaartaocPeer::CODART => 'Orden de Compra', CaartaocPeer::CODCAT => 'Codcat', CaartaocPeer::CANORD => 'Cantidad Ordenada', CaartaocPeer::CANAJU => 'Cantidad Ajustada', CaartaocPeer::MONTOT => 'Monto Total', CaartaocPeer::MONRGO => 'Monrgo', CaartaocPeer::MONAJU => 'Monaju', CaartaocPeer::MONREC => 'Monrec', CaartaocPeer::ID =>  'Id', ),
	);
	
	
	
	public static function getPagerByAjuoc($ajuoc)
	{
		$pager = new sfPropelPager('Caartaoc', 6);
	    $c = new Criteria();
	    $c->add(self::AJUOC,$ajuoc);
//	    $c->addJoin()
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
