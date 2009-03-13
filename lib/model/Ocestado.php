<?php

/**
 * Subclass for representing a row from the 'ocestado' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocestado extends BaseOcestado
{
	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}
}
