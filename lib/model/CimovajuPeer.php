<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cimovaju'.
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
