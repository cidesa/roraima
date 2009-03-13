<?php

/**
 * Subclass for representing a row from the 'forpryubigeo' table.
 *
 *
 *
 * @package lib.model
 */
class Forpryubigeo extends BaseForpryubigeo
{
  public function getNomest()
  {
    return Herramientas::getX('CODEST','Fordefest','Desest',self::getCodest());
  }
  public function getNommun()
  {
  	$c = new Criteria();
  	$c->add(FordefmunPeer::CODEST,self::getCodest());
    $c->add(FordefmunPeer::CODMUN,self::getCodmun());
    $nommun = FordefmunPeer::doSelectone($c);
    if ($nommun)
    return $nommun->getDesmun();
	else
	return ' ';
  }
  public function getNompar()
  {
  	$c = new Criteria();
  	$c->add(FordefparPeer::CODEST,self::getCodest());
    $c->add(FordefparPeer::CODMUN,self::getCodmun());
    $c->add(FordefparPeer::CODPAR,self::getCodpar());
    $nompar = FordefparPeer::doSelectone($c);
    if ($nompar)
    return $nompar->getDespar();
	else
	return ' ';
  }
}
