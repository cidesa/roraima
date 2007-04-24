<?php

/**
 * Subclass for representing a row from the 'caartalm' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Caartalm extends BaseCaartalm
{
	
	public function getNomalm()
	{
		return Herramientas::getX('CODALM', 'Cadefalm', 'Nomalm',self::getCodalm());
		
	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI', 'Cadefubi', 'Nomubi', self::getCodubi());
		
	}
	
	
}
