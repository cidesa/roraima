<?php

/**
 * Subclass for representing a row from the 'catbarurb' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catbarurb extends BaseCatbarurb
{
	protected $coddivgeo="";


  public function __toString()
  {
    return $this->nombarurb;
  }


  public function getCoddivgeo(){
   return Herramientas::getX('id','catdivgeo','coddivgeo',self::getCatdivgeoId());
  }


  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $catdivgeo = $this->getCatdivgeo();
    //if($catdivgeo) $this->coddivgeo = $catdivgeo->getCoddivgeo();
    if($catdivgeo) $this->desdivgeo = $catdivgeo->getDesdivgeo();

  }

}
