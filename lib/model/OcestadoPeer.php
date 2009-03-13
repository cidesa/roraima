<?php

/**
 * Subclass for performing query and update operations on the 'ocestado' table.
 *
 *
 *
 * @package lib.model
 */
class OcestadoPeer extends BaseOcestadoPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (OcestadoPeer::CODEDO => 'Código', OcestadoPeer::NOMEDO => 'Descripción Estado', ),);


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

	public static function getEstados()
  {
  	$c= new Criteria();
  	$c->add(OcestadoPeer::CODPAI,'0001');
    $e = OcestadoPeer::doSelect($c);
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodedo()] = $esta->getNomedo();
      }
      return $resp;
    }else return array();
  }
}
