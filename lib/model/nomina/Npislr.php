<?php

/**
 * Subclass for representing a row from the 'npislr' table.
 *
 *
 *
 * @package lib.model
 */
class Npislr extends BaseNpislr
{
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		//$c->addJoin(NpdefcptPeer::CODCON,NpcestaticketsPeer::CODCON);
		$codigo = NpnominaPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomnom();
		}else{
			return ' ';
		}
	}

   public function getNomconpor()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodconpor());
		$codigo = NpdefcptPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomcon();
		}else{
			return ' ';
		}
	}

	public function getNomconimp()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodconimp());
		$codigo = NpdefcptPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomcon();
  		}else{
	      return ' ';
  		}
    }	    
    
    
}
