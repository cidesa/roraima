<?php

/**
 * Subclass for representing a row from the 'careqartser' table.
 *
 *
 *
 * @package lib.model
 */
class Careqartser extends BaseCareqartser
{
	public function getDesubi()
	{
		return  Herramientas::getX('codubi','bnubibie','desubi',self::getCodcatreq());
	}
}
