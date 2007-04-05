<?php

/**
 * Subclass for representing a row from the 'octipret' table.
 *
 *
 *
 * @package lib.model
 */
class Octipret extends BaseOctipret
{
	public function getDescta()
	//JJSG******
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,self::getCodcon());
		$descta = ContabbPeer::doSelectone($c);
		if ($descta){
			return $descta->getDescta();
		}else{
			return '<!No Encontrado o Vacio> ';
		}
	}	
}
