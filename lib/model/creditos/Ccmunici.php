<?php

/**
 * Subclass for representing a row from the 'ccmunici' table.
 *
 *
 *
 * @package lib.model
 */
class Ccmunici extends BaseCcmunici
{
  public function __toString(){
    return $this->getNommun();
  }

  public function getNombreEstado(){
   return Herramientas::getX('id','ccestado','nomest',self::getCcestadoId());
  }

}
