<?php

/**
 * Subclass for representing a row from the 'casolraz'.
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
class Casolraz extends BaseCasolraz
{
   public function getDesrazcom()
	{
		return Herramientas::getX('CODRAZCOM','Carazcom','Desrazcom',self::getCodrazcom());
	}
}
