<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cpasiini'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:CpasiiniPeer.php 35042 2009-11-26 01:33:34Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
