<?php

/**
 * Subclass for representing a row from the 'fcreccon' table.
 *
 *
 *
 * @package lib.model
 */
class Fcreccon extends BaseFcreccon
{
	protected $desrec="";

    public function getDesrec()//Condición de pago
    {
        return Herramientas::getX_vacio('codrec','Carecaud','desrec',self::getCodrec());
    }

}
