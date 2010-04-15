<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'opbenefi'.
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
