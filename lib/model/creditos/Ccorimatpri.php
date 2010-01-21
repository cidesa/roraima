<?php

/**
 * Subclass for representing a row from the 'ccorimatpri' table.
 *
 *
 *
 * @package lib.model
 */
class Ccorimatpri extends BaseCcorimatpri
{
	public function __toString(){
		return $this->getNomorimatpri();
	}
}
