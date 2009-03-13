<?php

/**
 * Subclass for representing a row from the 'fcactcom' table.
 *
 *
 *
 * @package lib.model
 */
class Fcactcom extends BaseFcactcom
{
	public function getFormatopre()
    {
    	$valor= (Herramientas::getX('codemp','Fcdefins','foract',"001"));
    	return $valor;
    }
}
