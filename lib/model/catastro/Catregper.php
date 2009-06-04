<?php

/**
 * Subclass for representing a row from the 'catregper' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catregper extends BaseCatregper
{

  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $catregper = $this->getCatdivgeo();
    if($catregper) $this->desdivgeo = $catregper->getDesdivgeo();
    if($catregper) $this->coddivgeo = $catregper->getCoddivgeo();
  }
}
