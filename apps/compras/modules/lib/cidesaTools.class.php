<?php 
/**
 * cidesaTools: Clase estática con funcionalidades varias
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
