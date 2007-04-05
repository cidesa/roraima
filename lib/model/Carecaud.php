<?php

/**
 * Subclass for representing a row from the 'carecaud' table.
 *
 *
 *
 * @package lib.model
 */
class Carecaud extends BaseCarecaud
{
	public function getDestiprec()
	//JJSG******
	{
		$c = new Criteria();
		$c->add(CatiprecPeer::CODTIPREC,self::getCodtiprec());
		$destiprec = CatiprecPeer::doSelectone($c);
		if ($destiprec){
			return $destiprec->getDestiprec();
		}else{
			return '<!No Encontrado o Vacio> ';
		}
	}
}
