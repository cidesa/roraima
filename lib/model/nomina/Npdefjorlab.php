<?php

/**
 * Subclase para representar una fila de la tabla 'npdefjorlab'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
