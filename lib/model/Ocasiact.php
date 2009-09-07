<?php

/**
 * Subclass for representing a row from the 'ocasiact'.
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
class Ocasiact extends BaseOcasiact
{
	public function getDestipact()
	{
		return Herramientas::getX('codtipact','octipact','destipact',self::getCodtipact());
	}
}
