<?php

/**
 * Subclass for representing a row from the 'fccatfis' table.
 *
 *
 *
 * @package lib.model
 */
class Fccatfis extends BaseFccatfis
{
	public function getFormatopre()
    {
    	$valor= Hacienda::Cargar_mascara();
    	return $valor;
    }
}
