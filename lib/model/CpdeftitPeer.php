<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cpdeftit'.
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
class CpdeftitPeer extends BaseCpdeftitPeer
{
    const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CpdeftitPeer::CODPRE => 'Código', CpdeftitPeer::NOMPRE => 'Descripción', CpdeftitPeer::ID => 'Id'),);
	
	
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
	
 public static function getDestit($des)
  {
  	 $c = new Criteria();
  	 $dato= CadefartPeer::doSelectOne($c);
  	 
  	 if ($dato->getAsiparrec()=='P')
  	 {  
  	 	$result=array();  	 	
        $sql = "SELECT a.codpre as codpre, a.nompre as nompre FROM cpdeftit a,cpdefniv b where (a.codpre ='".($des)."') AND ((length(Rtrim('a.codpre')))=(length(Rtrim('b.forpre'))))";
		if (Herramientas::BuscarDatos($sql,&$result))
		{
			return $nombre = $result[0]['nompre'];			
  	    }
  	 }
     else
  	 {
  	 	return Herramientas::getX('CODPAR','Nppartidas','Nompar',$des);
  	 }
  }
 
  public static function getNompre($codpre)
  {
  	 	return Herramientas::getX('CODPRE','Cpdeftit','Nompre',$codpre);
  }
  
}
