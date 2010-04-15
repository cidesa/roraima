<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npvacregsal'.
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
