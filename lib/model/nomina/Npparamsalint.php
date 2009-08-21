<?php

/**
 * Subclass for representing a row from the 'npparamsalint' table.
 *
 * 
 *
 * @package lib.model.nomina
 */ 
class Npparamsalint extends BaseNpparamsalint
{
	public function getNomnom()
	{
		return H::getx('Codnom','Npnomina','Nomnom',$this->codnom);
	}
	public function getNomcon()
	{
		return H::getx('Codcon','Npdefcpt','Nomcon',$this->codcon);
	}
}
