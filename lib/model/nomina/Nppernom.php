<?php

/**
 * Subclass for representing a row from the 'nppernom' table.
 *
 * 
 *
 * @package lib.model.nomina
 */ 
class Nppernom extends BaseNppernom
{
	protected $objper=array();
	
	public function getNomnom()
	{
		return H::Getx('Codnom','Npnomina','nomnom',self::getCodnom());
	}
	
	public function getDesmes()
	{
		return strtoupper(H::obtenermesenletras(self::getMes()));
	}
}
