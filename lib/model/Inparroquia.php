<?php

/**
 * Subclass for representing a row from the 'inparroquia' table.
 *
 *
 *
 * @package lib.model
 */
class Inparroquia extends BaseInparroquia
{

  protected $nommun = "";
  protected $nomedo = "";
  protected $nompar = "";
  protected $municipio= "";

  public function __toString()
  {
    return $this->nompar;
  }

  protected function afterHydrate()
  {
    $municipio = $this->getInmunicipio();
    if($municipio){
      $estado = $municipio->getInestado();
      if($estado) $this->nomedo = $estado->getNomedo();
      else $this->nomedo = "";
      $this->nommun = $municipio->getNommun();
    }else{
      $this->nomedo = "";
      $this->nommun = "";
    }

  }

}

