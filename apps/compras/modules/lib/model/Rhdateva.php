<?php

/**
 * Subclass for representing a row from the 'rhdateva'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Rhdateva extends BaseRhdateva
{
	public function getDesevdo()
	{
		return H::GetX('Codemp','Nphojint','Nomemp',$this->codevdo);
	}
	public function getDesevor()
	{
		return H::GetX('Codemp','Nphojint','Nomemp',$this->codevor);
	}
	public function getDessup()
	{
		return H::GetX('Codemp','Nphojint','Nomemp',$this->codsup);
	}
	public function getCargoevdo()
	{
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,$this->codevdo);
		$c->add(NpasicarempPeer::STATUS,'V');
		$per = NpasicarempPeer::doSelectOne($c);
		if($per)
			return $per->getCodcar().'  '.$per->getNomcar();
		else
			return '';	
	}
	public function getCargoevor()
	{
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,$this->codevor);
		$c->add(NpasicarempPeer::STATUS,'V');
		$per = NpasicarempPeer::doSelectOne($c);
		if($per)
			return $per->getCodcar().'  '.$per->getNomcar();
		else
			return '';	
	}
	public function getCargosup()
	{
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,$this->codsup);
		$c->add(NpasicarempPeer::STATUS,'V');
		$per = NpasicarempPeer::doSelectOne($c);
		if($per)
			return $per->getCodcar().'  '.$per->getNomcar();
		else
			return '';	
	}
}
