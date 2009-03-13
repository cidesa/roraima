<?php

/**
 * Subclass for representing a row from the 'fadtocte' table.
 *
 *
 *
 * @package lib.model
 */
class Fadtocte extends BaseFadtocte
{
	public $obj = array();

    public function getDesdesc()
    {
  	    return Herramientas::getX('CODDESC','Fadescto','Desdesc',self::getCoddesc());
    }

    public function getMondesc()
    {
  	    return number_format(Herramientas::getX('CODDESC','Fadescto','Mondesc',self::getCoddesc()),2,',','.');
    }

}
