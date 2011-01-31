<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'bnregmue'.
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
class BnregmuePeer extends BaseBnregmuePeer
{
  const COLUMNS = 'columns';

  public static $columsname = array (
  self::COLUMNS => array (BnregmuePeer::CODACT => 'Código Activo', BnregmuePeer::CODMUE => 'Cod. Activo', BnregmuePeer::DESMUE => 'Descripcion'),);


  public static function getDesmue($codigo1,$codigo2)
  {
    return Herramientas::getXx('Bnregmue',array('CODMUE','CODACT'),array($codigo1,$codigo2),'Desmue');
  }

  public static function getDesmue1($codigo1)
  {
    return Herramientas::getX('CODMUE','Bnregmue','Desmue',$codigo1);
  }

  public static function getDescob($codigo1)
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',$codigo1);
  }

  public static function getCodmue($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnregmue','Codmue',$codigo);
  }

   public static function getCodact($codigo)
  {
    return Herramientas::getX_vacio('CODMUE','Bnregmue','Codact',$codigo);
  }


  public static function getDesmuedos($codact)
  {
  return Herramientas::getX_vacio('CODACT','Bnregmue','desmue',$codact);
  }


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

}
