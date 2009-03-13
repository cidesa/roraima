<?php

/**
 * Subclass for performing query and update operations on the 'bnubica' table.
 *
 *
 *
 * @package lib.model
 */
class BnubicaPeer extends BaseBnubicaPeer
{
  const COLUMNS = 'columns';

  public static $columsname = array (
  self::COLUMNS => array (BnubicaPeer::CODUBI => 'Código', BnubicaPeer::DESUBI => 'Descripción', ),);


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

  public static function getDesubi($codubi)
  {
    return Herramientas::getX('CODUBI','Bnubica','Desubi',$codubi);
  }

  public static function getDato($codigo, $nomdat)
  {
     return Herramientas::getX('CODUBI','Bnubica',$nomdat,$codigo);
  }
}
