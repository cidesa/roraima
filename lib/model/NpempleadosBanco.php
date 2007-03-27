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
		$c->add(NphojintPeer::CODEMP,str_pad(self::getCodemp(), 16, " "));
		$nomemp = NphojintPeer::doSelectone($c);
		if ($nomemp)
		return $nomemp->getNomemp();
		else
		return ' ';
	}

	public function getNomban()
	{
		$c = new Criteria();
		$c->add(NpbancosPeer::CODBAN,self::getCodban());
		$nomban = NpbancosPeer::doSelectone($c);
    	if ($nomban)
    	  return $nomban->getNomban();
	    else
	      return ' ';
    }    
}


