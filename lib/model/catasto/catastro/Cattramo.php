<?php

/**
 * Subclass for representing a row from the 'cattramo' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Cattramo extends BaseCattramo
{
  public function __toString()
  {
    return $this->nomtramo;
  }

  public function getCoddivgeo(){
   return Herramientas::getX('id','catdivgeo','coddivgeo',self::getCatdivgeoId());
  }

  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $catdivgeo = $this->getCatdivgeo();
    if($catdivgeo) $this->desdivgeo = $catdivgeo->getDesdivgeo();
    if($catdivgeo) $this->coddivgeo = $catdivgeo->getCoddivgeo();
  }

}
