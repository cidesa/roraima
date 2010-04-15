<?php

/**
 * Subclase para representar una fila de la tabla  'catregper'.
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
class Catregper extends BaseCatregper
{

  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $catregper = $this->getCatdivgeo();
    if($catregper) $this->desdivgeo = $catregper->getDesdivgeo();
    if($catregper) $this->coddivgeo = $catregper->getCoddivgeo();
  }
}
