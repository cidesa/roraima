<?php

/**
 * Subclass for representing a row from the 'fcfuentesmul' table.
 *
 *
 *
 * @package lib.model
 */
class Fcfuentesmul extends BaseFcfuentesmul
{
	protected $nomfue="";
	protected $nomfuegen="";

    public function getNomfue()
    {
        return Herramientas::getX_vacio('codfue','FCfuepre','nomfue',self::getCodfue());
    }

    public function getNomfuegen()
    {
        return Herramientas::getX_vacio('codfue','FCfuepre','nomfue',self::getCodfuegen());
    }
}
