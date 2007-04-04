<?php

/**
 * Subclass for representing a row from the 'bnreginm' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bnreginm extends BaseBnreginm
{
	public function getNomprovee()
	{
		$c = new Criteria();
		$c->add(CaproveePeer::CODPRO,str_pad(self::getCodpro(), 10 , ' '));
		$despro = CaproveePeer::doSelectone($c);
		if ($despro){
			return $despro->getNompro();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	
	public function getNomubicac()
	{
		$c = new Criteria();
		$c->add(BnubibiePeer::CODUBI,str_pad(self::getCodubi(), 30 , ' '));
		$des = BnubibiePeer::doSelectone($c);
		if ($des){
			return $des->getDesubi();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
}
