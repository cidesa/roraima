<?php

/**
 * Subclass for performing query and update operations on the 'npasiconemp' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpasiconempPeer extends BaseNpasiconempPeer
{
const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (NpasiconempPeer::CODEMP => 'Codigo del Trabajador', NpasiconempPeer::NOMEMP => 'Nombre', NpasiconempPeer::CODCAR => 'Codigo del Cargo', NpasiconempPeer::NOMCAR => 'Descripcion del Cargo', NpasiconempPeer::CANTIDAD => 'Cantidad', NpasiconempPeer::MONTO => 'Monto', NpasiconempPeer::FECINI => 'Fecha de Inicio', NpasiconempPeer::FECEXP => 'Fecha de Expiracion', NpasiconempPeer::FRECON => 'Frecuencia de Pago', NpasiconempPeer::ASIDED => 'Tipo de Operacion', NpasiconempPeer::ACUCON => 'Concepto Acumulativo', NpasiconempPeer::CALCON => 'Concepto Calculable', NpasiconempPeer::ACTIVO => 'Concepto Acumulativo', NpasiconempPeer::ACUMULADO => 'Acumulado', NpasiconempPeer::ID =>  'Id', ),);
	
	public static function getPagerByCriteria($c,$pagina = 1)
	{
		$pager = new sfPropelPager('Npasiconemp', 10);
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
