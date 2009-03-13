<?php

/**
 * Subclass for representing a row from the 'fordefsubobj' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefsubobj extends BaseFordefsubobj
{



	public function getDesequ()
	{
		return Herramientas::getX('codequ','fordefequ','desequ',self::getCodequ());
    }	

    
}