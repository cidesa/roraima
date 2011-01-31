<?php

/**
 * Subclase para representar una fila de la tabla  'catperinm'.
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
