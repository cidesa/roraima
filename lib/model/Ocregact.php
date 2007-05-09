<?php

/**
 * Subclass for representing a row from the 'ocregact' table.
 *
 *
 *
 * @package lib.model
 */
class Ocregact extends BaseOcregact
{
	public function getDescon()
	{
		return Herramientas::getX('codcon','ocregcon','descon',str_pad(self::getCodcon(), 32 , ' '));
	}
	public function getCodobr()
	{
		return Herramientas::getX('codcon','ocregcon','codobr',str_pad(self::getCodcon(), 32 , ' '));
	}

	public function getDesobr()
	{
		return Herramientas::getX('codobr','ocregobr','desobr',str_pad(self::getCodobr(), 32 , ' '));
	}

	public function getCodpro()
	{
		return Herramientas::getX('codcon','ocregcon','codpro',str_pad(self::getCodcon(), 10 , ' '));
	}

	public function getNompro()
	{
		return Herramientas::getX('codpro','caprovee','nompro',str_pad(self::getCodpro(), 10 , ' '));
	}

	public function getNomins()
	{
		$filtros=array('codobr','cedins');//arreglo donde mando los filtros de las clases
		$variables=array(str_pad(self::getCodobr(), 32 , ' '),self::getCedins());//arreglo donde mando los parametros de la funcion
		return $destipact= Herramientas::getXx('ocinginsobr',$filtros,$variables,'Nomins');
	}

	public function getNomtec()
	{
		$filtros=array('codobr','cedins');//arreglo donde mando los filtros de las clases
		$variables=array(str_pad(self::getCodobr(), 32 , ' '),self::getCedtec());//arreglo donde mando los parametros de la funcion
		return $destipact= Herramientas::getXx('ocinginsobr',$filtros,$variables,'Nomins');
	}

	public function getNomdir()
	{
		$filtros=array('codobr','cedins');//arreglo donde mando los filtros de las clases
		$variables=array(str_pad(self::getCodobr(), 32 , ' '),self::getCedfis());//arreglo donde mando los parametros de la funcion
		return $destipact= Herramientas::getXx('ocinginsobr',$filtros,$variables,'Nomins');
	}	
	
	public function getDestipact()
	{
		return Herramientas::getX('codtipact','octipact','destipact',str_pad(self::getCodcon(), 32 , ' '));
	}


	public function getNumofi()
	{
		$filtros=array('CODCON','CODTIPACT');//arreglo donde mando los filtros de las clases
		$variables=array(self::getCodcon(),self::getCedins());//arreglo donde mando los parametros de la funcion
		return $destipact= Herramientas::getXx('Ocasiact',$filtros,$variables,'Destipact');
	}

	public function getFecact()
	{
		return Herramientas::getX('codcon','Ocasiact','fecact',str_pad(self::getCodcon(), 32 , ' '));
	}
	public function getObsact()
	{
		return Herramientas::getX('codcon','Ocasiact','obsact',str_pad(self::getCodcon(), 32 , ' '));
	}

	public function getCedper()
	{
		$c = new Criteria();
		$c->addJoin(OctipcarPeer::CODTIPCAR,OcdefempPeer::CODINGRES);
		$c->addJoin(OcdefempPeer::CODINGRES,OcdefperPeer::CODTIPCAR);
		$c->addJoin(OctipcarPeer::CODTIPCAR,OcdefperPeer::CODTIPCAR);
		$c->addJoin(OcdefperPeer::CEDPER,OcproperPeer::CEDPER);
		$c->add(OcproperPeer::CODPRO,self::getCodpro());
		$registro = OcproperPeer::doSelectOne($c);
		if($registro) return $registro->getCedper();
		else return null;
	}
	public function getNomper()
	{
		$c = new Criteria();
		$c->addJoin(OctipcarPeer::CODTIPCAR,OcdefempPeer::CODINGRES);
		$c->addJoin(OcdefempPeer::CODINGRES,OcdefperPeer::CODTIPCAR);
		$c->addJoin(OctipcarPeer::CODTIPCAR,OcdefperPeer::CODTIPCAR);
		$c->addJoin(OcdefperPeer::CEDPER,OcproperPeer::CEDPER);
		$c->add(OcproperPeer::CODPRO,self::getCodpro());
		$registro = OcproperPeer::doSelectOne($c);
		if($registro) return $registro->getNomper();
		else return null; 
		
	}			
}
