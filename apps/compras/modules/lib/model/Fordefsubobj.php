<?php

/**
 * Subclass for representing a row from the 'fordefsubobj'.
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
class Fordefsubobj extends BaseFordefsubobj
{



	public function getDesequ()
	{
		return Herramientas::getX('codequ','fordefequ','desequ',self::getCodequ());
    }	

    
}