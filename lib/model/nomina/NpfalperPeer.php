<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npfalper'.
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
class NpfalperPeer extends BaseNpfalperPeer
{
	
	const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (NpfalperPeer::CODEMP => 'Código Empleado', NpfalperPeer::CODMOT => 'Codigo Motivo', NpfalperPeer::FECDES => 'Fecha Desde', NpfalperPeer::FECHAS => 'Fecha Hasta', NpmotfalPeer::DESMOTFAL => 'Descripción Falta', NpfalperPeer::ID =>  'Id', ),);
	
	public static function getPagerByCodemp($codemp,$pagina = 1)
	{
		$c = new Criteria();
		$c->add(NpfalperPeer::CODEMP,$codemp);
		$pager = new sfPropelPager('Npfalper', 5);
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
