<?php

/**
 * Subclass for representing a row from the 'npvacdefgen' table.
 *
 *
 *
 * @package lib.model
 */
class Npvacdefgen extends BaseNpvacdefgen
{
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnomvac());
		$codigo = NpnominaPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomnom();
		}else{
			return ' ';
		}
	}

	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpasiconnomPeer::CODNOM,self::getCodconvac());
		$c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
		$codigo = NPDefCptPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomcon();
  		}else{
	      return ' ';
  		}
    }	  
}
