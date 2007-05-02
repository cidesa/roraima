<?php

/**
 * Subclass for representing a row from the 'cideftit' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Cideftit extends BaseCideftit
{
	public function getDescta()
	  {
	  	return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
	  }	
}
