<?php

/**
 * Subclass for representing a row from the 'atdonaciones' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Atdonaciones extends BaseAtdonaciones
{
  protected $grupo = '';

  public function afterHydrate()
  {
    $grupo = $this->getAtgrudon();
    if($grupo) $this->grupo = $grupo->getDesgru();

  }

}
