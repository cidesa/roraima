<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'catipempsnc'.
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
class CatipempsncPeer extends BaseCatipempsncPeer
{
	public static function getDestip($codtip)
	{
    	return Herramientas::getX('CODTIP','Catipempsnc','Destip',str_pad($codtip,4,'0',STR_PAD_LEFT));
	}
}
