<?php

/**
 * Subclass for representing a row from the 'npconarc' table.
 *
 *
 *
 * @package lib.model
 */
class Npconarc extends BaseNpconarc
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
