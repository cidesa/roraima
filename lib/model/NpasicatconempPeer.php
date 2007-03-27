<?php

/**
 * Subclass for performing query and update operations on the 'npasicatconemp' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpasicatconempPeer extends BaseNpasicatconempPeer
{
	
	const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (NpasicatconempPeer::CODEMP => 'Cedula', NpasicatconempPeer::CODCAR => 'Código Cargo', NpasicatconempPeer::CODNOM => 'Código Nómina', NpasicatconempPeer::CODCAT => 'Código Categoría', NpasicatconempPeer::ID =>  'Id', ),);
	
	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}
	
	
	public static function getPagerByCodcon($codcon,$pagina)
	{
		$c = new Criteria();
	    $c->add(NpasicatconempPeer::CODCON, $codcon);
	    $pager = new sfPropelPager('Npasicatconemp', 10);
	    $pager->setCriteria($c);
	    $pager->setPage($pagina);
	    $pager->init();
	    return $pager; 
	}
	
}
