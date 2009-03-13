<?php

/**
 * Subclass for representing a row from the 'caretser' table.
 *
 *
 *
 * @package lib.model
 */ 
class Caretser extends BaseCaretser
{
	public function getDesart()
	{
		return Herramientas::getX('codart','caregart','desart',self::getCodser());
	}
	public function getDestip()
	{
		return Herramientas::getX('codtip','optipret','destip',self::getCodret());
	}
/*	public function getCodser()
	{
		$c = new Criteria();
		$c->setDistinct(CaretserPeer::CODSER);   
		$nomemp = CaretserPeer::doSelectone($c);
		return $nomemp->getCodser();
	}*/		
}
