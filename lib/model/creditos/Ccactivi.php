<?php

/**
 * Subclass for representing a row from the 'ccactivi' table.
 *
 *
 *
 * @package lib.model
 */
class Ccactivi extends BaseCcactivi
{
	public function __toString(){
    return $this->getNomact();
  }

  public function getNombreActividad(){
   return Herramientas::getX('id','ccactivi','nomact',self::getCcactiviId());
  }

  public function getNombreClasificacion(){
   return Herramientas::getX('id','ccclaact','nomclaact',self::getCcestadoId());
  }



}
