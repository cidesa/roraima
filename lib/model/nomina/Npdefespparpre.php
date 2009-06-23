<?php

/**
 * Subclass for representing a row from the 'npdefespparpre' table.
 *
 * 
 *
 * @package lib.model.nomina
 */ 
class Npdefespparpre extends BaseNpdefespparpre
{
	protected $nomnom='';
	
	public  function getNomnom()
	{
		return H::getX('Codnom','Npnomina','Nomnom',self::getCodnom());
	}
}
