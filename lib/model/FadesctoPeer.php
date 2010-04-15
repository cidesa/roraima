<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fadescto'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: FadesctoPeer.php 33699 2009-10-01 22:15:36Z dmartinez $
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
