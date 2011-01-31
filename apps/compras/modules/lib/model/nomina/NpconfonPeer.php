<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npconfon'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
