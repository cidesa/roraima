<?php

/**
 * Subclass for representing a row from the 'cadetsal' table.
 *
 *
 *
 * @package lib.model
 */
class Cadetsal extends BaseCadetsal
{
  public function getDesart()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
  public function getNomalm()
  {
	return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
  }
  public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}

 }
