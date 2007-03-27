<?php

/**
 * Subclass for representing a row from the 'nptipcon' table.
 *
 *
 *
 * @package lib.model
 */
class Nptipcon extends BaseNptipcon
{
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpasinomcontPeer::CODTIPCON,self::getCodtipcon());
		$c->addJoin(NpnominaPeer::CODNOM,NpasinomcontPeer::CODNOM);		
		$codnom = NpnominaPeer::doSelectone($c);
		if ($codnom){
			return $codnom->getNomnom();
		}else{
			return ' ';
		}
	}

	public function getFrepagcon()
	{
		$data = parent::getFrepagcon();
		if($data=='M') return 'MENSUAL';
		if($data=='S') return 'SEMANAL';
		if($data=='Q') return 'QUINCENAL';
		if($data=='E') return 'MENSUAL ANTICIPO';
	}

	public function getAnovig()
	{
		$c = new Criteria();
		$c->add(NpbonocontPeer::CODTIPCON,self::getCodtipcon());
		$anovig = NpbonocontPeer::doSelectone($c);
		if ($anovig){
			return $anovig->getAnovig();
		}else{
			return ' ';
		}
	}
	public function getAnovighas()
	{
		$c = new Criteria();
		$c->add(NpbonocontPeer::CODTIPCON,self::getCodtipcon());
		$anovighas = NpbonocontPeer::doSelectone($c);
		if ($anovighas){
			return $anovighas->getAnovighas();
		}else{
			return ' ';
		}
	}	
	
}
