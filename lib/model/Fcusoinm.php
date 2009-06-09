<?php

/**
 * Subclass for representing a row from the 'fcusoinm' table.
 *
 *
 *
 * @package lib.model
 */
class Fcusoinm extends BaseFcusoinm
{
	public function getDescripcionuso()
	{
		return Herramientas::getX('codusoinm','Fcusoinm','nomusoinm',self::getCodusoinm());
	}

	public function getCoduso()
	{
		return self::getCodusoinm();
	}
}
