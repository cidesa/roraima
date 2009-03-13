<?php

/**
 * Subclass for performing query and update operations on the 'cpasiini' table.
 *
 *
 *
 * @package lib.model
 */
class CpasiiniPeer extends BaseCpasiiniPeer
{

	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CpasiiniPeer::CODPRE => 'Código', CpasiiniPeer::NOMPRE => 'Nombre'),);


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


	public static function getNompre($codpre)
	{
    	return Herramientas::getX('CODPRE','Cpasiini','Nompre',$codpre);
	}

	public static function getExiste_pre($codigo)
	{
	    return Herramientas::getX_vacio('Codpre','Cpasiini','Codpre',trim($codigo));
	    /*$c = new Criteria();
	    $c->add(CpasiiniPeer::CODPRE,trim($codigo));
    	$codigo_pre= CpasiiniPeer::doSelectOne($c);
    	if ($codigo_pre)
    	{
      		return $codigo_pre->getCodpre();
    	}
    	else
    	{
    		return '';
    	}*/
	}
}
