<?php

/**
 * Subclass for representing a row from the 'occiudad' table.
 *
 *
 *
 * @package lib.model
 */
class Occiudad extends BaseOcciudad
{
	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}
	public function getNomedo()
	{
		return Herramientas::getX('codedo','ocestado','nomedo',self::getCodedo());
	}
}
