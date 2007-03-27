<?php

/**
 * Subclass for representing a row from the 'npasiconemp' table.
 *
 *
 *
 * @package lib.model
 */
class Npasiconemp extends BaseNpasiconemp
{
	public function getNomemp()
	{
		$c = new Criteria();
		$c->add(NphojintPeer::CODEMP,str_pad(self::getCodemp(), 16, " "));
		$nomemp = NphojintPeer::doSelectone($c);
		if ($nomemp)
		return $nomemp->getNomemp();
		else
		return ' ';
	}
	public function getNomcar()
	{
		$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,self::getCodcar());
		$nomcar = NpcargosPeer::doSelectone($c);
		if ($nomcar)
		return $nomcar->getNomcar();
		else
		return ' ';
	}
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpdefmovPeer::CODCON,self::getCodcon());
		$c->addJoin(NpnominaPeer::CODNOM,NpdefmovPeer::CODNOM);
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom)
		return $nomnom->getNomnom();
		else
		return ' ';
	}
	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodcon());
		$nomcon = NpdefcptPeer::doSelectone($c);
		if ($nomcon)
		return $nomcon->getNomcon();
		else
		return ' ';
	}	
}
