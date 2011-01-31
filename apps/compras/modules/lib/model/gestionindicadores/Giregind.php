<?php

/**
 * Subclass for representing a row from the 'giregind' table.
 *
 * 
 *
 * @package lib.model.gestionindicadores
 */ 
class Giregind extends BaseGiregind
{
	public function getNomuni()
	{
		return H::getx('Numuni','Acunidad','nomuni',self::getNumuni());
	}
}
