<?php

/**
 * Subclass for performing query and update operations on the 'npvacregsal' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpvacregsalPeer extends BaseNpvacregsalPeer
{
	
	const COLUMNS = 'columns';
	
	private static $columsname = array (
	self::COLUMNS => array (NpvacregsalPeer::STAVAC => 'Estado', NpvacregsalPeer::PERFIN => 'Período Final', NpvacregsalPeer::PERINI => 'Período Inicial', NpvacregsalPeer::FECHASALIDA => 'Fecha Salida', NpvacregsalPeer::FECHAENTRADA => 'Fecha Entrada', NpvacregsalPeer::DIASBONO => 'Días Bono Vacacional', NpvacregsalPeer::DIADIS => 'Días Disfrutados', NpvacregsalPeer::CODNOM => 'Código Nómina', NpvacregsalPeer::CODEMP => 'Código Empleado', NpvacregsalPeer::CODCAR => 'Código Cargo', NpvacregsalPeer::NOMEMP => 'Nombre', NpvacregsalPeer::ID =>  'Id', ),);
	
	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}
	
}
