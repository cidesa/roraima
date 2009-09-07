<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npasiconnom'.
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
