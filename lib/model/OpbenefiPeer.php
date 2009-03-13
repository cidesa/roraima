<?php

/**
 * Subclass for performing query and update operations on the 'opbenefi' table.
 *
 *
 *
 * @package lib.model
 */
class OpbenefiPeer extends BaseOpbenefiPeer
{
  const COLUMNS = 'columns';

  public static $columsname = array (
  self::COLUMNS => array (OpbenefiPeer::CEDRIF => 'C.I/RIF', OpbenefiPeer::NOMBEN => 'Beneficiario'),);


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

  public static function getCedula($codigo)
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Nomben',$codigo);
  }

  public static function getDato($referencia, $nomdat)
  {
     return Herramientas::getX('CEDRIF','Opbenefi',$nomdat,$referencia);
  }

  public static function getDato2($referencia, $nomdat)
  {
     return Herramientas::getX('CODCTA','Contabb',$nomdat,$referencia);
  }

}
