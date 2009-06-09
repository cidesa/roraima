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

	public function getAnovig()
	{
		return Herramientas::getX('CODTIPCON','Npbonocont','Anovig',self::getCodtipcon());
	}

	public function getAnovighas()
	{
		return Herramientas::getX('CODTIPCON','Npbonocont','Anovighas',self::getCodtipcon());
	}


}
