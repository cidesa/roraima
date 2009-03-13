<?php

/**
 * Subclass for representing a row from the 'careqart' table.
 *
 *
 *
 * @package lib.model
 */
class Careqart extends BaseCareqart
{
	protected $obj = array();
	protected $check = '';

	public function getDesubi()
	{
		return  Herramientas::getX('codubi','bnubibie','desubi',self::getCodcatreq());
	}


}
