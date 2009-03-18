<?php 
/**
 * This file is part of the cidesa symfony package.
 * (c) 2009 CIDESA <correo cidesa>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * cidesaTools stores all configuration information for a cidesa application.
 *
 * @package    cidesa
 * @subpackage cidesaTools
 * @author     Cidesa <correo cidesa>
 * @version    SVN: $Id: cidesaTools.class.php 
 */

 class cidesaTools
 {
 	public static
    $config = array();

	 /**
   * Retrieves a config parameter.
   *
   * @param string A ruta o directorio 
   * @param mixed  A valor por defecto a devolver en caso que no exista el directorio o el archivo
   *
   * @return default en caso de no existir el directorio o el archivo, de lo contrario devuelve true
   */
  public static function exitsfile($name)
  {
  	return file_exists($name) ? true : false;
  }

 }
