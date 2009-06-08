<?php

/**
 * Subclass for representing a row from the 'atmunicipios' table.
 *
 *
 *
 * @package lib.model
 */
class Atmunicipios extends BaseAtmunicipios
{
  protected $desest ='';

  public function __toString()
  {
    return $this->desest." - ".$this->desmun;
  }

  public function afterHydrate()
  {
    $estado = $this->getAtestados();
    if($estado!='') $this->desest = $estado->getDesest();

  }

}
