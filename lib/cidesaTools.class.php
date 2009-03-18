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
   * Verifica existencia de directorios o archivos.
   *
   * @param string A ruta o directorio 
   *
   * @return false en caso de no existir la variable
   */
  public static function exitsfile($name)
  {
  	return file_exists($name) ? true : false;
  }
  
   /**
   * Verifica si una variable esta vacia.
   *
   * @param string A Variable    
   *
   * @return false en caso de no existir la variable
   */
  public static function isempty($var)
  {
  	return empty($var) ? true : false;
  }
  
  /**
   * Verifica si una variable esta definida.
   *
   * @param string A Variable    
   *
   * @return false en caso de no existir la variable
   */
  public static function isisset($var)
  {
  	return isset($var) ? true : false;
  }

 }
