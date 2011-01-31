<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'forencpryaccespmet'.
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
class ForencpryaccespmetPeer extends BaseForencpryaccespmetPeer
{
	public function getNompro()
	{
	  return Herramientas::getX('codpro','Fordefpry','nompro',self::getCodpro());
	}	
}
