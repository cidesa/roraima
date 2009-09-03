<?php

/**
 * Subclass for representing a row from the 'giproanu' table.
 *
 * 
 *
 * @package lib.model.gestionindicadores
 */ 
class Giproanu extends BaseGiproanu
{
	protected $numuni='';
	protected $objtri=array();
	
	public function getNumuni()
	{
		return H::getx('Numindg','Giregind','Numuni',self::getNumindg());
	}
	
	public function getNomindg()
	{
		return H::getx('Numindg','Giregind','Nomindg',self::getNumindg());
	}
	
	public function getNomuni()
	{
		return H::getx('Numuni','Acunidad','Nomuni',self::getNumuni());
	}
	
}
