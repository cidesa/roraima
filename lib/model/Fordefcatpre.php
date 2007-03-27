<?php

/**
 * Subclass for representing a row from the 'fordefcatpre' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefcatpre extends BaseFordefcatpre
{
	public function getNomemp()
	{
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,str_pad(self::getCodemp(),16 ,' '));
		$nomemp = NpasicarempPeer::doSelectone($c);
		if ($nomemp){
			return $nomemp->getNomemp();
		}else{
			return ' ';
		}
	}	
}
