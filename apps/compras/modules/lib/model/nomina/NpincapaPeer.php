<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npincapa'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class NpincapaPeer extends BaseNpincapaPeer
{
	public static function getDesinc($cod)
    {
  	  return Herramientas::getX_vacio('codinc','npincapa','desinc',str_pad($cod,10,'0',STR_PAD_LEFT));
    }

}
