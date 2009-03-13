<?php

/**
 * Subclass for representing a row from the 'ocdefper' table.
 *
 *
 *
 * @package lib.model
 */
class Ocdefper extends BaseOcdefper
{

	public function getDestipper()
	{
	  return Herramientas::getX('Codtipper','Octipper','Destipper',self::getCodtipper());
	}

	public function getDestipcar()
	{
	  return Herramientas::getX('Codtipcar','Octipcar','Destipcar',self::getCodtipcar());
	}

	public function getDestippro()
	{
	  return Herramientas::getX('Codtippro','Octippro','Destippro',self::getCodtippro());
	}
}
