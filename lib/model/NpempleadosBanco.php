<?php

/**
 * Subclass for representing a row from the 'npempleados_banco' table.
 *
 *
 *
 * @package lib.model
 */
class NpempleadosBanco extends BaseNpempleadosBanco
{
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

    public function getCedemp()
	{
		$c = new Criteria();
		$c->add(NphojintPeer::CEDEMP,self::getCodemp());
		$nomemp = NphojintPeer::doSelectone($c);
		if ($nomemp)
		return $nomemp->getCedemp();
		else
		return ' ';
	}

	public function getNomban()
	{
		$c = new Criteria();
		$c->add(NpbancosPeer::CODBAN,self::getCodban());
		$nomban = NpbancosPeer::doSelectOne($c);
    	if ($nomban)
    	  return $nomban->getNomban();
	    else
	      return ' ';
    }
    
    public function getDesnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$nomban = NpnominaPeer::doSelectOne($c);
    	if ($nomban)
    	  return $nomban->getNomnom();
	    else
	      return ' ';
    }
 
}


