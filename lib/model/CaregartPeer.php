<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'caregart'.
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
class CaregartPeer extends BaseCaregartPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CaregartPeer::CODART => 'Código', CaregartPeer::DESART => 'Descripción', CaregartPeer::UNIMED => 'Unidad de Medida', CaregartPeer::COSPRO => 'Costo',CaregartPeer::EXITOT => 'Existencia',CaregartPeer::CODPAR => 'Codigo Partida', ),);


	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getColumsNames()
	{
		return self::$columsname[self::COLUMNS];
	}


	static public function getArrayFieldsNames()
	{
		$col = self::$columsname[self::COLUMNS];
		$columnas = array();
		foreach($col as $key => $value)
		{
			$punto = strpos($key,'.');
			$tabla = substr($key,0,$punto);
			$campo = substr($key,$punto+1);
			$columnas[] = ucfirst(strtolower($campo));

		}
		return $columnas;
	}

	public static function getDescripcion_art($codigo)
	{
    	return htmlspecialchars(Herramientas::getX('CODART','Caregart','DESART',$codigo));
	}

	public static function getDesart($codigo)
	{
		return htmlspecialchars(Herramientas::getX('CODART','Caregart','Desart',$codigo));
	}

   public static function getDato($codigo, $nomdat)
   {
   	return Herramientas::getX('CODART','Caregart',$nomdat,$codigo);
   }
}
