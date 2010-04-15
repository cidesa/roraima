<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'caartreq'.
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
