<?php

/**
 * Subclass for representing a row from the 'atparroquias' table.
 *
 *
 *
 * @package lib.model
 */
class Atparroquias extends BaseAtparroquias
{
  protected $desmun = "";
  protected $desest = "";
  public function __toString()
  {
    return $this->despar;
  }

  protected function afterHydrate()
  {
    $municipio = $this->getAtmunicipios();
    if($municipio){
      $estado = $municipio->getAtestados();
      if($estado) $this->desest = $estado->getDesest();
      else $this->desest = "";
      $this->desmun = $municipio->getDesmun();
    }else{
      $this->desest = "";
      $this->desmun = "";
    }

  }

}
