<?php

/**
 * Subclass for representing a row from the 'dfrutadoc' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Dfrutadoc extends BaseDfrutadoc
{
  
  public function getNomuni(){
    
    return Herramientas::getX('id','acunidad','nomuni',self::getIdacunidad());
    
  }
  
}
