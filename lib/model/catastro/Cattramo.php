<?php

/**
 * Subclase para representar una fila de la tabla  'cattramo'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.catastro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
