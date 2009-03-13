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

  private $check = '';
  private $status = '';
   private $codnom = '';

  public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
     return $this->check;
  }

 public function getCheck_gri()
  {
	return $this->check;
  }

	public function getNomemp()
	{
		$c = new Criteria();
		$c->add(NphojintPeer::CODEMP,self::getCodemp());
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

	public function getCodnom()
	{
		$c = new Criteria();
		$c->add(NpdefmovPeer::CODCON,self::getCodcon());
		$c->addJoin(NpnominaPeer::CODNOM,NpdefmovPeer::CODNOM);
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom)
		return $nomnom->getCodnom();
		else
		return ' ';
	}

	public function getNomnom()
	{
		$c = new Criteria();
		//$c->add(NpdefmovPeer::CODCON,self::getCodcon());
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
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

	public function getStatus()
	{
		$c = new Criteria();
		$c->add(NpdefmovPeer::CODCON,self::getCodcon());
		$nomcon = NpdefmovPeer::doSelectOne($c);
		if ($nomcon)
		return $nomcon->getStatus();
		else
		return ' ';
	}

    public function getCodnom2()
	{
		$c = new Criteria();
		$c->add(NpasiconnomPeer::CODCON,self::getCodcon());
		$nomina = NpasiconnomPeer::doSelectone($c);
		if ($nomina)
		return $nomina->getCodnom();
		else
		return '';
	}

  public function getDesnom()
  {
    $c = new Criteria();
    $c->add(NpnominaPeer::CODNOM,self::getCodnom2());
	$nomnom = NpnominaPeer::doSelectone($c);
	if ($nomnom)
	return $nomnom->getNomnom();
	else return '';
  }
}
