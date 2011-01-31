<?php

/**
 * Subclase para representar una fila de la tabla 'caclagru'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caclagru extends BaseCaclagru
{
       	public function getDescla()
	{
	  return Herramientas::getX('CODCLA','Cadefcla','Descla',self::getCodcla());
	}
}
