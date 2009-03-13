<?php

/**
 * Subclass for representing a row from the 'atsolici' table.
 *
 *
 *
 * @package lib.model
 */
class Atsolici extends BaseAtsolici
{
  protected $municipios = array();
  protected $parroquias = array();

  public function getTipo()
  {
    $tipo = parent::getTipo();
    $arraytipos = AtsoliciPeer::getTipos();
    if(array_key_exists($tipo,$arraytipos)) return $arraytipos[$tipo];
    else return '';
  }

  public function __toString()
  {
    return $this->getCedsol();  

  }

}
