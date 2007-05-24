<?php

/**
 * Subclass for performing query and update operations on the 'bnubibie' table.
 *
 *
 *
 * @package lib.model
 */
class BnubibiePeer extends BaseBnubibiePeer
{
	public static function getDesUbi($codubi)
	{
		$c = new Criteria();
		$c->add(self::CODUBI,rtrim($codubi).' %',Criteria::LIKE);
		return self::doSelect($c);

	}

	public static function getDesubicacion($codubi)
	{
    	return Herramientas::getX('CODUBI','Bnubibie','Desubi',trim($codubi));		
	}

	public static  function getNomubicac($codubi)
	{
		$c = new Criteria();
		$c->add(self::CODUBI,str_pad($codubi, 30 , ' '));
		$des = self::doSelectone($c);
		if ($des){
			return $des->getDesubi();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (BnubibiePeer::CODUBI => 'Código', BnubibiePeer::DESUBI => 'Descripción', ),);


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
	
}
