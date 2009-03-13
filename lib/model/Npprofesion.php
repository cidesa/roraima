<?php

/**
 * Subclass for representing a row from the 'npprofesion' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npprofesion extends BaseNpprofesion
{
   public function __toString()
    {
		return $this->getDesprofes();
    }	

}
