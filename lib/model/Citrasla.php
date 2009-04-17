<?php

/**
 * Subclass for representing a row from the 'citrasla' table.
 *
 *
 *
 * @package lib.model
 */
class Citrasla extends BaseCitrasla
{

	protected $grid= array();

	public function getLongpre()
    {
    	return strlen(Herramientas::getX_vacio('CODEMP','Cidefniv','Forpre','001'));
    }

	public function getEtiqueta()
    {
    	if (Herramientas::getX_vacio('REFTRA','Citrasla','Statra',self::getReftra())=='N'){
    		return "Traslado Anulado";
    	}
    }
}
