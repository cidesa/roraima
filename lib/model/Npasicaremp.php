<?php

/**
 * Subclass for representing a row from the 'npasicaremp' table.
 *
 *
 *
 * @package lib.model
 */
class Npasicaremp extends BaseNpasicaremp
{
	public function getCodcon()
	{
		$c = new Criteria();
		$c->add(NpasiconempPeer::CODEMP,self::getCodemp());
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$codigo = NpasiconempPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getCodcon();
		}else{
			return ' ';
		}
	}
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomnom();
		}else{
			return ' ';
		}
	}
	public function getDestipgas()
	{
		$c = new Criteria();
		$c->add(NptipgasPeer::CODTIPGAS,self::getCodtipgas());
		$destipgas = NptipgasPeer::doSelectone($c);
		if ($destipgas){
			return $destipgas->getDestipgas();
		}else{
			return ' ';
		}
	}
	public function getDespaso()
	{
		$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,self::getCodcar());
		$c->add(NpcomocpPeer::CODTIPCAR,NpcargosPeer::CODTIP);
		$c->add(NpcomocpPeer::GRACAR,NpcargosPeer::GRAOCP);
		$suecar = NpcomOcpPeer::doSelectone($c);
		if ($suecar){
			return $suecar->getSuecar();
		}else{
			return ' ';
		}
	}	
}
