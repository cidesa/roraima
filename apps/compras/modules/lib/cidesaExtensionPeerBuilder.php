<?php

require_once 'addon/propel/builder/SfExtensionPeerBuilder.php';

/**
 * cidesaExtensionPeerBuilder: modificacion de la clase SfExtensionPeerBuilder
 * para modificar el encabezado generado en las clases de propel
 * colocandole la información de referencia de documentación.
 *
 * @package    Roraima
 * @subpackage lib
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cidesaExtensionPeerBuilder extends SfExtensionPeerBuilder
{
  
  /**
   * Adds class phpdoc comment and openning of class.
   * @param string &$script The script will be modified in this method.
   */
  protected function addClassOpen(&$script)
  {
    $table = $this->getTable();
    $tableName = $table->getName();
    $tableDesc = $table->getDescription();

    $baseClassname = $this->getPeerBuilder()->getClassname();

    $script .= "
/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla '$tableName'.
 *
 * $tableDesc
 *
 * @package    Roraima
 * @subpackage ".$this->getPackage()."
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class ".$this->getClassname()." extends $baseClassname
{";
  }  
  
}

?>
