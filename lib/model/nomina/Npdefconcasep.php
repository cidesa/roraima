<?php

/**
 * Subclass for representing a row from the 'npdefconcasep' table.
 *
 *
 *
 * @package lib.model
 */
class Npdefconcasep extends BaseNpdefconcasep
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
