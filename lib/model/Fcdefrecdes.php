<?php

/**
 * Subclass for representing a row from the 'fcdefrecdes' table.
 *
 *
 *
 * @package lib.model
 */
class Fcdefrecdes extends BaseFcdefrecdes
{
	protected $desrec="";

    public function getDesrec()//Condición de pago
    {
        return Herramientas::getX_vacio('codrec','Carecaud','desrec',self::getCodrec());
    }


}
