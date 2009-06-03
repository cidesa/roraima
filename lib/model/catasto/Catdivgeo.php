<?php

/**
 * Subclass for representing a row from the 'catdivgeo' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catdivgeo extends BaseCatdivgeo
{
  public function __toString()
  {
    return $this->desdivgeo;
  }

}
