<?php

/**
 * Subclass for performing query and update operations on the 'optipben' table.
 *
 *
 *
 * @package lib.model
 */
class OptipbenPeer extends BaseOptipbenPeer
{
  const COLUMNS = 'columns';

  public static $columsname = array (
  self::COLUMNS => array (OptipbenPeer::CODTIPBEN => 'Código', OptipbenPeer::DESTIPBEN => 'Descripción', OptipbenPeer::ID => 'Id'),);


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

  public static function getDestipben($cod)
  {
      return Herramientas::getX('CODTIPBEN','Optipben','destipben',str_pad($cod,3,'0',STR_PAD_LEFT));
  }
}
