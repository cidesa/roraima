<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'caartaoc'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
