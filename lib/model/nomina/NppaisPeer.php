<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'nppais'.
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
class NppaisPeer extends BaseNppaisPeer
{
const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (NppaisPeer::CODPAI => 'Código', NppaisPeer::NOMPAI => 'Descripción'),);
	
	
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
	
	
	
public static function getEstado()
  {
    $c = new Criteria();
    $lista_ban = NppaisPeer::doSelect($c);
    
    return $lista_ban;
  }	
  
public static function getNompai($estado)
  {
	        
	return Herramientas::getX('Codpai','Nppais','Nompai',str_pad($estado,4,'0',STR_PAD_LEFT));	  		
			/*$c = new Criteria();
			$c->add(NppaisPeer::ID,strtoupper($estado));						
			$objNppais = NppaisPeer::doSelectOne($c);

			if ($objNppais)
			{
 			   return $objNppais->getNompai(true);
			}
			else
			{
				return 'VACIO';
			}*/
  }
  
  

}
