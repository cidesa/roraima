<?php

/**
 * Subclass for representing a row from the 'npnomespnomtip' table.
 *
 *
 *
 * @package lib.model
 */
class Npnomespnomtip extends BaseNpnomespnomtip
{
  public function getNomnomesp()
  {
  	return Herramientas::getX('codnomesp','npnomesptipos','desnomesp',self::getCodnomesp());
  }

  public function getNomnom()
  {
  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
  }
}
