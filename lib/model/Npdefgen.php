<?php

/**
 * Subclass for representing a row from the 'npdefgen' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npdefgen extends BaseNpdefgen
{
    public function getNomemp()
	{
 
		$c = new Criteria();
		$c->add(EmpresaPeer::CODEMP,self::getCodemp());
		$registro = EmpresaPeer::doSelectOne($c);
		if($registro) return $registro->getNomemp();
		else return null; 
		
	}
}
