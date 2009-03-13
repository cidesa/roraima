<?php

/**
 * Subclass for representing a row from the 'caprocomart' table.
 *
 *
 *
 * @package lib.model
 */
class Caprocomart extends BaseCaprocomart
{

	public function getNomcat()
    {
	  return Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getCodcat());
    }

    public function getDesart()
  {
    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

   public function getNomest()
   {
     return Herramientas::getX_VACIO('CODPAI','Nppais','Nompai',self::getCodedo());
   }

   public function getNommun()
   {
  	$c = new Criteria();
  	$c->add(NpestadoPeer::CODPAI,self::getCodedo());
    $c->add(NpestadoPeer::CODEDO,self::getCodmun());
    $nommun = NpestadoPeer::doSelectone($c);
    if ($nommun)
    return $nommun->getNomedo();
	else
	return ' ';
  }
  public function getNompar()
  {
  	$c = new Criteria();
  	$c->add(NpciudadPeer::CODPAI,self::getCodedo());
    $c->add(NpciudadPeer::CODEDO,self::getCodmun());
    $c->add(NpciudadPeer::CODCIU,self::getCodciu());
    $nompar = NpciudadPeer::doSelectone($c);
    if ($nompar)
    return $nompar->getNomciu();
	else
	return ' ';
  }

}

