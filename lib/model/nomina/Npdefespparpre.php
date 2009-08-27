<?php

/**
 * Subclass for representing a row from the 'npdefespparpre' table.
 *
 * 
 *
 * @package lib.model.nomina
 */ 
class Npdefespparpre extends BaseNpdefespparpre
{
	protected $nomnom='';
	protected $desret='';
	
	public  function getNomnom()
	{
		return H::getX('Codnom','Npnomina','Nomnom',self::getCodnom());
	}		
	public  function getDesret()
	{
		return H::getX('Codret','Nptipret','Desret',self::getCodret());
	}
}
