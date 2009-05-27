<?php

/**
 * Subclass for representing a row from the 'npcontra' table.
 *
 *
 *
 * @package lib.model
 */
class Npcontra extends BaseNpcontra
{
  public function getNomnom()
  {
  	$dato= Herramientas::getX('codnom','npnomina','Nomnom',self::getCodnom());
    return $dato;
  }

  public function getNomcon()
  {
  	$dato= Herramientas::getX('codcon','npdefcpt','Nomcon',self::getCodcon());
    return $dato;
  }
}
