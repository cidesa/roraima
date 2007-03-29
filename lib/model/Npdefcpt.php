<?php

/**
 * Subclass for representing a row from the 'npdefcpt' table.
 *
 *
 *
 * @package lib.model
 */
class Npdefcpt extends BaseNpdefcpt
{
	public function getestado()
	{
		if (($this->getConact())=='S')
			return 'Activo';
		else
 		   return 'Inactivo';
  	}	
}
