<?php

/**
 * Subclass for representing a row from the 'cadphartser' table.
 *
 *
 *
 * @package lib.model
 */
class Cadphartser extends BaseCadphartser
{
  public function getNomcat()
  {
	//return Herramientas::getX('codcat','Npcatpre','Nomcat',self::getCodori());
	 return Herramientas::getX('CODUBI','Bnubibie','Desubi',self::getCodori());
  }

  public function getDesreqart()
  {
	return Herramientas::getX('reqart','Careqartser','desreq',self::getReqart());
  }
}
