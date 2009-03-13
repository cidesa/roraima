<?php

/**
 * Subclass for representing a row from the 'fcusoveh' table.
 *
 *
 *
 * @package lib.model
 */
class Fcusoveh extends BaseFcusoveh
{
	public function getFormatopre()
    {
    	return Herramientas::getX_vacio('codemp','fcdefins','forveh','001');
    }
}
