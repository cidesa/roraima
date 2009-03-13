<?php

/**
 * Subclass for representing a row from the 'inmunicipio' table.
 *
 *
 *
 * @package lib.model
 */
class Inmunicipio extends BaseInmunicipio
{

  protected $nomedo ='';

  public function __toString()
  {
    return $this->nommun;
  }

  public function afterHydrate()
  {
    $estado = $this->getInestado();
    if($estado!='') $this->nomedo = $estado->getNomedo();

  }

}
