<?php

/**
 * Subclass for representing a row from the 'npseghcm' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npseghcm extends BaseNpseghcm
{
	protected $nomnom='';
	protected $nomcon='';
	
	public function getNomnom()
	{
		return H::getX('Codnom','Npnomina','nomnom',$this->codnom);
	}
	public function getNomcon()
	{
		return H::getX('Codcon','Npdefcpt','nomcon',$this->codcon);
	}
	public function getNomconapo()
	{
		return H::getX('Codcon','Npdefcpt','nomcon',$this->codconapo);
	}
}
