<?php

require_once 'addon/propel/builder/SfExtensionObjectBuilder.php';

/**
 * cidesaExtensionObjectBuilder: modificacion de la clase SfExtensionPeerBuilder
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
class cidesaExtensionObjectBuilder extends SfExtensionObjectBuilder
{
  protected function addClassOpen(&$script)
  {
    $table = $this->getTable();
    $tableName = $table->getName();
    $tableDesc = $table->getDescription();

    $baseClassname = $this->getObjectBuilder()->getClassname();

    $script .= "
/**
 * Subclase para representar una fila de la tabla '$tableName'.
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
