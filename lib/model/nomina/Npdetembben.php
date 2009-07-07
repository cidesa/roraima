<?php

/**
 * Subclass for representing a row from the 'npdetembben' table.
 *
 * 
 *
 * @package lib.model.nomina
 */ 
class Npdetembben extends BaseNpdetembben
{
	public function getNomben()
	{
		return H::getx('Cedrif','Npbenefiemb','nomben',self::getCedrifben());
	}
}
