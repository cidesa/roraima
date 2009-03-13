<?php

/**
 * Subclass for representing a row from the 'ocmunici' table.
 *
 *
 *
 * @package lib.model
 */
class Ocmunici extends BaseOcmunici
{
	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}
	public function getNomedo()
	{
		return Herramientas::getX('codpai','ocestado','nomedo',self::getCodedo());
	}
}
