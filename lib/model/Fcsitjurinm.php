<?php

/**
 * Subclass for representing a row from the 'fcsitjurinm'.
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
class Fcsitjurinm extends BaseFcsitjurinm
{

	public function getDescripcioncodsit()
	{
		return Herramientas::getX('codsitinm','fcsitjurinm','nomsitinm',self::getCodsitinm());
	}

}
