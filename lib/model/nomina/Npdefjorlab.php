<?php

/**
 * Subclass for representing a row from the 'npdefjorlab' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npdefjorlab extends BaseNpdefjorlab
{
	
	public function getDias()
	{
		$dias = '';

		if(self::getDomingo() == '1' ) $dias = $dias.'Domingo, ';  
		if(self::getLunes() == '2' ) $dias = $dias.'Lunes, ';
		if(self::getMartes() == '3' ) $dias = $dias.'Martes, ';
		if(self::getMiercoles() == '4' ) $dias = $dias.'Miercoles, ';
		if(self::getJueves() == '5' ) $dias = $dias.'Jueves, ';
		if(self::getViernes() == '6' ) $dias = $dias.'Viernes, ';
		if(self::getSabado() == '7' ) $dias = $dias.'Sabado, ';

		return $dias;
		
	}
	
	public function getNomnom()
	{
		
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$nomnom = NpnominaPeer::doSelectOne($c);
		
		if($nomnom) return $nomnom->getNomnom();
		else '';
		
	}
	
}
