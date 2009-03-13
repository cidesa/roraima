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
	public function getCodigo1()
	  {
	   return self::getCodpre();
	  }
	  public function getNombre1()
	  {
	   return self::getNompre();
	  }
	public function getDescta()
	  {
	  	return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
	  }

	public function getMascara()
      {
    	return Herramientas::getX_vacio('codemp','cidefniv','forpre','001');
      }
}
