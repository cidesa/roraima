<?php

/**
 * Subclass for representing a row from the 'npdetembcon' table.
 *
 * 
 *
 * @package lib.model.nomina
 */ 
class Npdetembcon extends BaseNpdetembcon
{
	public function getNomcon()
	{
		return H::getx('Codcon','Npdefcpt','nomcon',self::getCodcon());
	}
}
