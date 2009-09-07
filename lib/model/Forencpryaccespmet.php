<?php

/**
 * Subclass for representing a row from the 'forencpryaccespmet'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Forencpryaccespmet extends BaseForencpryaccespmet
{
	public function getNompro()  //Proyecto
	{
	  return Herramientas::getX('codpro','Fordefpry','nompro',self::getCodpro());
	}

	public function getProacc()  //Proyecto
	{
	  return Herramientas::getX('codpro','Fordefpry','proacc',self::getCodpro());
	}

	public function getDesaccesp()  //Accion Especifica
	{
	  return Herramientas::getXx('Fordefaccesp',array('CODPRO','CODACCESP'),array(self::getCodpro(),self::getCodaccesp()),'Desaccesp');
	}

	public function getDesmet()  //Meta
	{
	  return Herramientas::getXx('Fordefpryaccmet',array('CODMET','CODPRO','CODACCESP'),array(self::getCodmet(),self::getCodpro(),self::getCodaccesp()),'Desmet');
	}

	//public function getCanmet()  //Canmet
	//{
//	  return Herramientas::getXx('Fordefpryaccmet',array('CODMET','CODPRO','CODACCESP'),array(self::getCodmet(),self::getCodpro(),self::getCodaccesp()),'canmet');
//	}

	public function getDesunimed()
	{
		$c= new Criteria();
		$c->add(FordefpryaccmetPeer::CODPRO,self::getCodpro());
		$c->add(FordefpryaccmetPeer::CODMET,self::getCodmet());
		$c->add(FordefpryaccmetPeer::CODACCESP,self::getCodaccesp());
		$c->addAsColumn('DESUNIMED', FordefunimedPeer::DESUNIMED);
		$c->addJoin(FordefunimedPeer::CODUNIMED,FordefpryaccmetPeer::CODUNIMED);
		$registro = FordefpryaccmetPeer::doSelectOne($c);
		if($registro) return $registro->getDesunimed();
		else return null;
    }

	public function getDesproacc()
	{
	  if (self::getProacc()=='P')
	  	{
	  		return 'Proyecto';
	  	}elseif (self::getProacc()=='A')
	  	{
	  		return 'Acción Centralizada';
	  	}
	}
}
