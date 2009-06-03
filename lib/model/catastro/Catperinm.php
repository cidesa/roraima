<?php

/**
 * Subclass for representing a row from the 'catperinm' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catperinm extends BaseCatperinm
{
  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $catregper = $this->getCatregper();
    if ($catregper) $this->cedrif = $catregper->getCedrif();
    if ($catregper) $this->prinom = $catregper->getPrinom();
    if ($catregper) $this->priape = $catregper->getPriape();
    if ($catregper) $this->nomper = $catregper->getNomper();
  }

}
