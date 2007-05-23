<?php

/**
 * Subclass for representing a row from the 'usuarios' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Usuarios extends BaseUsuarios
{
  
  public function getNomuni(){
    
    return Herramientas::getX('id','acunidad','nomuni',self::getNumuni());
  }
  
}
