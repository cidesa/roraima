<?php

/**
 * Subclass for performing query and update operations on the 'caregart' table.
 *
 *
 *
 * @package lib.model
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
