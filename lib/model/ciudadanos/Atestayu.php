<?php

/**
 * Subclass for representing a row from the 'atestayu' table.
 *
 *
 *
 * @package lib.model
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
