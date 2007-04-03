<?php

/**
 * Subclass for representing a row from the 'bndefconi' table.
 *
 *
 *
 * @package lib.model
 */
class Bndefconi extends BaseBndefconi
{
	public function getDesmue()
	{
		$c = new Criteria();
		$c->add(BnregmuePeer::CODACT,str_pad(self::getCodact(), 30 , ' '));
		$c->add(BnregmuePeer::CODMUE,str_pad(self::getCodinm(), 20 , ' '));
		$desmue = BnregmuePeer::doSelectone($c);
		if ($desmue){
			return $desmue->getDesmue();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDescta()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtadepcar(), 32 , ' '));
		$descta = ContabbPeer::doSelectone($c);
		if ($descta){
			return $descta->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDesctaabo()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtadepabo(), 32 , ' '));
		$desctaabo = ContabbPeer::doSelectone($c);
		if ($desctaabo){
			return $desctaabo->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDesctaajucar()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtaajucar(), 32 , ' '));
		$desctaajucar = ContabbPeer::doSelectone($c);
		if ($desctaajucar){
			return $desctaajucar->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDesctaajuabo()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtaajuabo(), 32 , ' '));
		$desctaajuabo = ContabbPeer::doSelectone($c);
		if ($desctaajuabo){
			return $desctaajuabo->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDesctarevcar()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtaajuabo(), 32 , ' '));
		$desctarevcar = ContabbPeer::doSelectone($c);
		if ($desctarevcar){
			return $desctarevcar->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDesctarevabo()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtarevabo(), 32 , ' '));
		$desctarevabo = ContabbPeer::doSelectone($c);
		if ($desctarevabo){
			return $desctarevabo->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDesctapercar()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtapercar(), 32 , ' '));
		$desctapercar = ContabbPeer::doSelectone($c);
		if ($desctapercar){
			return $desctapercar->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}
	public function getDesctaperabo()
	{
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,str_pad(self::getCtaperabo(), 32 , ' '));
		$desctaperabo = ContabbPeer::doSelectone($c);
		if ($desctaperabo){
			return $desctaperabo->getDescta();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}	
}
