<?php

/**
 * Subclass for representing a row from the 'catman' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catman extends BaseCatman
{
	/*
  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $catregper = $this->getCatdivgeo();
    if($catregper) $this->desdivgeo = $catregper->getDesdivgeo();
    if($catregper) $this->coddivgeo = $catregper->getCoddivgeo();
  }
*/

 public function getCoddivgeo(){
   return Herramientas::getX('id','catdivgeo','coddivgeo',self::getCatdivgeoId());
  }

  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $catdivgeo = $this->getCatdivgeo();
    if($catdivgeo) $this->desdivgeo = $catdivgeo->getDesdivgeo();
  }

  public function ListCattipvia(){
    $c = new Criteria();
    $lista = CattipviaPeer::doSelect($c);
    $modulos = array();
    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getDesvia());
    }
    return $modulos;
  }

  public function ListCattramo($params=''){
    $c = new Criteria();
    $c->add(CatdivgeoPeer::CODDIVGEO,$params);
    $c->addJoin(CattramoPeer::CATDIVGEO_ID,CatdivgeoPeer::ID);
    $lista = CattramoPeer::doSelect($c);
    $modulos = array();
    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getNomtramo());
    }
    return $modulos;
  }

}
