<?php

/**
 * Subclass for performing query and update operations on the 'ocpais' table.
 *
 *
 *
 * @package lib.model
 */
class OcpaisPeer extends BaseOcpaisPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (OcpaisPeer::CODPAI => 'Código', OcpaisPeer::NOMPAI => 'Descripción País', ),);


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
    $e = OcpaisPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodpai()] = $esta->getNompai();
      }
      return $resp;
    }else return array();
  }
}
