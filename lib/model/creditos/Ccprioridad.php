<?php

/**
 * Subclass for representing a row from the 'ccprioridad' table.
 *
 *
 *
 * @package lib.model
 */
class Ccprioridad extends BaseCcprioridad
{
	public function __toString(){
		return $this->getAlias()."-".$this->getNompri();
	}
}
