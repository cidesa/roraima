<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fordefobjestnvaeta'.
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
class FordefobjestnvaetaPeer extends BaseFordefobjestnvaetaPeer
{
  public static function getObjnvaeta($codigo1)
  {
  	return Herramientas::getX('CODOBJNVAETA','Fordefobjestnvaeta','Desobjnvaeta',$codigo1);
  }
}
