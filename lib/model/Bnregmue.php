<?php

/**
 * Subclass for representing a row from the 'bnregmue' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bnregmue extends BaseBnregmue
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
	
	public function getNomdispos()
	{
		$c = new Criteria();
		$c->add(BndisbiePeer::CODDIS,self::getCoddis());
		$des = BndisbiePeer::doSelectone($c);
		if ($des){
			return $des->getDesdis();
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

	public function getVidutiactual()
	{
		$des = 0;
		$des = $this->getViduti()+ $this->getAumviduti()- $this->getDimviduti() ; 
		return $des;		
	}
	
	public function getValactual()
	{
		$des = 0;
		$des = $this->getValini()+ $this->getValadi(); 
		return $des;		
	}
}


