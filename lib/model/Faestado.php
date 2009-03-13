<?php

/**
 * Subclass for representing a row from the 'faestado' table.
 *
 *
 *
 * @package lib.model
 */
class Faestado extends BaseFaestado
{
  protected $nompai ='';

  public function __toString()
  {
    return $this->nomedo;
  }

  public function afterHydrate()
  {
    $pais = $this->getFapais();
    if($pais!='') $this->nompai = $pais->getNompai();

  }

}
