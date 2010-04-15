<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npasicatconemp'.
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
