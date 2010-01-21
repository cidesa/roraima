<?php

/**
 * Subclass for representing a row from the 'cccircuito' table.
 *
 *
 *
 * @package lib.model
 */
class Cccircuito extends BaseCccircuito
{
	public function __toString(){
    return $this->getNomcircuito();
  }

  public function getNombreEstado(){
   return Herramientas::getX('id','ccestado','nomest',self::getCcestadoId());
  }
}
