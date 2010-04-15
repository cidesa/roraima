<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'octipact'.
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
class OctipactPeer extends BaseOctipactPeer
{
	public static function getDestipact($cod)
    {
  	  return Herramientas::getX_vacio('codtipact','octipact','destipact',str_pad($cod,4,'0',STR_PAD_LEFT));
    }
}
