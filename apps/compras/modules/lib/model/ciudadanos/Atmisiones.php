<?php

/**
 * Subclase para representar una fila de la tabla 'atmisiones'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Atmisiones extends BaseAtmisiones
{
  public function  __toString() {
    return $this->desmis;
  }
}
