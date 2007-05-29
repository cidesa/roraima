<?php

/**
 * Subclass for representing a row from the 'caprovee' table.
 *
 *
 *
 * @package lib.model
 */
class Caprovee extends BaseCaprovee
{
	public function getDestipesp()
	{//JJSG
		$c = new Criteria();
		$c->add(OcproespPeer::CODPRO,self::getCodpro());
		$c->addJoin(OctipespPeer::CODTIPESP,OcproespPeer::CODTIPESP);
		$destipesp = OctipespPeer::doSelectone($c);
		if ($destipesp){
			return $destipesp->getDestipesp();
		}else{
			return '<!Descripción no Encontrada o Vacia> ';
		}
	}
	public function getNomram()
	{//JJSG
		$c = new Criteria();
		$c->add(CaramartPeer::RAMART,self::getCodram());
		$nomram = CaramartPeer::doSelectone($c);
		if ($nomram){
			return $nomram->getNomram();
		}else{
			return '<!Descripción no Encontrada o Vacia> ';
		}
	}
	public function getDescta()
	{//JJSG
		$c = new Criteria();
		$c->add(ContabbPeer::CODCTA,self::getCodcta());
		$descta = ContabbPeer::doSelectone($c);
		if ($descta){
			return $descta->getDescta();
		}else{
			return '<!Descripción no Encontrada o Vacia> ';
		}
	}
	public function getDestiprec()
	{//JJSG
		$c = new Criteria();
		$c->add(CatiprecPeer::CODTIPREC,self::getCodtiprec());
		$destiprec = CatiprecPeer::doSelectone($c);
		if ($destiprec){
			return $destiprec->getDestiprec();
		}else{
			return '<!Descripción no Encontrada o Vacia> ';
		}
	}

	public function getDesctacodord()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodord());
	}

	public function getDesctacodpercon()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodpercon());
	}
	
	public function getCodctasec()
	{
	  return Herramientas::getX('cedrif','opbenefi','codctasec',self::getrifpro());
	}

	public function getDesctacodctasec()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodctasec());
	}

	public function getDesctacodordadi()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodordadi());
	}
	
	public function getDesctacodperconadi()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodperconadi());
	}

	public function getDesctacodordmercon()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodordmercon());
	}
	
	public function getDesctacodpermercon()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodpermercon());
	}

	public function getDesctacodordcontra()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodordcontra());
	}
	
	public function getDesctacodpercontra()
	{
	  return Herramientas::getX('codcta','contabb','descta',self::getcodpercontra());
	}
	
	
		
}
