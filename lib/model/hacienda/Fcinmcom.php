<?php

/**
 * Subclass for representing a row from the 'fcinmcom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcinmcom.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcinmcom extends BaseFcinmcom
{
	public function getDescom()
	{
		return Herramientas::getX('codcom','Fccominm','descom',self::getCodcom());
	}
}
