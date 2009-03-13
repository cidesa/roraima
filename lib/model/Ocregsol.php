<?php

/**
 * Subclass for representing a row from the 'ocregsol' table.
 *
 *
 *
 * @package lib.model
 */
class Ocregsol extends BaseOcregsol
{
	public function getNomste()
	{
		return Herramientas::getX('CEDSTE','Ocdatste','Nomste',self::getCedste());
	}

	public function getDessol1()
	{
		return Herramientas::getX('CODSOL','Octipsol','Dessol',self::getCodsol());
	}

	public function getDesorg()
	{
		return Herramientas::getX('CODORG','Ocdeforg','Desorg',self::getCodorg());
	}

	public function getNomemp()
	{
		return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
	}

}
