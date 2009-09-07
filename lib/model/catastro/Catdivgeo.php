<?php

/**
 * Subclase para representar una fila de la tabla  'catdivgeo'.
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
class Catdivgeo extends BaseCatdivgeo
{
  public function __toString()
  {
    return $this->desdivgeo;
  }

}
