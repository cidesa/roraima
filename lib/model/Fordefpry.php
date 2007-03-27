<?php

/**
 * Subclass for representing a row from the 'fordefpry' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefpry extends BaseFordefpry
{
	public function getFrepagcon()
	{
		$data = parent::getProacc();
		if($data=='P') return 'Proyecto';
		if($data=='A') return 'Acción Centralizada';
	}	
}
