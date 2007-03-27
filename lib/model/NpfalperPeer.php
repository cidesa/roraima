<?php

/**
 * Subclass for performing query and update operations on the 'npfalper' table.
 *
 * 
 *
 * @package lib.model
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
