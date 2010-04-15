<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fordefpry'.
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
class FordefpryPeer extends BaseFordefpryPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (FordefpryPeer::CODPRO => 'Código', FordefpryPeer::NOMPRO => 'Nombre', FordefpryPeer::PROACC => 'Tipo', FordefpryPeer::ID => 'Id'),);


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

  public static function getTipo($codigo)
  {
    if(Herramientas::getX('CODPRO','Fordefpry','Proacc',$codigo)=='P')
    {
    	return 'Proyecto';
    }
    elseif(Herramientas::getX('CODPRO','Fordefpry','Proacc',$codigo)=='A')
    {
    	return 'Accion Centralizada';
    }
    else
    {
	    return '<!Registro no Encontrado o Vacio!>';
    }
  }

  public static function getNombre($codigo1)
  {
  	return Herramientas::getX('CODPRO','Fordefpry','Nompro',$codigo1);
  }

}
