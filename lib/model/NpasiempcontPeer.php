<?php

/**
 * Subclass for performing query and update operations on the 'npasiempcont' table.
 *
 *
 *
 * @package lib.model
 */
class NpasiempcontPeer extends BaseNpasiempcontPeer
{
	  public static function getNomemp($codigo)
  {
    $c = new Criteria();
    $c->add(NpasiempcontPeer::CODEMP,$codigo);
    $per = NpasiempcontPeer::doSelectOne($c);
    if ($per)
    {
    	$nomemp= $per->getNomemp();
    	//print $nomnom; exit;
    	return $nomemp;
    }
  }
}
