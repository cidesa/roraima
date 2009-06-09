<?php

/**
 * Subclass for representing a row from the 'npcestatickets' table.
 *
 *
 *
 * @package lib.model
 */
class Npcestatickets extends BaseNpcestatickets
{
	public static function getNomcon2($codigo='',$codcon)   //Para el ajax
	{
  		$c = new Criteria();
	  	$c->add(NpasiconnomPeer::CODNOM,$codigo);
	  	$c->add(NpasiconnomPeer::CODCON,$codcon);
  		$c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
		$per = NpdefcptPeer::doSelectone($c);

		if ($per){
			return $per->getNomcon();
		}else{
			return "";
		}
	}

	public function getNomcon()
	{
  		$c = new Criteria();
	  	$c->add(NpasiconnomPeer::CODNOM,self::getCodnom());
  		$c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
		$per = NpdefcptPeer::doSelectone($c);

		if ($per){
			return $per->getNomcon();
		}else{
			return "";
		}
	}


	public function getNomnom()
	{//self::getCodalm()
  		$c = new Criteria();
	  	$c->add(NpnominaPeer::CODNOM,self::getCodnom());
  		$per = NpnominaPeer::doSelectone($c);

		if ($per){
			return $per->getNomnom();
		}else{
			return "";
		}
	}

}
