<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'octipret'.
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
class OctipretPeer extends BaseOctipretPeer
{
	public static function getDesret($cod)
    {
  	  return Herramientas::getX('codtip','octipret','destip',$cod);
    }

	public static function getDesret_vacio($cod)
    {
  	  return Herramientas::getX_vacio('codtip','octipret','destip',$cod);
    }
}
