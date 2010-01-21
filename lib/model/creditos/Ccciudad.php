<?php

/**
 * Subclass for representing a row from the 'ccciudad' table.
 *
 *
 *
 * @package lib.model
 */
class Ccciudad extends BaseCcciudad
{
	  public function __toString(){
    return $this->getNomciu();
  }

public function getNombreEstado(){
   return Herramientas::getX('id','ccestado','nomest',self::getCcestadoId());
  }

public function getNombreRegion(){
   return Herramientas::getX('id','ccregion','nomreg',self::getCcregionId());
  }

}
