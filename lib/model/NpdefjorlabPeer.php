<?php

/**
 * Subclass for performing query and update operations on the 'npdefjorlab' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpdefjorlabPeer extends BaseNpdefjorlabPeer
{
	
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (NpdefjorlabPeer::IDEJOR => 'Jornada', NpdefjorlabPeer::CODNOM => 'Nomina', ),);
	
	
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
	
public static function getLunes($idejor,$nomina)
  {
  	$sql="select lunes from npdefjorlab where codnom='".$nomina."'
               and idejor='".$idejor."' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {	  
	     	if ($result[0]["lunes"]=='')
	     	{
	     		return false;     		
	     	}
	     	else {return true;}
	     }
	     else return false;
  }
  

public static function getMartes($idejor,$nomina)
  {
  	$sql="select martes from npdefjorlab where codnom='".$nomina."'
               and idejor='".$idejor."' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {	  
	     	if ($result[0]["martes"]=='')
	     	{
	     		return false;     		
	     	}
	     	else {return true;}
	     }
	     else return false;
  }
  
public static function getMiercoles($idejor,$nomina)
  {
  	$sql="select miercoles from npdefjorlab where codnom='".$nomina."'
               and idejor='".$idejor."' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {	  
	     	if ($result[0]["miercoles"]=='')
	     	{
	     		return false;     		
	     	}
	     	else {return true;}
	     }
	     else return false;
  }
  
public static function getJueves($idejor,$nomina)
  {
  	$sql="select jueves from npdefjorlab where codnom='".$nomina."'
               and idejor='".$idejor."' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {	  
	     	if ($result[0]["jueves"]=='')
	     	{
	     		return false;     		
	     	}
	     	else {return true;}
	     }
	     else return false;
  }
  
public static function getViernes($idejor,$nomina)
  {
  	$sql="select viernes from npdefjorlab where codnom='".$nomina."'
               and idejor='".$idejor."' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {	  
	     	if ($result[0]["viernes"]=='')
	     	{
	     		return false;     		
	     	}
	     	else {return true;}
	     }
	     else return false;
  }
  
public static function getSabado($idejor,$nomina)
  {
  	$sql="select sabado from npdefjorlab where codnom='".$nomina."'
               and idejor='".$idejor."' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {	  
	     	if ($result[0]["sabado"]=='')
	     	{
	     		return false;     		
	     	}
	     	else {return true;}
	     }
	     else return false;
  }
  
public static function getDomingo($idejor,$nomina)
  {
  	$sql="select domingo from npdefjorlab where codnom='".$nomina."'
               and idejor='".$idejor."' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {	  
	     	if ($result[0]["domingo"]=='')
	     	{
	     		return false;     		
	     	}
	     	else {return true;}
	     }
	     else return false;
  }
	
}
