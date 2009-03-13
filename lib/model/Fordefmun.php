<?php

/**
 * Subclass for representing a row from the 'fordefmun' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefmun extends BaseFordefmun
{

	public function getDesest()
	{
		return Herramientas::getX('codest','fordefest','desest',self::getCodest());
    }
}
