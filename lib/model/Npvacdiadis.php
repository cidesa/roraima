<?php

/**
 * Subclass for representing a row from the 'npvacdiadis' table.
 *
 *
 *
 * @package lib.model
 */
class Npvacdiadis extends BaseNpvacdiadis
{
	public function getNomnom()
	{
		return Herramientas::getX('codnom','Npnomina','nomnom',self::getCodnom());
    }

}
