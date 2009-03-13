<?php

/**
 * Subclass for representing a row from the 'ocparroq' table.
 *
 *
 *
 * @package lib.model
 */
class Ocparroq extends BaseOcparroq
{
	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}
	public function getNomedo()
	{
		return Herramientas::getX('codpai','ocestado','nomedo',self::getCodedo());
	}

	public function getNommun()
	{
		return Herramientas::getX('codmun','ocmunici','nommun',self::getCodmun());
	}
}
