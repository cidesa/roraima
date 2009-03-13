<?php

/**
 * Subclass for representing a row from the 'caartdph' table.
 *
 *
 *
 * @package lib.model
 */
class Caartdph extends BaseCaartdph
{

	public function getDesart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}

	public function getUnimed()
	{
		return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
	}

	public function getCospro()
	{
		return Herramientas::getX('CODART','Caregart','Cospro',self::getCodart());
	}

	public function getDesfal()
	{
		return Herramientas::getX('CODFAL','Camotfal','Desfal',self::getCodfal());
	}

    public function getNomalm()
    {
	  return Herramientas::getX('CODALM','Cadefalm','Nomalm',$this->getCodalm());
    }

    public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',$this->getCodubi());
	}

    public function getMontotdes()
	{
		return self::getMontot();
	}

}
