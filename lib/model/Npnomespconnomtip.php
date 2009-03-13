<?php

/**
 * Subclass for representing a row from the 'npnomespconnomtip' table.
 *
 *
 *
 * @package lib.model
 */
class Npnomespconnomtip extends BaseNpnomespconnomtip
{
  public function getNomcon()
  {
  	  return Herramientas::getX_vacio('codcon','npdefcpt','nomcon',self::getCodcon());
  }
}
