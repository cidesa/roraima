<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fadescto'.
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
class FadesctoPeer extends BaseFadesctoPeer
{
	public static function getDescripcion($coddesc)
	{
    	return Herramientas::getX('CODDESC','Fadescto','desdesc',trim($coddesc));
	}

	public static function getMondesc($coddesc)
	{
    	return Herramientas::getX('CODDESC','Fadescto','mondesc',trim($coddesc));
	}

}
