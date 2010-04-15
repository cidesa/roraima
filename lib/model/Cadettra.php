<?php

/**
 * Subclass for representing a row from the 'cadettra'.
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
class Cadettra extends BaseCadettra
{
	public function getDesart()
	{
		return Herramientas::getX('CODART','CAREGART','DESART',self::getCodart());
	}
	public function getUnimed()
	{
		return Herramientas::getX('CODART','CAREGART','UNIMED',self::getCodart());
	}

}
