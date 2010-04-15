<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'bndisbie'.
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
class BndisbiePeer extends BaseBndisbiePeer
{
	public static function getDesdis_descripcion($codigo)
	{
    	return Herramientas::getX('coddis','Bndisbie','desdis',trim($codigo));
	}


}
