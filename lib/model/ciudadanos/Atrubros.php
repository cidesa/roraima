<?php

/**
 * Subclass for representing a row from the 'atrubros' table.
 *
 *
 *
 * @package lib.model
 */
class Atrubros extends BaseAtrubros
{
  protected $destipayu = '';
  protected $objrecaudos = Array();

  public function afterHydrate()
  {
    $datos = $this->getAttipayu();
    if($datos) $this->destipayu = $datos->getDesayu();

  }

  public function __toString()
  {
    return $this->desrub;
  }

}
