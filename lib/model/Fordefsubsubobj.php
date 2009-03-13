<?php

/**
 * Subclass for representing a row from the 'fordefsubsubobj' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefsubsubobj extends BaseFordefsubsubobj
{
  public function getDesequ()
  {
	return Herramientas::getX('CODEQU','Fordefequ','Desequ',self::getCodequ());
  }

  public function getDessubobj()
  {

	$c= new Criteria();
	$c->add(FordefsubobjPeer::CODSUBOBJ,self::getCodsubobj());
	$c->add(FordefsubobjPeer::CODEQU,self::getCodequ());
	$datos=FordefsubobjPeer::doSelectOne($c);
	if ($datos)
	  return $datos->getDessubobj();
	else
	 return "";

  }
}
