<?php

/**
 * Subclass for representing a row from the 'fadescto' table.
 *
 *
 *
 * @package lib.model
 */
class Fadescto extends BaseFadescto
{
  public function getDescta()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
  }
}
