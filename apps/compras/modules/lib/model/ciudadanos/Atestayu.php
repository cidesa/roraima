<?php

/**
 * Subclase para representar una fila de la tabla 'atestayu'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Atestayu extends BaseAtestayu
{
  public function __toString()
  {
    return $this->getDesest();

  }

  public function getComportamiento()
  {
    $comp = Constantes::listaComportamientoEstadosAyudas();
    if($comp[$this->getComest()]) return $comp[$this->getComest()];
    else return Constantes::REGVACIO;

  }

}
