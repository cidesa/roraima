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
	public function getJornada()
	{
		if($this->jornada=='' || $this->jornada=='H')
			return 'H';
		else	
			return 'C';
    }

}
