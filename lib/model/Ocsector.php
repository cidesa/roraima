<?php

/**
 * Subclass for representing a row from the 'ocsector' table.
 *
 *
 *
 * @package lib.model
 */
class Ocsector extends BaseOcsector
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

		public function getNompar()
	{
		return Herramientas::getX('codpar','ocparroq','nompar',self::getCodpar());
	}
}
