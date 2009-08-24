<?php

/**
 * Subclass for representing a row from the 'cadefart' table.
 *
 *
 *
 * @package lib.model
 */
class Cadefart extends BaseCadefart
{
   	protected $corent="";
	protected $corsal="";

   	public function getNomemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Nomemp',self::getCodemp());
	}

	public function getDiremp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Diremp',self::getCodemp());
	}

	public function getTlfemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Tlfemp',self::getCodemp());
	}



  public function getCorcom()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorcom();}else { return '';}
  }

  public function getCorrec2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorrec();}else { return '';}
  }

  public function getCorreq2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorreq();}else { return '';}
  }

  public function getCordes2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCordes();}else { return '';}
  }

  public function getCorser()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorser();}else { return '';}
  }

  public function getCorsol()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorsol();}else { return '';}
  }

  public function getCorcot2()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorcot();}else { return '';}
  }

  public function getCorent()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorent();}else { return '';}
  }

   public function getCorsal()
  {
	$c= new Criteria();
	$dato= CacorrelPeer::doSelectOne($c);
	if ($dato)
	{ return $dato->getCorsal();}else { return '';}
  }

   public function getNomdocpre()
  {
  	 return Herramientas::getX('TIPPRC','Cpdocprc','Nomext',self::getTipdocpre());
  }
}
