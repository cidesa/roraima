<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'carecaud'.
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
class CarecaudPeer extends BaseCarecaudPeer
{
	public static function getDesrec($cod)
    {
  	  return Herramientas::getX_vacio('codrec','carecaud','desrec',str_pad($cod,10,'0',STR_PAD_LEFT));
    }
}
