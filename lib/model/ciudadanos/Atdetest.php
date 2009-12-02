<?php

/**
 * Subclase para representar una fila de la tabla 'atdetest'.
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
class Atdetest extends BaseAtdetest
{

  public function getDesde()
  {
    $atestayu = $this->getAtestayuRelatedByAtestayuDesde();
    return $atestayu->getDesest();
  }

  public function getHasta()
  {
    $atestayu = $this->getAtestayuRelatedByAtestayuHasta();
    return $atestayu->getDesest();
  }


}
